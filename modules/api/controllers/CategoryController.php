<?php

namespace app\modules\api\controllers;

use app\modules\api\models\Category;

class CategoryController extends \yii\rest\ActiveController
{
    public $modelClass = Category::class;

    public function actionTest()
    {
        return $this->renderContent('Testing Category');
    }

    public function actionIndex()
    {
        return $this->renderContent('Testing Category');
    }

    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

}
