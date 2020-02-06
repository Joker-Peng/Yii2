<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\CategoryForm;
use backend\models\BlogForm;

/* @var $this yii\web\View */
/* @var $model common\models\Blog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blog-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'content')->textArea(['maxlength' => true, 'rows' => 10]) ?>
    <?= $form->field($model, 'is_delete')->dropDownList(BlogForm::dropDownList('is_delete')) ?>
    <?= $form->field($model, 'category')->label('栏目')->checkboxList(CategoryForm::dropDownList()) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
