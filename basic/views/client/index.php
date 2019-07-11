<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = "Клиенты";

?>

<h1><?=Html::encode($this->title)?></h1>
<p>
        <?= Html::a('Добавить клиента', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<div>
<ol>
<?
        foreach($data as $item){
            echo '<li>'.$item->name.'<a href="/yii/basic/web/index.php?r=client%2Fview&id='.$item->id.'">Просмотр</a>'.'<a href="/yii/basic/web/index.php?r=client%2Fupdate&id='.$item->id.'">Редактировать</a></li>';

        }
    ?>
</ol>
</div>