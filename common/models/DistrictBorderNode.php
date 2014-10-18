<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "district_border_node".
 *
 * @property integer $id
 * @property integer $district_id
 * @property string $lon
 * @property string $lat
 * @property integer $order
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property District $district
 */
class DistrictBorderNode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'district_border_node';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['district_id', 'lon', 'lat', 'order', 'created_at', 'updated_at'], 'required'],
            [['district_id', 'order', 'created_at', 'updated_at'], 'integer'],
            [['lon', 'lat'], 'number']
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
            'lon' => Yii::t('app', 'Lon'),
            'lat' => Yii::t('app', 'Lat'),
            'order' => Yii::t('app', 'Order'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['id' => 'district_id']);
    }
}
