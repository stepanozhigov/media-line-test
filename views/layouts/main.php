<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
//echo '<pre>', print_r(Yii::$app->requestedRoute, 1), '</pre>';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <div class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="<?= Yii::$app->homeUrl; ?>" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                <strong>Каталог Новостей</strong>
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?= Yii::$app->requestedRoute == 'category/index' ||
                    Yii::$app->requestedRoute == '' ? 'active' : '' ?>">
                        <?= Html::a('Рубрики',['/rubriki'],['class'=>'nav-link']); ?>
                    </li>
                    <li class="nav-item <?= Yii::$app->requestedRoute == 'article/index' ? 'active' : '' ?>">
                        <?= Html::a('Новости',['/news'],['class'=>'nav-link']); ?>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-user justify-content-end flex-row mb-0">
                    <?php if(Yii::$app->user->isGuest): ?>
                    <li class="mr-2">
                        <?= Html::a('Войти',['/site/login'],['class'=>'btn btn-outline-light']) ?>
                    </li>
                    <li>
                        <?= Html::a('Регистрироваться',['/site/signup'],['class'=>'btn btn-outline-light']) ?>
                    </li>
                    <?php else: ?>
                    <li>
                        <?= Html::beginForm(['/site/logout'], 'post') ?>
                        <?= Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-outline-light']) ?>
                        <?= Html::endForm()?>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>

    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>

<footer class="footer border-top">
    <div class="container h-100 d-flex justify-content-center align-items-center">
        <p class="mb-0">&copy; MediaLine <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
