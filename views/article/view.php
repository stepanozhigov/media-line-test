<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->title;
//$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view pt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="article-image bg-dark w-100 d-flex justify-content-center align-items-center text-white font-weight-bolder">
                    Thumbnail
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex h-100 flex-column">
                    <h1><?= Html::encode($this->title) ?></h1>
                    <p class="text-muted">
                        <small>Автор: <b><?= $model->user->username; ?></b>. Создано: <b><?= Yii::$app->formatter->asDatetime($model->created_at) ?></b>. Обновлено: <b><?= Yii::$app->formatter->asRelativeTime($model->updated_at)?></b>.</small>
                    </p>
                    <!--CATEGORIES-->
                    <div class="d-flex justify-content-start align-content-center">
                        <?php foreach ($model->categories as $key=>$category): ?>
                            <a href="<?=\yii\helpers\Url::to('rubrika/'.$category['slug'],1) ?>" type="button" class="btn btn-outline-secondary <?= $key !== (count($model->categories)-1) ? 'mr-2': '' ?>"><?=$category->title; ?></a>
                        <?php endforeach; ?>
                    </div>
                    <!--EDIT-->
                    <?php if(!Yii::$app->user->isGuest && ($model->user->id === Yii::$app->user->identity->id)): ?>
                        <div class="flex-grow-1 d-flex flex-row align-items-end justify-content-end">
                            <?= Html::a('Update', ['update', 'slug' => $model->slug], ['class' => 'mr-2 btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'slug' => $model->slug], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div>
            <p class="mt-3"><?= $model->getEncodedText('body') ?></p>
        </div>

    </div>


</div>