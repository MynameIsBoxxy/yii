<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = 'Добавить заказ';

?>
<div class="item-create">

    <h1><?= Html::encode($this->title) ?></h1>

 <?= $this->render('_form_zak', [
        'model' => $model,
    ]) ?>
</div>
