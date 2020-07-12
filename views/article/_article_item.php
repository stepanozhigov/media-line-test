<?php
/* @var $model app\models\Article */
//echo '<pre>',print_r($model->categories,1),'</pre>';
?>
<div class="card card-article rounded mb-5 d-flex flex-row">
    <div class="image-holder w-50 bg-dark d-flex justify-content-center align-items-center">
        <a href="<?= \yii\helpers\Url::to(['/article/view', 'slug'=>$model->slug])?>">
            <h5 class="text-white font-weight-bolder"><?= $model->getEncodedText('title')?></h5>
        </a>
    </div>
    <div class="card-body w-50 d-flex flex-column">
        <?php if (count($model->categories) > 0): ?>
            <div class="d-flex justify-content-start align-content-center">
                <?php foreach ($model->categories as $key=>$category): ?>
                    <a href="<?=\yii\helpers\Url::to('rubrika/'.$category['slug']) ?>" type="button" class="btn btn-outline-secondary <?= $key !== (count($model->categories)-1) ? 'mr-2': '' ?>"><?=$category->title; ?></a>
                <?php endforeach; ?>
            </div>
            <hr class="my-3 mt-0 mx-0">
        <?php endif; ?>
        <p class="card-body-description">
            <?= \yii\helpers\StringHelper::truncateWords($model->getEncodedText('body'),40) ?>
        </p>
        <hr class="mb-3 mt-0 mx-0">
        <div class="d-flex flex-row justify-content-end">
            <?=\yii\helpers\Html::a('Смотреть',['news/'.$model->slug],['class'=>'btn btn-primary']) ?>
        </div>
    </div>
</div>
