<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = 'Добавить клиента';
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="create-update">

    <h1><?= Html::encode($this->title) ?></h1>

 <?= $this->render('_form_cr', [
        'model' => $model,
    ]) ?>
</div>
