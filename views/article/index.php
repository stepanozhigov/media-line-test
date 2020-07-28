<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Article;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $category \app\models\Category */

$this->title = 'Новости';
//var_dump($dataProvider->getModels());
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="jumbotron mb-0 d-flex">
 <div class="container d-flex flex-column justify-content-center">
        <h1 class="display-4"><?= Html::encode($this->title) ?></h1>
        <p class="lead">Новости — оперативная информация, которая представляет политический, социальный или экономический интерес для аудитории в своей свежести, то есть сообщения о событиях, произошедших недавно или происходящих в данный момент.</p>
        <hr class="mb-4">
        <?php if(!Yii::$app->user->isGuest): ?>
            <p class="m-0">
                <?= Html::a('Создать Новость', ['news/create'], ['class' => 'btn btn-success']) ?>
            </p>
        <?php endif; ?>
    </div>
</div>

<div class="container-fluid container-lg">
    <div class="article-index pt-4">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <!--    TITLE WITH CATEGORY    -->
            <h1 class="font-weight-lighter flex-grow-1 d-flex flex-column flex-md-row flex-wrap justify-content-between">
                <span class="text-center"><?= Html::encode($this->title) ?></span>
                <?php if(isset($category)) : ?>
                <p class="font-weight-lighter badge badge-secondary">
                    <span class="mb-2 text-center">Рубрика:</span>
                    <span class="mb-2"> <?= $category->title ?></span>
                </p>
                <?php endif; ?>
            </h1>
        </div>
        <?php $listViewConfig = [
            'dataProvider' => $dataProvider,
            'itemView'=> '_article_item',
            'layout' => "{summary}\n{items}\n{pager}",
            'pager'=>[
                'options'=> [
                    'tag'=>'ul',
                    'class'=>'pagination d-flex justify-content-center'
                ],
                'pageCssClass' => 'page-item',
                'linkOptions' => ['class' => 'page-link'],
                'activePageCssClass' => 'active',
                'disabledPageCssClass' => 'disabled',
                'prevPageCssClass' => 'page-item',
                'nextPageCssClass' => 'page-item',
                ]
        ];
        if(isset($category)) {
            $listViewConfig = array_merge(
                $listViewConfig,
                ['viewParams'=>['category'=>$category]]
            );
        }
        ?>
        <?= \yii\widgets\ListView::widget($listViewConfig); ?>
    </div>
</div>

