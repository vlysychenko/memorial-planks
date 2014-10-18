<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plank".
 *
 * @property integer $id
 * @property string $lon
 * @property string $lat
 * @property integer $address_id
 * @property string $date_installed
 * @property integer $event_id
 * @property integer $user_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $user
 * @property Address $address
 * @property Event $event
 * @property PlankImage[] $plankImages
 */
class Plank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lon', 'lat', 'address_id', 'event_id', 'user_id', 'created_at', 'updated_at'], 'required'],
            [['lon', 'lat'], 'number'],
            [['address_id', 'event_id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['date_installed'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'lon' => Yii::t('app', 'Lon'),
            'lat' => Yii::t('app', 'Lat'),
            'address_id' => Yii::t('app', 'Address ID'),
            'date_installed' => Yii::t('app', 'Date Installed'),
            'event_id' => Yii::t('app', 'Event ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'event_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlankImages()
    {
        return $this->hasMany(PlankImage::className(), ['plank_id' => 'id']);
    }
}
