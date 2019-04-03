<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tickets */

$this->title = 'Update Tickets: ' . $model->Nro_Ticket;
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Nro_Ticket, 'url' => ['view', 'id' => $model->Nro_Ticket]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tickets-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
