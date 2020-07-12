<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $articles */

$this->title = $model->title;
//echo '<pre>',print_r($model->articles,1),'</pre>';
//$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view h-100">

    <div class="jumbotron jumbotron-fluid d-flex">
        <div class="container-fluid container-lg d-flex flex-column justify-content-center">
            <h1 class="my-5 display-4">Рубрика <span class="badge badge-secondary"><?= Html::encode($model->title) ?></span></h1>
            <div class="d-flex justify-content-between">
                <?= Html::a('Новая Рубрика', ['rubrika/create'], ['class' => 'btn btn-success']) ?>
                <?php if(!Yii::$app->user->isGuest && ($model->user->id === Yii::$app->user->identity->id)): ?>
                    <div class="d-flex justify-content-between align-content-center">
                        <?= Html::a('Редактировать', ['update', 'slug' => $model->slug], ['class' => 'mr-4 btn btn-primary']) ?>
                        <?= Html::a('Удалить', ['delete', 'slug' => $model->slug], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Вы уверены что хотите удалить эту Рубрику?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </div>
                <?php endif; ?>
            </div>
            <hr class="my-2 ml-0 mr-0">
            <div class="d-flex justify-content-between align-content-center">
                <small>Автор: <b><?= $model->user->username; ?></b></small>
                <small>Создано: <b><?= Yii::$app->formatter->asDatetime($model->created_at) ?></b></small>
                <small>Обновлено: <b><?= Yii::$app->formatter->asRelativeTime($model->updated_at)?></b></small>
            </div>
            <hr class="my-2 ml-0 mr-0">
            <p class="lead text-left"><?=$model->getEncodedText('description'); ?></p>
            <hr class="mb-4 ml-0 mr-0">
            <div class="d-flex justify-content-center">
                <?= Html::a('Новая Новость', ['news/create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <!--  Articles  -->
    <?php if(count($model->articles)>0): ?>
    <div class="articles bg-light overflow-hidden">
        <h2  class="text-center font-weight-light my-5"><small>Новости Рубрики: </small><?=$model->title; ?></h2>
        <div class="container-fluid container-lg">
            <div class="row">
                <?php foreach ($model->articles as $article): ?>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"
                                 data-src="holder.js/100px225?theme=thumb&bg=55595c&fg=eceeef&text=Thumbnail"
                                 alt="Thumbnail [100%x225]"
                                 style="height: 225px; width: 100%; display: block;"
                                 data-holder-rendered="true">
                            <div class="card-body">
                                <h5 class="card-title"><?=$article->title ?></h5>
                                <p class="card-text"><?= \yii\helpers\StringHelper::truncateWords($article->getEncodedText('body'),15); ?></p>
                                <div class="d-flex justify-content-between align-items-center flex-wrap">
                                    <div class="btn-group">
                                        <?= Html::a('Смотреть', ["news/$article->slug"], ['class' => 'btn btn-sm btn-outline-secondary']) ?>
                                        <?= Html::a('Редактировать', ['news/update/'.$article->slug], ['class' => 'btn btn-sm btn-outline-secondary']) ?>
                                    </div>
                                    <small class="text-muted"><?=Yii::$app->formatter->asRelativeTime($article->created_at); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif;?>
</div>
