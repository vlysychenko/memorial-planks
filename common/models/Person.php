<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property integer $id
 * @property string $date_birth
 * @property string $date_death
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property PersonCategory[] $personCategories
 * @property Category[] $categories
 * @property PersonEvent[] $personEvents
 * @property Event[] $events
 * @property PersonLang[] $personLangs
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_birth', 'date_death'], 'safe'],
            [['created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'date_birth' => Yii::t('app', 'Date Birth'),
            'date_death' => Yii::t('app', 'Date Death'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonCategories()
    {
        return $this->hasMany(PersonCategory::className(), ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])->viaTable('person_category', ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonEvents()
    {
        return $this->hasMany(PersonEvent::className(), ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['id' => 'event_id'])->viaTable('person_event', ['person_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonLangs()
    {
        return $this->hasMany(PersonLang::className(), ['person_id' => 'id']);
    }
}
