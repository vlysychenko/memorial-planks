<?php

namespace common\behaviors;

use yii\base\Behavior;

/**
 * TranslationBehavior adds getTranslation method, which returns associated
 * translation model
 *
 * @author vlysychenko
 */
class TranslationBehavior extends Behavior {

    /**
     *
     * @var string 
     */
    private $_translationModelClassName;
    
    /**
     * Attribute name in lang table to associate with current model instance
     * @var string 
     */
    private $_linkAttribute;

    /**
     * 
     * @return string
     */
    public function getTranslationModelClassName(){
        return $this->_translationModelClassName;
    }
    
    /**
     * 
     * @param string $translationModellClassName
     */
    public function setTranslationModelClassName($translationModellClassName) {
        $this->_translationModelClassName = $translationModellClassName;
    }
    
    /**
     * 
     * @return string
     */
    public function getLinkAttribute(){
        return $this->_linkAttribute;
    }
    
    /**
     * 
     * @param string $linkAttribute
     */
    public function setLinkAttribute($linkAttribute){
        $this->_linkAttribute = $linkAttribute;
    }

    /**
     * 
     * @param string $locale - translation model is searched for this locale
     * @return \yii\db\ActiveQuery 
     * 
     * @throws \yii\base\InvalidValueException
     */
    public function getTranslation($locale = null) {
        
        if (!$this->_translationModelClassName) {
            $this->_translationModelClassName = $this->owner->className() . 'Lang';
        }

        if (!$this->_linkAttribute) {
            $tableName = call_user_func([$this->owner->className(), 'tableName']);
            if ($tableName !== false) {
                $this->_linkAttribute = $tableName . '_id';
            }else{
                throw new \yii\base\InvalidValueException('Unable to generate link attribute name. You should provide [linkAttribute] property in TranslationBehavior');
            }
        }

        $condition = ['locale'
            => $locale === null? \Yii::$app->language : $locale];

        return $this
                ->owner
                ->hasOne($this->_translationModelClassName,
                        [$this->_linkAttribute => 'id'])
                ->joinWith('language')
                ->where($condition);
    }

}
