<?php


namespace app\modules\api\controllers;

use app\models\api\resources\ArticleResource;
use app\models\Article;
use yii\rest\ActiveController;

class ArticleController extends ActiveController
{
    public $modelClass = ArticleResource::class;
}