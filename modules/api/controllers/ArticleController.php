<?php


namespace app\modules\api\controllers;

use \app\modules\api\models\Article;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class ArticleController extends ActiveController
{
    public $modelClass = Article::class;

    public function actions() {
        $actions = parent::actions();
        //unset($actions['index']);
        return $actions;
    }

    public function actionIndex() {
        $provider = new ActiveDataProvider(
            [
                'query'=>Article::find()->with('categories'),
                'sort' => [
                    'defaultOrder' => [
                        'created_at' => SORT_DESC,
                        'title' => SORT_ASC,
                    ]
                ],
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]
        );
        return $provider->getTotalCount();
    }

}