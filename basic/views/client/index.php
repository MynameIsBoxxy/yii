<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = "Клиенты";
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?=Html::encode($this->title)?></h1>
<p>
        <?= Html::a('Добавить клиента', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div class="clients">
<ol class="list-group">
<?
        foreach($data as $item){
            echo '<li class="list-group-item">'.
            '<a href="'.Url::to(['client/view','id'=>$item->id]).'"><span class="glyphicon glyphicon-eye-open"></span></a>'.
            '<a href="'.Url::to(['client/update','id'=>$item->id]).'"><span class="glyphicon glyphicon-pencil"></span></a>'
            .$item->name.'
            
            </li>';

        }
    ?>
</ol>
</div>