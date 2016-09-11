<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;

class UserinfoController extends ActiveController{

    public $modelClass = 'api\modules\v1\models\Userinfo';

    public function actions(){
        $actions = parent::actions();

        //custom behaviors actions
        unset($actions['delete'] ,$actions['create']);

        $actions['index']['prepareDataProvider'] = [$this , 'prepareDataprovider'];

        return $actions;
    }

    public function prepareDataProvider(){
        $model = $this->modelClass;

        return new ActiveDataProvider([
            'query' => $model::find(),
        ]);

    }

    public function actionCreate(){

      $request = Yii::$app->getRequest()->getBodyParams();

      $model = new $this->modelClass();

      $model->user_info_fname = $request['user_info_fname'];
      $model->user_info_lname = $request['user_info_lname'];

      $save = $model->save();

      echo json_encode($save);
    }

}
