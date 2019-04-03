<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TicketsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tickets-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Nro_Ticket') ?>

    <?= $form->field($model, 'Departamento') ?>

    <?= $form->field($model, 'Prioridad') ?>

    <?= $form->field($model, 'Detalle') ?>

    <?= $form->field($model, 'Usuario') ?>

    <?php // echo $form->field($model, 'FechaRegistro') ?>

    <?php // echo $form->field($model, 'FechaSolucion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
