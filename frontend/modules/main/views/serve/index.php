<?php

/** @var yii\web\View $this */
/** @var  $myAssetBundle */

use frontend\modules\main\assets\AppAsset;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Послуги');
$this->params['breadcrumbs'][] = 'Serve';

$myAssetBundle = AppAsset::register($this);
?>
<div class="site-about container lev-font-color">
    <div class="serve-bg bg-two_notebooks">
        <div class='serve-row'>
            <div class='serve-text-block'>
                <p class="serve-text__title">Бухгалтерський облік:</p>
                <ul>
                    <li>комплексний бухгалтерський супровід</li>
                    <li>підготовка всіх фінансових звітів</li>
                    <li>аудит фінансової звітності та облікових програм</li>
                </ul>
            </div>
            <div class='serve-round-image'>
                <?= Html::img($myAssetBundle->baseUrl . '/images/serve/two-notebooks-round.png') ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="serve-bg bg-codecs">
        <div class='serve-row'>
            <div class='serve-round-image'>
                <?= Html::img($myAssetBundle->baseUrl . '/images/serve/codecs-round.png') ?>
            </div>
            <div class='serve-text-block'>
                <p class="serve-text__title">Податковий супровід:</p>
                <ul>
                    <li>складання та подання податкової звітності</li>
                    <li>розблокування податкових накладних</li>
                    <li>оцінка стану платника податків</li>
                    <li>оптимізація податкових зобов`язань</li>
                    <li>супровід податкових перевірок</li>
                </ul>
            </div>
        </div>
    </div>
    <hr>
    <div class="serve-bg bg-notebook">
        <div class='serve-row'>
            <div class='serve-text-block'>
                <p class="serve-text__title">Кадровий облік:</p>
                <ul>
                    <li>ведення кадрової документації</li>
                    <li>облік робочого часу</li>
                    <li>розрахунок заробітної плати</li>
                    <li>подання звітності</li>
                </ul>
            </div>
            <div class='serve-round-image'>
                <?= Html::img($myAssetBundle->baseUrl . '/images/serve/notebook-round.png') ?>
            </div>
        </div>
    </div>
    <hr>
    <div class='serve-row'>
        <span class="serve-text__title">Індивідуальне консультування</span>
        <p>
            Наші фахівці готові надати індивідуальні консультації,
            враховуючи унікальні потреби та особливості вашого бізнесу.
        </p>
    </div>
</div>