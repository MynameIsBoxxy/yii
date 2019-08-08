<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\Country;
use app\models\ProductSearch;

class SiteController extends Controller
{
   
    public function actionCountry(){        
     
        $data = new ProductSearch();
        $dataProvider = $data->search(Yii::$app->request->queryParams);

        return $this->render('country',[
            'dataProvider'=>$dataProvider,
            'filter' => $data,
            ]);
    }
}
