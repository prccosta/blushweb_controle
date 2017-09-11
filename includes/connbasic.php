<?php
include_once("includes/conexao.php");

if(!mysql_connect('localhost', BD_USER, BD_PASS))
{
	echo 'Houve um erro ao conectar ao Servidor de Banco de Dados, contate o administrador.';
}else
{			if(!mysql_select_db(BD_NAME))
			{
				echo 'Houve erro ao selecionar um banco, contate o administrador.';
			}
}



function AntiInjection($x)
	 {
		 $a1 = strpos($x, 'select');
		 $a2 = strpos($x, 'insert');
		 $a3 = strpos($x, 'update');
		 $a4 = strpos($x, 'delete');
		 $a5 = strpos($x, 'drop');
		 
		
		 
		 if($a1 === false && $a2 === false && $a3 === false && $a4 === false && $a5 === false )
		 {
			return $x;
		 }else
		 {
			return '';
		 }
	  }

?>