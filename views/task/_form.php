<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'office_id')->dropDownList(\app\helpers\Data::offices()) ?>

    <?= $form->field($model, 'manager_id')->dropDownList(\app\helpers\Data::managers()) ?>

    <?= $form->field($model, 'worker_id')->dropDownList(\app\helpers\Data::workers()) ?>

    <?= $form->field($model, 'scheduled_time')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'customer_id')->dropDownList(\app\helpers\Data::customers()) ?>

    <?= $form->field($model, 'address_id')->dropDownList(\app\helpers\Data::addresses()) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
