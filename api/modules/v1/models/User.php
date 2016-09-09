<?php

namespace api\modules\v1\models;

use Yii;

class User extends \yii\db\ActiveRecord {

    public static function tableName(){
      return 'user';
    }

    public function fields(){
      return [
        'email' => 'email'
      ];
    }
}
