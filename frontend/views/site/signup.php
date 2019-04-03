<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Registro';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor ingrese los siguientes datos para registrarse: </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'Usuario')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'Departamento')->dropDownList(['DIRECCION' => 'DIRECCION', 'ADMINISTRACION' => 'ADMINISTRACION', 'COMPRAS' => 'COMPRAS', 'SISTEMAS' => 'SISTEMAS', 'TALENTO HUMANO' => 'TALENTO HUMANO', 'INNOVACION' => 'INNOVACION','LOGISTICA' => 'LOGISTICA', 'MANTENIMIENTO' => 'MANTENIMIENTO', 'OPERACIONES' => 'OPERACIONES', 'SEGURIDAD INDUSTRIAL' => 'SEGURIDAD INDUSTRIAL', 'SHIAO Y CALIDAD' => 'SHIAO Y CALIDAD', 'VENTAS' => 'VENTAS'],['prompt'=>'Seleccione una Opcion']);  ?>

                <?= $form->field($model, 'Rol')->dropDownList(['0' => 'Usuario'],['prompt'=>'Select Option']); ?>

                <div class="form-group">
                    <?= Html::submitButton('Registrarse', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
