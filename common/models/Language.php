<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property integer $id
 * @property string $url
 * @property string $locale
 * @property string $title
 * @property integer $default
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property CategoryLang[] $categoryLangs
 * @property CityLang[] $cityLangs
 * @property DistrictLang[] $districtLangs
 * @property EventLang[] $eventLangs
 * @property PersonLang[] $personLangs
 * @property StreetLang[] $streetLangs
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'locale', 'title', 'created_at', 'updated_at'], 'required'],
            [['default', 'created_at', 'updated_at'], 'integer'],
            [['url', 'locale', 'title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'url' => Yii::t('app', 'Url'),
            'locale' => Yii::t('app', 'Locale'),
            'title' => Yii::t('app', 'Title'),
            'default' => Yii::t('app', 'Default'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryLangs()
    {
        return $this->hasMany(CategoryLang::className(), ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCityLangs()
    {
        return $this->hasMany(CityLang::className(), ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrictLangs()
    {
        return $this->hasMany(DistrictLang::className(), ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventLangs()
    {
        return $this->hasMany(EventLang::className(), ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonLangs()
    {
        return $this->hasMany(PersonLang::className(), ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStreetLangs()
    {
        return $this->hasMany(StreetLang::className(), ['language_id' => 'id']);
    }
}
