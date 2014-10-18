<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "district_lang".
 *
 * @property integer $id
 * @property string $title
 * @property integer $language_id
 * @property integer $district_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Language $language
 * @property District $district
 */
class DistrictLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'district_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'language_id', 'district_id', 'created_at', 'updated_at'], 'required'],
            [['language_id', 'district_id', 'created_at', 'updated_at'], 'integer'],
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
            'district_id' => Yii::t('app', 'District ID'),
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
    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['id' => 'district_id']);
    }
}
