<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\District */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'District',
]) . ' ' . $model->translation->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Districts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="district-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'translations' => $translations,
        'languages' => $languages,
        'cities' => $cities,
    ]) ?>

</div>
