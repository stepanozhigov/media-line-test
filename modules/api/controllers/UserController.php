<?php
namespace app\modules\api\controllers;

use app\modules\api\models\LoginForm;
use app\modules\api\models\SignupForm;
use Codeception\PHPUnit\Constraint\Page;
use Yii;
use yii\rest\Controller;

/*
 * @package app\modules\api\controllers
 *
 */
class UserController extends Controller
{
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            //return $this->goHome();
            return [
                'user'=>Yii::$app->getUser()->identity->getId()
            ];
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post(),'') && $model->login()) {
            return $model->getUser()->toArray(['id','username','access_token']);
        }

        Yii::$app->response->statusCode = 422;
        return [
            'errors'=>$model->errors
        ];
    }

    public function actionSignup() {
        $model = new SignupForm();
        if($model->load(Yii::$app->request->post(),'') && $model->register()) {
            return true;
        }
        return false;
    }

    public function actionLogout()
    {
        return Yii::$app->user->logout();
    }
}