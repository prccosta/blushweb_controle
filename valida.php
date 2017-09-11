<?php
session_start();

require_once("includes/conexao.php");
require_once("includes/connbasic.php");

$login = $_POST['login'];
$senha = $_POST['senha'];


	$sql = "SELECT id FROM usuarios WHERE login = '$login' AND senha = MD5('$senha') LIMIT 1";

	$q = mysql_fetch_row(mysql_query($sql));

	$n = mysql_num_rows(mysql_query($sql));

	if($n>0)
	{
		$_SESSION['user_id'] = $q[0];
		header("Location: index.php");
	}else
	{
		header("Location: ../acesso_sistema.php");
		$_SESSION['erro'] = "Dados Errados";
	}
?>