<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use \app\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'categories[]')->listBox(ArrayHelper::map(Category::getAllCategories(), 'id', 'name'), ['multiple' => true, 'size' => 10,'selected'=>ArrayHelper::map($model->categories,'id','name')]); ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 10]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
