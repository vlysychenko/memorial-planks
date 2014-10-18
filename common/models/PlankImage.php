<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plank_image".
 *
 * @property integer $image_id
 * @property integer $plank_id
 *
 * @property Image $image
 * @property Plank $plank
 */
class PlankImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plank_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image_id', 'plank_id'], 'required'],
            [['image_id', 'plank_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'image_id' => Yii::t('app', 'Image ID'),
            'plank_id' => Yii::t('app', 'Plank ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlank()
    {
        return $this->hasOne(Plank::className(), ['id' => 'plank_id']);
    }
}
