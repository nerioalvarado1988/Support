<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Tickets */
/* @var $form yii\widgets\ActiveForm */
$Usuario = Yii::$app->user->identity->Usuario;
$FechaRegistro = date("Y-m-d H:i:s");
$FechaSolucion = date("0000-00-00 00:00:00.000000");

$connection = new \yii\db\Connection([
    'dsn' => 'mysql:host=localhost;dbname=support',
    'username' => 'root',
    'password' => '',
]);
$connection->open();
  
 $Departamento = $connection->createCommand("Select Departamento from user where Usuario= '".$Usuario."'")->queryAll();

 foreach ($Departamento as $key => $value) {
    

?>

<div class="tickets-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Departamento')->textInput(['value'=> $value['Departamento'], 'readonly'=>true])?>

    <?= $form->field($model, 'Prioridad')->dropDownList(['Alta' => 'Alta', 'Media' => 'Media', 'Baja' => 'Baja'],['prompt'=>'Seleccione una Opcion']); ?>

    <?= $form->field($model, 'Detalle')->textarea(['rows' => '6']) ?>

    <?= $form->field($model, 'Usuario')->textInput(['value'=> $Usuario, 'readonly'=>true])?>

    <?= $form->field($model, 'FechaRegistro')->textInput(['value'=> $FechaRegistro, 'readonly'=>true])?>

    <?= $form->field($model, 'FechaSolucion')->textInput(['value'=> $FechaSolucion, 'readonly'=>true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Crear', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php } ?>