<?php

declare(strict_types=1);

namespace frontend\modules\main\controllers;

use common\models\User;
use common\modules\notifications\services\ConsultingService;
use frontend\modules\main\forms\ContactForm;
use yii\web\Controller;
use yii\helpers\Url;
use yii\web\Request;
use yii\web\Response;
use Yii;

final class HomeController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', ['model' => new ContactForm()]);
    }

    public function actionCreateConsulting(Request $request): Response
    {
        $form = new ContactForm();

        if (!$request->isPost && !$form->load($request->post()) && !$form->validate()) {
            return $this->redirect(Url::toRoute('index'));
        }

        try {
            $form->load($request->post());
            if ($form->validate()) {
                $consultingService = new ConsultingService();
                $consultingService->notification($form);
            }
            Yii::$app->session->setFlash(
                'success',
                Yii::t('app', 'Ваш запит прийнято. Ми зателефонуємо вам ')
            );
        } catch (\Throwable $exception) {
            Yii::$app->session->setFlash(
                'error',
                Yii::t('app', 'Технічна помилка, спробуйте через деякий час')
            );
        }

        return $this->redirect(Url::toRoute('index'));
    }
}
