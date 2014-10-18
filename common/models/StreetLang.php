<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "street_lang".
 *
 * @property integer $id
 * @property string $title
 * @property integer $language_id
 * @property integer $street_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Language $language
 * @property Street $street
 */
class StreetLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'street_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'language_id', 'street_id', 'created_at', 'updated_at'], 'required'],
            [['language_id', 'street_id', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'language_id' => Yii::t('app', 'Language ID'),
            'street_id' => Yii::t('app', 'Street ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStreet()
    {
        return $this->hasOne(Street::className(), ['id' => 'street_id']);
    }
}
