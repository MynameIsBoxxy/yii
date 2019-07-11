<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'item')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'date')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '9999-99-99',
]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
