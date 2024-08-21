## lev_buh.local
### Создание локальной копии проекта
```
переключится на ветку develop

git clone https://github.com/asvskoda/lev_buh

.env.example сменить 
1. user на своего пользователя linux

2. выполнить из консоли id -u username
and change uid

make init
```

### Настройка
#### Добавление имен хостов
```
echo '127.0.0.1 lev_buh.local' | sudo tee -a /etc/hosts
echo