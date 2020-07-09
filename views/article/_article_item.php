<?php
/* @var $model app\models\Article */
//echo '<pre>',print_r(objectA($model->user),1),'</pre>';
?>
<div>
    <a href="<?= \yii\helpers\Url::to(['/article/view', 'slug'=>$model->slug])?>">
        <h3>
            <?= $model->getEncodedText('title') ?>
        </h3>
    </a>
    <p class="text-muted">
        <small>Created By: <b><?= $model->user['username'] ?></b></small>
    </p>
    <div>
        <?= \yii\helpers\StringHelper::truncateWords($model->getEncodedText('body'),40) ?>
    </div>
    <hr>
</div>
