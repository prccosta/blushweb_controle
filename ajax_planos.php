<?php
ob_start();
require_once("includes/conexao.php");
require("includes/config_variaveis.php");

$id_plano = $_POST['id_plano'];

$sql = "SELECT * FROM tipo_plano WHERE id_plano = '$id_plano' ORDER BY id_plano ASC";
$qr = mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($qr) == 0){
   echo  '<option value="0">'.htmlentities('Aguardando plano...').'</option>';
   
}else{
   	  echo '<option value="">Selecione valor...</option>';
   while($ln = mysql_fetch_assoc($qr)){
      echo '<option value="'.$ln['id_plano'].'">'.$ln['id_plano'].' - '.$ln['valor'].'</option>';
	  
   }
}

?>