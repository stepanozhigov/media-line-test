<?php
namespace app\modules\api\controllers;

use yii\web\Controller;

/*
 * @package app\modules\api\controllers
 *
 */
class DefaultController extends Controller
{
    public function actionIndex() {

        return $this->renderContent('TestAPI');
    }
}