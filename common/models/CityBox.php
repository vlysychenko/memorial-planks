<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city_box".
 *
 * @property integer $city_id
 * @property string $top_lon
 * @property string $top_lat
 * @property string $left_lon
 * @property string $left_lat
 * @property string $bottom_lon
 * @property string $bottom_lat
 * @property string $right_lon
 * @property string $right_lat
 * @property string $center_lon
 * @property string $center_lat
 *
 * @property City $city
 */
class CityBox extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city_box';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_id', 'top_lon', 'top_lat', 'left_lon', 'left_lat', 'bottom_lon', 'bottom_lat', 'right_lon', 'right_lat', 'center_lon', 'center_lat'], 'required'],
            [['city_id'], 'integer'],
            [['top_lon', 'top_lat', 'left_lon', 'left_lat', 'bottom_lon', 'bottom_lat', 'right_lon', 'right_lat', 'center_lon', 'center_lat'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'city_id' => Yii::t('app', 'City ID'),
            'top_lon' => Yii::t('app', 'Top Lon'),
            'top_lat' => Yii::t('app', 'Top Lat'),
            'left_lon' => Yii::t('app', 'Left Lon'),
            'left_lat' => Yii::t('app', 'Left Lat'),
            'bottom_lon' => Yii::t('app', 'Bottom Lon'),
            'bottom_lat' => Yii::t('app', 'Bottom Lat'),
            'right_lon' => Yii::t('app', 'Right Lon'),
            'right_lat' => Yii::t('app', 'Right Lat'),
            'center_lon' => Yii::t('app', 'Center Lon'),
            'center_lat' => Yii::t('app', 'Center Lat'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
}
