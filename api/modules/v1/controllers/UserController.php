<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;

class UserController extends ActiveController {

    public $modelClass = 'api\modules\v1\models\User';

    public function actions() {
        $actions = parent::actions();

        unset($actions['delete'] ,$actions['create']);

        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    public function prepareDataProvider() {

        $modelClass = $this->modelClass;

        return new ActiveDataProvider([
            'query' => $modelClass::find(),
        ]);
    }

    public function actionCreate() {

      $request = Yii::$app->getRequest()->getBodyParams();

      $model = new $this->modelClass();

      $model->username = $request['username'];
      $model->email = $request['email'];
      $model->setPassword($request['password']);
      $model->generateAuthKey();

      $save = $model->save();

      return json_encode($save);
    }

}
