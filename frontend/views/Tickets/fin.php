
<?php
$id = $_GET['id'];
  $query = (new \yii\db\Query())
    ->select('Nro_Ticket, Respuesta')
    ->from('respuesta')
    ->where(['Nro_Ticket' => $id])
    ->all();
?>
<p><strong> Respuestas para el Ticket Numero <?php echo $id; ?> </strong></p>

<?php
    if($query!=null){
    foreach ($query as $key => $value) {
    	
   ?>
   
   <textarea class="form-control"><?php echo $value['Respuesta']; ?></textarea><br>
   <?php }} 
   else { ?>
   	<textarea class="form-control" >No Posee Respuesta todavia a la solicitud</textarea>
  <?php }
   	?>
