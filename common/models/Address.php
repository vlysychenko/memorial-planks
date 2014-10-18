<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property integer $id
 * @property integer $district_id
 * @property integer $street_id
 * @property string $house
 * @property integer $is_autofilled
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Street $street
 * @property District $district
 * @property Plank[] $planks
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['district_id', 'street_id', 'is_autofilled', 'created_at', 'updated_at'], 'required'],
            [['district_id', 'street_id', 'is_autofilled', 'created_at', 'updated_at'], 'integer'],
            [['house'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'district_id' => Yii::t('app', 'District ID'),
            'street_id' => Yii::t('app', 'Street ID'),
            'house' => Yii::t('app', 'House'),
            'is_autofilled' => Yii::t('app', 'Is Autofilled'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStreet()
    {
        return $this->hasOne(Street::className(), ['id' => 'street_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['id' => 'district_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanks()
    {
        return $this->hasMany(Plank::className(), ['address_id' => 'id']);
    }
}
