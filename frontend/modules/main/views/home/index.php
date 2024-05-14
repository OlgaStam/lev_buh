<?php

use yii\bootstrap5\Button;
use frontend\modules\main\forms\ContactForm;

/** @var yii\web\View $this */
/** @var ContactForm $model */

$this->title = Yii::t('app', 'ЛЕВ Бухгалтерська агенція');
?>
<div id="main-fon" class='text-white fon-title'>
    <div class="container">
        <div class='title-main'>
            Бухгалтерська</br>
            агенція "ЛЕВ"
        </div>
        <div class='small-font title-children'>
            <?= Yii::t('app', 'Наш супровід - Ваш спокій') ?>
        </div>
        <div class='consultation-appointment'>
            <?= Button::Widget([
                'label' => Yii::t('app', 'Запис на консультацію'),
                'options' => ['class' => 'btn btn-light modal-button-consulting', 'data-toggle' => 'modal', 'data-target' => '#myModal', 'type' => 'button'],
            ]); ?>
        </div>
    </div>
</div>
<div class='container'>
    <div class='body-content'>
        <?= $this->render('../_modal', ['model' => $model]) ?>
        <div class='content-block lev-font-color'>
            <div class='content-block__title  lev-font-color'>
                Про нас:
            </div>
            <div class="about_us">
                <p class='tf'>
                    Ми – бухгалтерська агенція, що досить недовго працює на ринку України. Але сьогодні можемо з впевненістю сказати, що за нашими плечима вже багато задоволених клієнтів.
                    <!-- </p>
                <p class='tf'> -->
                    Це все тому, що провідні бухгалтери нашої агенції мають досвід роботи в фінансовій сфері понад 15 років, а помічниці – доповнюють їх наполегливістю в праці та навчанні.
                    <!-- </p>
                <p class='tf'> -->
                    Нам довіряють вести свою бухгалтерію промислові підприємства та підприємства торгівлі (юридичні особи на загальній системі оподаткування з ПДВ), представники громадського харчування та ІТ-спеціалісти (ФОПи на єдиному податку), надавачі послуг населенню та неприбуткові організації.
                    <!-- </p>
                <p class='tf'> -->
                    Ми беремо на себе всю рутинну роботу з бухгалтерського обліку, складаємо податкову звітність та допомагаємо в усіх напрямках управлінського обліку.
                </p>
            </div>
        </div>
    </div>
</div>
<div class='content-block__bg'>
    <div class="container">
        <div class='content-block__title'>Нас обирають:
        </div>
        <div class='content-block choose'>
            <div class='content-block__item'>
                <p class='content-block__item-header'><?= Yii::t('app', 'Mалий та середній бізнес (ТОВ, ФОП)'); ?></p>
                <p class='content-block__item-text'>
                    Юридичні особи, які прагнуть оптимізувати свою діяльність та зосередитися на основних завданнях,
                    шукають ефективне та професійне ведення обліку та кадрового управління за доступними витратами.
                </p>
            </div>
            <div class='content-block__item'>
                <p class='content-block__item-header'><?= Yii::t('app', 'Фрілансери та самозайняті особи'); ?></p>
                <p class='content-block__item-text'>
                    Фізичні особи - підприємці, які ведуть власний бізнес,
                    і прагнуть ефективних рішень для свого обліку та оподаткування.
                </p>
            </div>
            <div class='content-block__item'>
                <p class='content-block__item-header'><?= Yii::t('app', 'Стартапи та нові підприємства'); ?></p>
                <p class='content-block__item-text'>
                    Нові компанії, які потребують експертної допомоги в бухгалтерському та управлінському обліку,
                    але не можуть собі дозволити великий внутрішній штат спеціалістів.
                </p>
            </div>
            <div class='content-block__item'>
                <p class='content-block__item-header'><?= Yii::t('app', 'Сектор не комерційних організацій'); ?></p>
                <p class='content-block__item-text'>
                    Неприбуткові організації, які не мають прибуткової мети,
                    і шукають послуги з обліку та фінансового управління
                </p>
            </div>
        </div>

        <div class='content-block__title'>
            Бухгалтерська агенція "ЛЕВ" - це:
        </div>
        <div class='content-block cw'>
            <div class='content-block__item'>
                <p class='content-block__item-header'>Глибокий досвід та професіоналізм</p>
                <p class='content-block__item-text'>
                    Провідні бухгалтери агенції мають досвід роботи понад 16 років та гарантують високу експертизу
                    й точність у веденні обліку для різних галузей.
                </p>
            </div>
            <div class='content-block__item'>
                <p class='content-block__item-header'>Широкий спектр послуг</p>
                <p class='content-block__item-text'>
                    Комплексне обслуговування з бухгалтерського, податкового,
                    управлінського та кадрового обліку для різних видів підприємств.
                </p>
            </div>
            <div class='content-block__item'>
                <p class='content-block__item-header'>Онлайн обслуговування</p>
                <p class='content-block__item-text'>
                    Надання послуг як в офісі, так і онлайн,
                    що забезпечує максимальну зручність та доступність для клієнтів.
                </p>
            </div>
            <div class='content-block__item'>
                <p class='content-block__item-header'>Індивідуальний підхід</p>
                <p class='content-block__item-text'>
                    Орієнтація на потреби клієнтів різних галузей, забезпечуючи персоналізовані рішення та консультації.
                </p>
            </div>
            <div class='content-block__item'>
                <p class='content-block__item-header'>Висока ефективність та швидкість</p>
                <p class='content-block__item-text'>
                    Використання передових технологій для автоматизації процесів та оперативного вирішення завдань.
                </p>
            </div>
            <div class='content-block__item'>
                <p class='content-block__item-header'>Різноманітні галузі обслуговування</p>
                <p class='content-block__item-text'>
                    Досвід роботи з підприємствами торгівлі, виробництва, надання послуг, громадського харчування, IT сфери та неприбуткових організацій.
                </p>
            </div>
            <div class='content-block__item'>
                <p class='content-block__item-header'>Безпека даних</p>
                <p class='content-block__item-text'>
                    Гарантована безпека та конфіденційність даних клієнтів,
                    що особливо важливо для обробки чутливої фінансової інформації.
                </p>
            </div>
            <div class='content-block__item'>
                <p class='content-block__item-header'>Конкурентно-спроможні тарифи</p>
                <p class='content-block__item-text'>
                    Агенція може запропонувати конкурентоспроможні тарифи та гнучку систему оплати для своїх клієнтів.
                </p>
            </div>
        </div>
    </div>
</div>