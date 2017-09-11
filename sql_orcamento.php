<title>::. Blush!'s World - &Aacute;rea Administrativa .::</title>
<link href="css/geral.css" rel="stylesheet" type="text/css" />
<?php
require_once("includes/conexao.php");
require_once("includes/connbasic.php");
include "post.php";

		$ano=mysql_escape_string($_POST['ano']); 
		$data=mysql_escape_string($_POST['data']);
		$cliente=mysql_escape_string($_POST["cliente"]);
		$email=mysql_escape_string($_POST["email"]);
		$tiposite=mysql_escape_string($_POST["tiposite"]);
		$tecnologia=mysql_escape_string($_POST["tecnologia"]);
		$tiposite2=mysql_escape_string($_POST["tiposite2"]);
		$empresa=mysql_escape_string($_POST["empresa"]);
		$obs=mysql_escape_string($_POST["obs"]);
		$etapa1=mysql_escape_string($_POST["etapa1"]);
		$etapa2=mysql_escape_string($_POST["etapa2"]);
		$etapa3=mysql_escape_string($_POST["etapa3"]);
		$valor=mysql_escape_string($_POST["valor"]);
		$extenso=mysql_escape_string($_POST["extenso"]);
		$formapag=mysql_escape_string($_POST["formapag"]);
					
		$sql=mysql_query("INSERT INTO orcamento set
		ano = '$ano',
		data = '$data',
		cliente = '$cliente',
		email = '$email',
		tiposite = '$tiposite',
		tecnologia = '$tecnologia',
		tiposite2 = '$tiposite2',
		empresa = '$empresa',
		obs = '$obs',
		etapa1 = '$etapa1',
		etapa2 = '$etapa2',
		etapa3 = '$etapa3',
		valor = '$valor',
		extenso = '$extenso',
		formapag = '$formapag',
		DataCadastro=now()") or die ( mysql_error());

		$consulta=mysql_query("SELECT * FROM orcamento WHERE email = '$email'");
		$exibe=mysql_fetch_array($consulta);
		$id = $exibe['id'];
		
		if($sql){
			echo "<br><br><br><br><center><font color='#1E90FF'><form action='gera_pdf_orcamento.php' method='post' name='gera_orcamento' id='gera_orcamento'>";
			echo "<br><br>Você gerou o Orçamento número: ".$id." <br><br>Clique no botão <input type='submit' name='Gerar Orçamento' id='Gerar Orçamento' value='Gerar Orçamento'> para gerar o PDF.<input name='id' type='hidden' id='id' value='$id'>
			<br><br>Clique <strong><a href='orcamentos.php'>aqui</a></strong> para voltar para página de Orçamentos!";
			} else {
			echo "Ocorreu um erro durante o cadastro!<br>Clique <strong><a href='orcacrisite.php'>Aqui</a></strong> para voltar para página inicial!</form></font></center>";
			}
?>