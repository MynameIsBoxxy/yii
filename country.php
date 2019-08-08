<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\MyHelper;
use yii\httpclient\Client;
$this->title = 'Страны';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
<?=GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $filter,
    'columns' => [
        [
            'attribute' => 'id',
            'label' => 'ID'
        ],
        [
            'attribute' => 'categoryId',
            'label' => 'Категория'
        ],
        [
            'attribute' => 'price',
            'label' => 'Цена'
        ],
        [
            'attribute' => 'hidden',
            'label' => 'Доступен'
        ],
    ]
    ])?>

   
</div>
