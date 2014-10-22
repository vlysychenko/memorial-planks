<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\District */
/* @var $form yii\widgets\ActiveForm */
/* @var $translations common\models\DistrictLang[] */
/* @var $languages common\models\Language[] */
?>

<div class="district-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'city_id')->textInput() ?>

    <?php foreach($translations as $index => $translation): ?>
        <?= $form->field($translation, 'title')
            ->label(Html::encode($translation
                    ->getAttributeLabel('title') . ' ' . $languages[$translation
                        ->language_id]->title))
            ->textInput([
                'name' => $translation->formName() . '[' . $index . '][title]'
            ]) ?>
    <?php endforeach; ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
