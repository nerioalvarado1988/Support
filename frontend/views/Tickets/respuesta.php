
 <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Tickets */
/* @var $form yii\widgets\ActiveForm */

$FechaSolucion = date("Y-m-d H:i:s");
$id = $_GET['id'];

?>

<div class="respuesta-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'Nro_Ticket')->textInput(['value'=> $id, 'readonly'=>true])?>


    <?= $form->field($model, 'Respuesta')->textarea(['rows' => '6']) ?>

    <div class="form-group">
        <?= Html::submitButton('Responder', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


