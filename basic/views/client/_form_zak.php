<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'item')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'date')->widget(DatePicker::class, [
    //'language' => 'ru',
    'class'=>'form-control',
    'dateFormat' => 'yyyy-dd-MM',
]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
