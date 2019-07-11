<?php

use yii\helpers\Html;
use yii\grid\GridView;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;

$this->title = "Информация о клиенте";

?>

<h1><?=$this->title.' '.$client->name?></h1>
<table class="table table-striped table-bordered">
<tr>
<th>Товар</th>
<th>Дата заказа</th>
<th></th>
</tr>
<?
$itemDate = [];
$itemInfo = [];
foreach($sales as $sale){
    $itemDate[]=$sale['date'];
    echo '<tr><td>'.$sale['item'].'</td><td>'.$sale['date'].'</td><td>'.'
    
    <a href="/yii/basic/web/index.php?r=client%2Fdelete&id='.$sale['id'].'" title="Delete" aria-label="Delete" data-pjax="0" data-confirm="Are you sure you want to delete this item?" data-method="post"><span class="glyphicon glyphicon-trash"></span></a>
    '.'</td></tr>';
}
?>
</table>

<?= Html::a('Добавить заказ', ['create-item','id'=>$client->id], ['class' => 'btn btn-success']) ?>




<?$itemInfo = array_count_values ($itemDate);
$itemDate = array_values(array_unique($itemDate));

echo Highcharts::widget([
    'options' => [
       'title' => ['text' => 'График заказов'],
       'xAxis' => [
          'categories' => $itemDate
       ],
       'yAxis' => [
          'title' => ['text' => 'Количество заказнных товаров']
       ],
       'series' => [
          ['name' => $client->name, 'data' => array_values ($itemInfo)],
       ],
       
    ]
 ]);

