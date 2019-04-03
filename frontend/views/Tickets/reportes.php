<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\export\ExportMenu;


/* @var $this yii\web\View */
/* @var $searchModel app\models\TicketsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tickets';

?>
<div class="tickets-index">

    <h1><?= Html::encode($this->title) ?></h1>

<?php 

$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
            'Nro_Ticket',
            'Departamento',
            'Prioridad',
            'Detalle',
            'Usuario',
            'FechaRegistro',
            //'Estatus',
            'FechaSolucion',
    //['class' => 'yii\grid\ActionColumn'],
];

    echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns
]);


echo \kartik\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns
]);


?>
</div>
