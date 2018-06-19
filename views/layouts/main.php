<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

$menu = [];
$menu[] = ['label' => 'Home', 'url' => ['/site/index']];
if (!Yii::$app->user->isGuest) {
    switch (Yii::$app->getUser()->identity->username) {
        case 'boss@plumber.co':
            $menu[] = ['label' => 'Managers', 'url' => ['/manager']];
            $menu[] = ['label' => 'Workers', 'url' => ['/worker']];
            $menu[] = ['label' => 'All Tasks', 'url' => ['/task']];
            break;
        case 'manager@plumber.co':
            $menu[] = ['label' => 'Tasks', 'url' => ['/task']];
            break;
        case 'john@plumber.co':
            $menu[] = ['label' => 'My Tasks', 'url' => ['/task']];
            break;
        case 'admin@example.com':
            $menu[] = ['label' => 'Accounts', 'url' => ['/account']];
            $menu[] = ['label' => 'Offices', 'url' => ['/office']];
            break;
    }
}


if (Yii::$app->user->isGuest) {
    $menu[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menu[] = ['label' => 'Logout (' . Yii::$app->getUser()->identity->username . ')' , 'url' => ['/site/logout']];
}


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menu,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
