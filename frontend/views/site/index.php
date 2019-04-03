<?php

/* @var $this yii\web\View */

$this->title = 'Support Plastyquim';
?>
<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\data\Pagination;


$Usuario = Yii::$app->user->identity->Usuario;
$query = (new \yii\db\Query())
            ->select('Rol')
            ->from('user')
            ->where(['Usuario' => $Usuario])
            ->all();



        foreach ($query as $key => $Rol) {

?>

<?php if($Rol['Rol']==1){

$query2 = (new \yii\db\Query())
            ->select('Nro_Ticket')
            ->from('tickets')
            ->all();
}

else {
    $query2 = (new \yii\db\Query())
            ->select('Nro_Ticket')
            ->from('tickets')
            ->where(['Usuario' => $Usuario])
            ->all();
}

if($query2!=null){

?>

<div class="site-index">

    <div class="body-content">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
        <br>
        <h1>Tickets Creados</h1>
        <div class="table-responsive">
        <table class="table table-hover table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Nro Ticket</th>
                        <th>Prioridad</th>
                        <th>Detalle</th>
                        <th>Usuario</th>
                        <th>Fecha de Registro</th>
                        <th>Fecha de Solucion</th>
                        <th></th>
                        <?php if($Rol['Rol']==1){
                        ?>
                        <th></th>
                        <th></th>
                        <th> Estatus </th>
                        <?php } 
                        else {
                            ?> 
                            <th>Estatus</th>
                            <?php
                        }
                            ?>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($models as $key => $value) 
                    { ?>
                    <tr>
                        <td> <?=$value['Nro_Ticket'] ?></td>
                        <td><?=$value['Prioridad'] ?></td>
                        <td><?=$value['Detalle'] ?></td>
                        <td><?=$value['Usuario'] ?></td>
                        <td><?=$value['FechaRegistro'] ?></td>
                        <td><?=$value['FechaSolucion'] ?></td>
                        <td> <?= Html::button('Ver Respuestas', ['id' => 'modelButton', 'value' =>Url::to(['tickets/fin', 'id'=>$value["Nro_Ticket"]]), 'class' => 'btn btn-info ver']) ?>
                        </td>
                        <?php if($Rol['Rol']==1){
                        ?>
                        <td> <?= Html::button('Responder', ['id' => 'Respuesta', 'value' =>Url::to(['tickets/respuesta', 'id'=>$value["Nro_Ticket"]]), 'class' => 'btn btn-success Respuesta']) ?> </td>
                        <td> <?= Html::button('Finalizar', ['id' => 'Finalizar', 'value' =>Url::to(['tickets/finalizar', 'id'=>$value["Nro_Ticket"]]), 'class' => 'btn btn-warning Finalizar']) ?> </td>


                        <?php }
                        if($value['Estatus']==1){
                        ?>
                        <td><img src="bien.png" width="40px;" height="40px;"></td>
                        <?php } 
                        else { ?>
                            <td><img src="mal.png" width="40px;" height="40px;"></td>
                       <?php }
                            ?>
                    </tr>
                    <?php } ?>
                </tbody>
                    
        </table>

                </div>

            </div>
            
        </div>

    </div>
</div>

<div class="row">
<div class="col-lg-12 col-sm-12 col-xs-12">

<?php
}

else { ?>

<div class="alert alert-info">
  <strong> No existen tickets Creados Todavia... </strong>
</div>

<?php
}

}



echo LinkPager::widget([
    'pagination' => $pages,
    'nextPageLabel'=> 'Next',
    'firstPageLabel'=>'First',
    'lastPageLabel' =>'Last',
    'prevPageLabel' => 'Prev',
]);

?>
</div>
</div>
<?php
            
    Modal::begin([
            'header' => '<h4>Plastyquim C.A</h4>',
            'id'     => 'model',
            'size'   => 'model-xs',
    ]);
    
    echo "<div id='modelContent'></div>";
    
    Modal::end();

            
?>
<?php 
$script = <<< JS
     
    $('.ver').click(function(){
        $('.modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('value'));

    });

    $('.Respuesta').click(function(){
        $('.modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('value'));

    });

    $('.Finalizar').click(function(){
            $('.modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('value'));


    });


JS;
$this->registerJs($script);
?>

