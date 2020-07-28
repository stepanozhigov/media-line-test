<?php
/* @var $model app\models\Article */
//echo '<pre>',print_r($model,1),'</pre>';
?>
<div class="card card-article rounded mb-5">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <!--       IMAGE     -->
            <div class="image-holder col col-md-6 bg-dark d-flex justify-content-center align-items-center p-4 text-center rounded-left">
                <a href="<?= \yii\helpers\Url::to(['/article/view', 'slug'=>$model->slug])?>">
                    <h5 class="text-white font-weight-bolder"><?= $model->getEncodedText('title')?></h5>
                </a>
            </div>
            <!--      TEXT      -->
            <div class="card-body col col-md-6 d-flex flex-column">
                <!--   CATEGORIES   -->
                <?php if (count($model->categories) > 0): ?>
                    <div class="d-flex flex-wrap justify-content-start align-content-center">
                        <?php foreach ($model->categories as $key=>$category): ?>
                            <a href="<?=\yii\helpers\Url::to('/news/rubrika/'.$category['slug'],1) ?>"
                               type="button"
                               class="btn btn-outline-secondary mb-2 <?= $key !== (count($model->categories)-1) ? 'mr-2': '' ?> <?= ($category->id === 1) ? 'result' : 'no-result' ?>"><?=$category->title; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <hr class="my-3 mt-0 mx-0">
                <?php endif; ?>
                <p class="card-body-description flex-grow-1">
                    <?= \yii\helpers\StringHelper::truncateWords($model->getEncodedText('body'),40) ?>
                </p>
                <hr class="mb-3 mt-0 mx-0">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <p class="text-muted my-0 flex-grow-0"><small>Автор: <b><?= $model->user->username; ?></b></small></p>
                    <?=\yii\helpers\Html::a('Смотреть',['news/'.$model->slug],['class'=>'btn btn-primary']) ?>
                </div>
            </div>
        </div>
    </div>


</div>
