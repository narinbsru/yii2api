<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;

class UsersController extends ActiveController {

    public $modelClass = 'api\modules\v1\models\User';

    public function actions() {
        $actions = parent::actions();

        unset($actions['delete'], $actions['create']);

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
      /*
      $model = new $this->modelClass();
      $model->group_cat_id = null;
      $model->group_cat_name = $request['group_cat_name'];
      $model->group_cat_enable = true;

      $save = $model->save();
      */
      return json_encode('true');
    }

}
