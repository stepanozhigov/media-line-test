<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

//echo '<pre>',print_r(Yii::$app->user->identity->id,1),'</pre>';

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p class="text-muted">
        <small>Created By: <b><?= $model->user->username; ?></b>. Created At: <b><?= Yii::$app->formatter->asDatetime($model->created_at) ?></b>. Updated: <b><?= Yii::$app->formatter->asRelativeTime($model->updated_at)?></b>.</small>
    </p>
    <?php if(!Yii::$app->user->isGuest && ($model->user->id === Yii::$app->user->identity->id)): ?>
    <p>
        <?= Html::a('Update', ['update', 'slug' => $model->slug], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'slug' => $model->slug], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php endif; ?>

    <?= $model->getEncodedText('body') ?>

</div>