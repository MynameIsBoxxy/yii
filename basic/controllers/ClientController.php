<?php

namespace app\controllers;

use Yii;

use yii\web\Controller;
use app\models\Clients;
use app\models\Sales;

class ClientController extends Controller{
    public function actionIndex(){
        $cl = new Clients();
        $data = $cl->getClients();

        return $this->render('index',['data'=>$data]);
    }
    public function actionView($id){
        $oneCl = Clients::findOne($id);
        $data = $oneCl->sales;        

        return $this->render('view',['client'=>$oneCl,'sales'=>$data]);
    }
    public function actionUpdate($id){
        $model = Clients::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionCreate(){
        $model = new Clients();
        $data = $model->getClients();
        if ($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['index','data'=>$data]);
        }
        return $this->render('create',['model'=>$model]);
    }
}