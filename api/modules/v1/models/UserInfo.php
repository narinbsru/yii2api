<?php

namespace api\modules\v1\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class Userinfo extends ActiveRecord{

    public static function tableName(){
      return '{{%user_info}}';
    }

}
