<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid container-lg">
    <div class="article-index pt-4">
        <div class="d-flex justify-content-between mb-4">
            <h1><?= Html::encode($this->title) ?></h1>
            <?php if(!Yii::$app->user->isGuest): ?>
                <p>
                    <?= Html::a('Создать Новость', ['news/create'], ['class' => 'btn btn-success']) ?>
                </p>
            <?php endif; ?>
        </div>

        <?= \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView'=> '_article_item',
            'layout' => "{summary}\n{items}\n{pager}"
        ]); ?>
    </div>
</div>

