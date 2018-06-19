<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
$isManager = Yii::$app->user->identity->username == 'manager@plumber.co';
if ($isManager) {
    $tpl = '{view} {update} {delete}';
} else {
    $tpl = '{view}';
}

?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ($isManager): ?>
    <p>
        <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php endif ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'title',
            'scheduled_time',
            'address',
            'phone',
            [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => $tpl
            ],
        ],
    ]); ?>
</div>
