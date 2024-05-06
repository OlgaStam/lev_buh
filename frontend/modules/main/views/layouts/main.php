<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\modules\main\assets\AppAsset;
use yii\bootstrap5\Html;

$myAssetBundle = AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang='<?= Yii::$app->language ?>' class='h-100'>

<head>
    <meta charset='<?= Yii::$app->charset ?>'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <?php $this->registerCsrfMetaTags() ?>
    <?php
    echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css'>";
    ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class='d-flex flex-column h-100'>
    <?php $this->beginBody() ?>

    <header class='header'>
        <div class='header-menu lev-font-color'>
            <div class="container">
                <nav class='header-menu__container'>
                    <div class="header-logo">
                        <a class='header-logo__link' href='/'>
                            <?= Html::img($myAssetBundle->baseUrl . '/images/icon-round.png') ?>
                        </a>
                    </div>
                    <div class="header-navbar">
                        <div class="header-navbar__btn">
                            <span class="header-navbar__btn-row"></span>
                            <span class="header-navbar__btn-row"></span>
                            <span class="header-navbar__btn-row"></span>
                        </div>
                        <ul class='header-navbar__list'>
                            <li class='nav-item'>
                                <?= Html::a(Yii::t('app', 'Головна'), ['/'], ['class' => 'nav-link main']) ?>
                            </li>
                            <li class='nav-item'>
                                <?= Html::a(Yii::t('app', 'Послуги'), ['/serve'], ['class' => 'nav-link serve']) ?>
                            </li>
                            <li class='nav-item'>
                                <?= Html::a(Yii::t('app', 'Ціни'), ['/price'], ['class' => 'nav-link price']) ?>
                            </li>
                            <li class='nav-item'>
                                <?= Html::a(Yii::t('app', 'Контакти'), ['/contact'], ['class' => 'nav-link contact']) ?>
                            </li>
                        </ul>
                        <a class='header-navbar__contacts' href='tel:+380986073304'>
                            <span>Ми на зв'язку</span>
                            <span>+38 (098) 607-33-04</span>
                            <small>Пн.-Пт. з 09:00 до 18:00</small>
                        </a>
                    </div>
                </nav>
            </div>
        </div>

    </header>

    <main role='main'>

        <!-- <?= $content ?> -->
    </main>

    <footer class='footer lev-bg cw'>
        <div class='container'>
            <div class="footer-logo">
                <a class='cw td' href=' /'>
                    <?= Html::img($myAssetBundle->baseUrl . '/images/icon-round.png') ?>
                    <span>Бухгалтерська агенція "ЛЕВ"</span>
                </a>
                <span class="f2">Наш супровід - Ваш спокій</span>
            </div>

            <div class="footer-contacts">
                <h2 class="fh2">Контакти</h2>
                <a class='phone cw td' href='tel:+380986073304'>
                    <i class="fa-solid fa-phone-volume"></i>
                    +38 (098) 607-33-04
                </a>
                <a class='mail cw td' href="mailto:lev.buh.agency@gmail.com">
                    <i class="fa-solid fa-envelope"></i>
                    lev.buh.agency@gmail.com
                </a>
                <div class='social-icons-block'>
                    <a rel='noopener noreferrer' target='_blank' href='https://t.me/lev_buh' class='social-icons-link'>
                        <i class="fa-brands fa-telegram cw"></i>
                    </a>
                    <a rel='noopener noreferrer' target='_blank' href='viber://chat?number=+380986073304' class='social-icons-link'>
                        <i class="fa-brands fa-viber cw"></i>
                    </a>
                    <a rel='noopener noreferrer' target='_blank' href='https://www.instagram.com/lev_buh_agency' class='social-icons-link'>
                        <i class="fa-brands fa-instagram cw"></i>
                    </a>
                    <a rel='noopener noreferrer' target='_blank' href='https://www.facebook.com/profile.php?id=61555635522199' class='social-icons-link'>
                        <i class="fa-brands fa-facebook cw"></i>
                    </a>
                </div>
            </div>

            <div class='footer-address'>
                <h2 class="fh2">Адреса офісу</h2>
                <i class="fa-solid fa-location-dot" cw"></i>
                <?= Yii::t('app', 'Харківська обл., смт Пісочин (с.Надточії), вул.Дачна 39') ?>
            </div>
        </div>
    </footer>


    <?php $this->endBody() ?>
</body>

</html>

<?php $this->endPage();
