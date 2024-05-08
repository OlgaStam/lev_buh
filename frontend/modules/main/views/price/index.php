<?php

use frontend\modules\main\assets\AppAsset;
use yii\helpers\Html;

/** @var yii\web\View $this */

$myAssetBundle = AppAsset::register($this);

$this->title = $this->title = Yii::t('app', 'Ціни');
$this->params['breadcrumbs'][] = 'Price';
?>
<div class='container'>

    <div class='price-section main-group'>
        <div class='price-card bg-flower'>
            <span>Послуги</span>
            <h2>ПРАЙС</h2>
            <div class='price-item bg-drk cw'>
                <span>Відкриття ФОП</span>
                <span>1500 - 2000 ₴</span>
            </div>
            <div class='price-item bg-mid cw'>
                <span>Підключення ПРРО</span>
                <span>800 - 2000 ₴</span>
            </div>
            <div class='price-item bg-lighter cw'>
                <span>Здача річної звітності ФОП на єдиному податку 1 група</span>
                <span>500 ₴</span>

            </div>
        </div>
        <div class='price-card bg-flower'>
            <span>Послуги</span>
            <h2>ПРАЙС</h2>
            <div class='price-item bg-drk cw'>
                <span>Здача річної звітності ФОП на єдиному податку 1 група з заповненням книги</span>
                <span>1500 ₴</span>
            </div>
            <div class='price-item bg-mid cw'>
                <span>Здача річної звітності ФОП на єдиному податку 2 група</span>
                <span>700 ₴</span>
            </div>
            <div class='price-item bg-lighter cw'>
                <span>Здача річної звітності ФОП на єдиному податку 2 група з заповненням книги</span>
                <span>1500 ₴</span>
            </div>
        </div>
        <div class='price-card bg-flower'>
            <span>Послуги</span>
            <h2>ПРАЙС</h2>
            <div class='price-item bg-drk cw'><span>Здача квартальної звітності ФОП на єдиному податку 3 група</span>
                <span>700 ₴</span>
            </div>
            <div class='price-item bg-mid cw'>
                <span>Бухгалтерський облік для юридичних осіб.</span>
                <span>Мінімум: один співробітник, об'єднана звітність, 10 податкових в місяц, торгівля</span>
                <span>від 3500 ₴</span>
            </div>
            <div class='price-item bg-lighter cw'>
                <span>Кадровий облік</span>
                <span>800 ₴ за 1 працівник + 400 ₴ за кожного наступного</span>
            </div>
        </div>
    </div>
    <div class='price-card bg-price cw'>
        <span>Бухгалтерська агенція 'ЛЕВ' допоможе Вам вірно заповнити та подати звітність по Вашому ФОП на єдиному податку:</span>
        <span> - ФОП 1 група річна - 700 ₴</span>
        <span> - ФОП 2 група річна - 1000 ₴</span>
        <span> - ФОП 3 група квартал - 900 ₴</span>
    </div>
    <hr>
    <div class='price-section second-group'>
        <div class='price-card bg-calc'>
            <div class='price-item-title bg-hand'>
                <span class='fz37'>ПРАЙС</span>
                <p>ОБСЛУГОВУВАННЯ ФОП НА ЄДИНОМУ ПОДАТКУ
                    <br>
                    <b>1 ТА 2 ГРУПИ</b>
                </p>
            </div>
            <div class='price-item bg-drk cw'>
                <span>ПАКЕТ МІНІМАЛЬНИЙ</span>
            </div>
            <ul class='price-item-check'>
                <li><i class='fa-regular fa-circle-check'></i>щомісячний контроль сплати податків</li>
                <li><i class='fa-regular fa-circle-check'></i>заповнення книги обліку доходів</li>
                <li><i class='fa-regular fa-circle-check'></i>подача щорічної звітності</li>
            </ul>
            <div class='price-item bg-drk cw '>
                <p class='price-sum'>300 - 500 ₴</p>
            </div>
        </div>
        <div class='price-card bg-calc'>
            <div class='price-item-title bg-hand'>
                <span class='fz37'>ПРАЙС</span>
                <p>ОБСЛУГОВУВАННЯ ФОП НА ЄДИНОМУ ПОДАТКУ
                    <br>
                    <b>1 ТА 2 ГРУПИ</b>
                </p>
            </div>
            <div class='price-item bg-drk cw'>
                <span>ПАКЕТ СТАНДАРТ</span>
            </div>
            <ul class='price-item-check'>
                <li><i class='fa-regular fa-circle-check'></i>щомісячний контроль сплати податків</li>
                <li><i class='fa-regular fa-circle-check'></i>заповнення книги обліку доходів</li>
                <li><i class='fa-regular fa-circle-check'></i>подача щорічної звітності</li>
                <li><i class='fa-regular fa-circle-check'></i>підготовка та щоквартальна здача 4ДФ</li>
            </ul>
            <div class='price-item bg-drk cw'>
                <p class='price-sum'>900 - 1200 ₴</p>
            </div>
        </div>
        <div class='price-card bg-calc'>
            <div class='price-item-title bg-hand'>
                <span class='fz37'>ПРАЙС</span>
                <p>ОБСЛУГОВУВАННЯ ФОП НА ЄДИНОМУ ПОДАТКУ
                    <br>
                    <b>1 ТА 2 ГРУПИ</b>
                </p>
            </div>
            <div class='price-item bg-drk cw'>
                <span>ПАКЕТ МАКСИМАЛЬНИЙ 1</span>
            </div>
            <ul class='price-item-check'>
                <li><i class='fa-regular fa-circle-check'></i>щомісячний контроль сплати податків</li>
                <li><i class='fa-regular fa-circle-check'></i>заповнення книги обліку доходів</li>
                <li><i class='fa-regular fa-circle-check'></i>подача щорічної звітності</li>
                <li><i class='fa-regular fa-circle-check'></i>підготовка та щоквартальна здача 4ДФ</li>
                <li><i class='fa-regular fa-circle-check'></i>1 найманий працівник (первинні документи, податки та звітність)</li>
            </ul>
            <div class='price-item bg-drk cw fz37'>
                <p class='price-sum'>1800 - 2200 ₴</p>
            </div>
        </div>
        <div class='price-card bg-calc'>
            <div class='price-item-title bg-hand'>
                <span class='fz37'>ПРАЙС</span>
                <p>ОБСЛУГОВУВАННЯ ФОП НА ЄДИНОМУ ПОДАТКУ
                    <br>
                    <b>1 ТА 2 ГРУПИ</b>
                </p>
            </div>
            <div class='price-item bg-drk cw'>
                <span>ПАКЕТ МАКСИМАЛЬНИЙ 2</span>
            </div>
            <ul class='price-item-check'>
                <li><i class='fa-regular fa-circle-check'></i>щомісячний контроль сплати податків</li>
                <li><i class='fa-regular fa-circle-check'></i>заповнення книги обліку доходів</li>
                <li><i class='fa-regular fa-circle-check'></i>подача щорічної звітності</li>
                <li><i class='fa-regular fa-circle-check'></i>підготовка та щоквартальна здача 4ДФ</li>
                <li><i class='fa-regular fa-circle-check'></i>2-4 найманий працівник (первинні документи, податки та звітність)</li>
            </ul>
            <div class='price-item bg-drk cw fz37'>
                <p class='price-sum'>2000 - 2600 ₴</p>
            </div>
        </div>
        <div class='price-card bg-calc'>
            <div class='price-item-title bg-hand'>
                <span class='fz37'>ПРАЙС</span>
                <p>ОБСЛУГОВУВАННЯ ФОП НА ЄДИНОМУ ПОДАТКУ
                    <br>
                    <b>1 ТА 2 ГРУПИ</b>
                </p>
            </div>
            <div class='price-item bg-drk cw'>
                <span>ПАКЕТ МАКСИМАЛЬНИЙ 3</span>
            </div>
            <ul class='price-item-check'>
                <li><i class='fa-regular fa-circle-check'></i>щомісячний контроль сплати податків</li>
                <li><i class='fa-regular fa-circle-check'></i>заповнення книги обліку доходів</li>
                <li><i class='fa-regular fa-circle-check'></i>подача щорічної звітності</li>
                <li><i class='fa-regular fa-circle-check'></i>підготовка та щоквартальна здача 4ДФ</li>
                <li><i class='fa-regular fa-circle-check'></i>5-8 найманий працівник (первинні документи, податки та звітність)</li>
            </ul>
            <div class='price-item bg-drk cw fz37'>
                <p class='price-sum'>2400 - 3400 ₴</p>
            </div>
        </div>
    </div>
    <hr>
    <div class='price-section third-group'>
        <div class='price-card bg-calc'>
            <div class='price-item-title bg-hand'>
                <span class='fz37'>ПРАЙС</span>
                <p>ОБСЛУГОВУВАННЯ ФОП НА ЄДИНОМУ ПОДАТКУ
                    <br>
                    <b>3 ГРУПИ</b>
                </p>
            </div>
            <div class='price-item bg-drk cw'>
                <span>ПАКЕТ СТАНДАРТ</span>
            </div>
            <ul class='price-item-check'>
                <li><i class='fa-regular fa-circle-check'></i>щомісячний контроль сплати податків</li>
                <li><i class='fa-regular fa-circle-check'></i>заповнення книги обліку доходів</li>
                <li><i class='fa-regular fa-circle-check'></i>подача щоквартальної декларації</li>
                <li><i class='fa-regular fa-circle-check'></i>підготовка та щоквартальна здача 4ДФ</li>
            </ul>
            <div class='price-item bg-drk cw '>
                <p class='price-sum'>1100 - 1500 ₴</p>
            </div>
        </div>
        <div class='price-card bg-calc'>
            <div class='price-item-title bg-hand'>
                <span class='fz37'>ПРАЙС</span>
                <p>ОБСЛУГОВУВАННЯ ФОП НА ЄДИНОМУ ПОДАТКУ
                    <br>
                    <b>3 ГРУПИ</b>
                </p>
            </div>
            <div class='price-item bg-drk cw'>
                <span>ПАКЕТ МАКСИМАЛЬНИЙ 1</span>
            </div>
            <ul class='price-item-check'>
                <li><i class='fa-regular fa-circle-check'></i>щомісячний контроль сплати податків</li>
                <li><i class='fa-regular fa-circle-check'></i>заповнення книги обліку доходів</li>
                <li><i class='fa-regular fa-circle-check'></i>подача щоквартальної декларації</li>
                <li><i class='fa-regular fa-circle-check'></i>підготовка та щоквартальна здача 4ДФ</li>
                <li><i class='fa-regular fa-circle-check'></i>1 найманий працівник (первинні документи, податки та звітність)</li>
            </ul>
            <div class='price-item bg-drk cw '>
                <p class='price-sum'>1800 - 2200 ₴</p>
            </div>
        </div>
        <div class='price-card bg-calc'>
            <div class='price-item-title bg-hand'>
                <span class='fz37'>ПРАЙС</span>
                <p>ОБСЛУГОВУВАННЯ ФОП НА ЄДИНОМУ ПОДАТКУ
                    <br>
                    <b>3 ГРУПИ</b>
                </p>
            </div>
            <div class='price-item bg-drk cw'>
                <span>ПАКЕТ МАКСИМАЛЬНИЙ 2</span>
            </div>
            <ul class='price-item-check'>
                <li><i class='fa-regular fa-circle-check'></i>щомісячний контроль сплати податків</li>
                <li><i class='fa-regular fa-circle-check'></i>заповнення книги обліку доходів</li>
                <li><i class='fa-regular fa-circle-check'></i>подача щоквартальної звітності</li>
                <li><i class='fa-regular fa-circle-check'></i>підготовка та щоквартальна здача 4ДФ</li>
                <li><i class='fa-regular fa-circle-check'></i>2-4 найманий працівник (первинні документи, податки та звітність)</li>
            </ul>
            <div class='price-item bg-drk cw fz37'>
                <p class='price-sum'>2300 - 3700 ₴</p>
            </div>
        </div>
        <div class='price-card bg-calc'>
            <div class='price-item-title bg-hand'>
                <span class='fz37'>ПРАЙС</span>
                <p>ОБСЛУГОВУВАННЯ ФОП НА ЄДИНОМУ ПОДАТКУ
                    <br>
                    <b>3 ГРУПИ</b>
                </p>
            </div>
            <div class='price-item bg-drk cw'>
                <span>ПАКЕТ МАКСИМАЛЬНИЙ 3</span>
            </div>
            <ul class='price-item-check'>
                <li><i class='fa-regular fa-circle-check'></i>щомісячний контроль сплати податків</li>
                <li><i class='fa-regular fa-circle-check'></i>заповнення книги обліку доходів</li>
                <li><i class='fa-regular fa-circle-check'></i>подача щоквартальної звітності</li>
                <li><i class='fa-regular fa-circle-check'></i>підготовка та щоквартальна здача 4ДФ</li>
                <li><i class='fa-regular fa-circle-check'></i>5-8 найманий працівник (первинні документи, податки та звітність)</li>
            </ul>
            <div class='price-item bg-drk cw fz37'>
                <p class='price-sum'>2300 - 3700 ₴</p>
            </div>
        </div>
    </div>
</div>