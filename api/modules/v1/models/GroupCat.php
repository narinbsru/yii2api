<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "group_cat".
 *
 * @property string $group_cat_id
 * @property string $group_cat_name
 * @property integer $group_cat_enable
 *
 * @property Catagories[] $catagories
 */
class GroupCat extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'group_cat';
    }

    public function fields() {
        //$fields = parent::fields();

        // remove fields
        //unset($fields['group_cat_enable']);
        
        //return $fields;
        
        return [
            'group_catgories_id' => 'group_cat_id',
            'group_catgories_name' => 'group_cat_name',
            //'name' => function ($model) {
            //    return $model->first_name . ' ' . $model->last_name;
            //},
        ];
        
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['group_cat_enable'], 'integer'],
            [['group_cat_name'], 'string', 'max' => 200],
            [['group_cat_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'group_cat_id' => Yii::t('app', 'Group Cat ID'),
            'group_cat_name' => Yii::t('app', 'Group Cat Name'),
            'group_cat_enable' => Yii::t('app', 'Group Cat Enable'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatagories() {
        return $this->hasMany(Catagories::className(), ['Group_cat_group_cat_id' => 'group_cat_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\activequeries\GroupCatQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\activequeries\GroupCatQuery(get_called_class());
    }

}
