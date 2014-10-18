<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "street".
 *
 * @property integer $id
 * @property integer $city_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Address[] $addresses
 * @property City $city
 * @property StreetLang[] $streetLangs
 */
class Street extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'street';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_id', 'created_at', 'updated_at'], 'required'],
            [['city_id', 'created_at', 'updated_at'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'city_id' => Yii::t('app', 'City ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['street_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStreetLangs()
    {
        return $this->hasMany(StreetLang::className(), ['street_id' => 'id']);
    }
}
