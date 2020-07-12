<?php
/* @var $model app\models\Category */
/* @var $parents */
//echo '<pre>',print_r($parents,1),'</pre>';

?>
<div style="padding-left: <?=count($parents)*2?>rem">
    <a href="<?= \yii\helpers\Url::to(['/category/view', 'slug'=>$model->slug])?>">
        <h3>
            <?= $model->getEncodedText('title') ?>
        </h3>
    </a>
    <p class="text-muted">
        <small>Created By: <b><?= $model->user['username'] ?></b></small>
    </p>
    <div>
        <?= \yii\helpers\StringHelper::truncateWords($model->getEncodedText('description'),40) ?>
    </div>
    <hr>
</div>
