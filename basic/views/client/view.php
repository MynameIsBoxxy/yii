<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = "Информация о клиенте";

?>

<h1><?=$this->title.' '.$client->name?></h1>
<table class="table table-striped table-bordered">
<tr>
<th>Товар</th>
<th>Дата заказа</th>
</tr>
<? foreach($sales as $sale){
    echo '<tr><td>'.$sale['item'].'</td><td>'.$sale['date'].'</td></tr>';
}
?>
</table>