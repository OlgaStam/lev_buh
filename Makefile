# путь к папке Docker'а
DOCKER_FOLDER_PATH=docker
# путь к docker-compose.yml
COMPOSE=--file ${DOCKER_FOLDER_PATH}/docker-compose.yml
# путь к .env
ENV=--env-file ${DOCKER_FOLDER_PATH}/.env
# аргументы переданные вместе с вызовом инструкции
ARGS=$(filter-out $@, $(MAKECMDGOALS))
# чтобы аргументы не воспринимались как make команды
%::
	@true
# парсим нужные переменные из env файла
DUMP_DB_PORT=$(shell cat ${DOCKER_FOLDER_PATH}/.env | grep DUMP_DB_PORT | awk -F= '{print $$2}')
DUMP_DB_PASS=$(shell cat ${DOCKER_FOLDER_PATH}/.env | grep DUMP_DB_PASS | awk -F= '{print $$2}')
POSTGRES_USER=$(shell cat ${DOCKER_FOLDER_PATH}/.env | grep POSTGRES_USER | awk -F= '{print $$2}')


init: prepare-env prepare-credentials build up restore-db composer-install project-init change-mode

prepare-db: dump-db restore-db

set-default-config: backup-main-config copy-default-config	

prepare-env:
	cp ${DOCKER_FOLDER_PATH}/.env.example ${DOCKER_FOLDER_PATH}/.env

prepare-credentials:
	cp common/config/credentials.example.php common/config/credentials.php

build:
	docker-compose $(COMPOSE) $(ENV) build

up:
	docker-compose $(COMPOSE) $(ENV) up -d

down:
	docker-compose $(COMPOSE) $(ENV) down

stop:
	docker-compose $(COMPOSE) $(ENV) stop

start:
	docker-compose $(COMPOSE) $(ENV) start

restart:
	docker-compose $(COMPOSE) $(ENV) restart	

ps:
	docker-compose $(COMPOSE) $(ENV) ps		

logs:
	docker-compose $(COMPOSE) $(ENV) logs $(ARGS)

shell-php:
	docker-compose $(COMPOSE) $(ENV) exec php bash

shell-nginx:
	docker-compose $(COMPOSE) $(ENV) exec nginx bash

shell-db:
	docker-compose $(COMPOSE) $(ENV) exec db bash

dump-db:
	docker-compose $(COMPOSE) $(ENV) exec db bash -c "PGPASSWORD=$(DUMP_DB_PASS) pg_dump -Fc -O -x -v -h 127.0.0.1 -p $(DUMP_DB_PORT)  -U $(POSTGRES_USER) lev_db > /tmp/lev_db.dump"

restore-db:
	# в первый раз бд создается из дампа в /tmp/lev_db.dump
	docker-compose $(COMPOSE) $(ENV) exec db bash -c "psql -U $(POSTGRES_USER) -d lev_db -c \"DROP SCHEMA public CASCADE;\""
	docker-compose $(COMPOSE) $(ENV) exec db bash -c "psql -U $(POSTGRES_USER) -d lev_db -c \"CREATE SCHEMA public;\""
	docker-compose $(COMPOSE) $(ENV) exec db bash -c "pg_restore -U postgres -O -x -v -c -d lev_db /tmp/lev_db.dump || true"

codecept:
	docker-compose $(COMPOSE) $(ENV) exec -T php bash -c "php vendor/bin/codecept run $(ARGS)"

codecept-verbose:
	docker-compose $(COMPOSE) $(ENV) exec php bash -c "php vendor/bin/codecept run -vvv $(ARGS)"

codecept-build:
	docker-compose $(COMPOSE) $(ENV) exec -T php bash -c "php vendor/bin/codecept build"

codecept-build-crm:
	docker-compose $(COMPOSE) $(ENV) exec -T php bash -c "php vendor/bin/codecept -c crm/codeception.yml build"

codecept-clean:
	docker-compose $(COMPOSE) $(ENV) exec -T php bash -c "php vendor/bin/codecept clean"

cbf:
	docker-compose $(COMPOSE) $(ENV) exec php bash -c "php vendor/bin/phpcbf --standard=PSR12 --colors $(ARGS)"

composer-install:
	docker-compose $(COMPOSE) $(ENV) exec php bash -c "composer install --prefer-dist --ignore-platform-reqs"

project-init:
	docker-compose $(COMPOSE) $(ENV) exec php bash -c "php init --env=Development --overwrite=All --delete=All"

clear-logs:
	docker-compose $(COMPOSE) $(ENV) exec -T php bash -c "echo > console/runtime/logs/app.log && echo > backend/runtime/logs/app.log && echo > frontend/runtime/logs/app.log "

php-yii:
	docker-compose $(COMPOSE) $(ENV) exec -T php bash -c "php yii $(ARGS)"

change-mode:
	docker-compose $(COMPOSE) $(ENV) exec -T php bash -c "echo 123 | sudo -S chmod -R 777 /srv/storage/"

last-log:
	docker-compose $(COMPOSE) $(ENV) exec -T php bash -c "tail -n $(ARGS) console/runtime/logs/app.log && tail -n $(ARGS) backend/runtime/logs/app.log && tail -n $(ARGS) api/runtime/logs/app.log "

restart-php:
	docker restart lev-php