<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $categories */

//echo '<pre>',print_r(Yii::$app->request->get('category'),1),'</pre>';

$this->title = 'Создать Новость';
//$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid container-lg">
    <div class="article-create pt-4">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
            'categories'=>$categories
        ]) ?>

    </div>
</div>
