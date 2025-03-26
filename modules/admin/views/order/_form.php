<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Order $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'comment_admin')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::a('Назад',['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::submitButton('Отменить заказ', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
