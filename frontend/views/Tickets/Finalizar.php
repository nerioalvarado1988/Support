<?php
use yii\db\Command;

$id = $_GET['id'];
$FechaSolucion = date("Y-m-d H:i:s");

  $connection = new \yii\db\Connection([
    'dsn' => 'mysql:host=localhost;dbname=support',
    'username' => 'root',
    'password' => '',
]);
$connection->open();
  
 $query = $connection->createCommand("Select Respuesta from Respuesta where Nro_Ticket= '".$id."'")->execute();
 $query2 = $connection->createCommand("Select FechaSolucion from tickets where Nro_Ticket= '".$id."'")->queryAll();


foreach ($query2 as $key => $value) {
	



 if($query != null && $value['FechaSolucion']=='0000-00-00 00:00:00.000000'){


  $connection->createCommand("UPDATE tickets SET FechaSolucion='".$FechaSolucion."' WHERE Nro_Ticket= '".$id."' ")->execute();
  $connection->createCommand("UPDATE tickets SET Estatus='1' WHERE Nro_Ticket= '".$id."' ")->execute();
?>
 <div class="alert alert-success">
 <strong> Se Finalizo con exito el Ticket  </strong>
</div>

 <?php }

 else {

 ?>

<div class="alert alert-danger">
  <strong> No se encuentra registrada una respuesta o ya finalizo este ticket </strong>
</div>

 <?php } }
 
?>

