<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\District */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'District',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Districts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="district-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'translations' => $translations,
        'languages' => $languages,
        'cities' => $cities,
    ]) ?>

</div>
