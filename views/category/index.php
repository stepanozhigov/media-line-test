<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $categories */
/* @var $treeCategories */

$this->title = 'Новостные Рубрики';
//echo '<pre>',print_r($categories,1),'</pre>';
//$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="jumbotron mb-0 d-flex">
        <div class="container d-flex flex-column justify-content-center">
            <h1 class="display-4"><?= Html::encode($this->title) ?></h1>
            <p class="lead">Новости — оперативная информация, которая представляет политический, социальный или экономический интерес для аудитории в своей свежести, то есть сообщения о событиях, произошедших недавно или происходящих в данный момент.</p>
            <hr class="mb-4">
            <p class="lead">
                <?= Html::a('Новая Рубрика', ['/rubrika/create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    </div>

    <?php if(count($categories)>0): ?>
        <div class="container-fluid container-lg">
            <div class="row mb-5">
            <?php foreach ($categories as $category): ?>
            <?php //echo '<pre>',print_r($category,1),'</pre>'; ?>
            <div class="col-12">
                <div style="padding-left: <?=(4*$category['level'])?>rem">
                    <div class="card card-category rounded mb-5 d-flex flex-row">
                        <div class="image-holder w-50 bg-dark d-flex justify-content-center align-items-center">
                            <h5 class="text-white font-weight-bolder"><?=$category['title']?></h5>
                        </div>
                        <div class="card-body w-50 d-flex flex-column">
                            <p class="card-body-description"><?= \yii\helpers\StringHelper::truncateWords(Html::encode($category['description']),25)?></p>
                            <hr class="mb-3 mt-0 mx-0">
                            <div class="d-flex flex-row justify-content-end">
                            <?= Html::a('Смотреть', ['/rubrika/'.$category['slug']], ['class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
            </div>
        </div>
    <?php endif ?>
