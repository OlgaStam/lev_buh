<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ContactForm $model */

use frontend\modules\main\assets\AppAsset;
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
$myAssetBundle = AppAsset::register($this);
?>
<div class='site-contact lev-font-color container'>
    <div class='contact-row'>
        <h3>Контакти</h3>
        <a class='phone lev-color td' href='tel:+380986073304'>
            <i class='fa-solid fa-phone-volume'></i>
            +38 (098) 607-33-04
        </a>
        <a class='mail lev-color td' href='mailto:lev.buh.agency@gmail.com'>
            <i class='fa-solid fa-envelope'></i>
            lev.buh.agency@gmail.com
        </a>
        <div class='social-icons-block'>
            <a rel='noopener noreferrer' target='_blank' href='https://t.me/lev_buh' class='social-icons-link'>
                <i class='fa-brands fa-telegram lev-color'></i>
            </a>
            <a rel='noopener noreferrer' target='_blank' href='viber://chat?number=+380986073304' class='social-icons-link'>
                <i class='fa-brands fa-viber lev-color'></i>
            </a>
            <a rel='noopener noreferrer' target='_blank' href='https://www.instagram.com/lev.buh.agency' class='social-icons-link'>
                <i class='fa-brands fa-instagram lev-color'></i>
            </a>
            <a rel='noopener noreferrer' target='_blank' href='https://www.facebook.com/profile.php?id=61557095614231' class='social-icons-link'>
                <i class='fa-brands fa-facebook lev-color'></i>
            </a>
        </div>
    </div>

    <div class='contact-row'>
        <div class="contact-column">
            <h3>
                <?= Yii::t('app', 'Запис на консультацію:') ?>
            </h3>
            <?php $form = ActiveForm::begin(['id' => 'contact-form', 'action' => ['/main/home/create-consulting'], 'options' => []]); ?>
            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'phone') ?>
            <?= $form->field($model, 'question')->textInput() ?>
            <div class='form-group consulting-submit-button'>
                <?= Html::submitButton(
                    Yii::t('app', 'Надіслати'),
                    ['class' => 'btn btn-success lev-bg', 'name' => 'contact-button']
                ) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="contact-column">
            <h3>Адреса:</h3>
            <p>Харківська обл., смт Пісочин (с.Надточії), вул.Дачна 39</p>
            <iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1283.0783815596037!2d36.07347663829013!3d49.97091863501656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x41279fa6b9d47351%3A0x2fb47a934820d0d8!2z0JHRg9GF0LPQsNC70YLQtdGA0YHRjNC60LAg0LDQs9C10L3RhtGW0Y8gItCb0JXQkiI!5e0!3m2!1sru!2sua!4v1709484849995!5m2!1sru!2sua' width='600' height='350' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'>
            </iframe>
        </div>
    </div>
</div>
