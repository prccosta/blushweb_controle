<?php
require_once("includes/conexao.php");

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

$nivel_necessario = 1;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
	// Destrói a sessão por segurança
	session_destroy();
	// Redireciona o visitante de volta pro login
	header("Location: index.php"); exit;
}
?>
<!DOCTYPE html>
<html lang="br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>SCCF - Sistema de Controle de Cobran&ccedil;a e Finan&ccedil;as</title>
    <link href="css/Style.css" rel="stylesheet" type="text/css">
    <link href="css/admin_styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/nav.css">
    <script src="js/formulas.js" type="text/javascript"></script>
    <!--[if IE]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body leftmargin="0" topmargin="0" class="no-js">
<script language="javascript">
<!--
function fnSetaExcluir(peObj){
	
	if(peObj.checked){
		document.forms[0].hdExcluir.value += peObj.value + ',';
	}else{
		var vetChaves = document.forms[0].hdExcluir.value.split(',');
		document.forms[0].hdExcluir.value = '';

		for(i=0;i < vetChaves.length - 1; i++){
			if(vetChaves[i] != peObj.value){
				document.forms[0].hdExcluir.value += vetChaves[i] + ',';
			}
		}
	}
}
//-->
</script>
		<script>
			var el = document.getElementsByTagName("body")[0];
			el.className = "";
		</script>
        <noscript>
        	<!--[if IE]>
            	<link rel="stylesheet" href="css/ie.css">
            <![endif]-->
        </noscript>

    <table width="100%" height="100%"  cellpadding="0"  cellspacing="0"  border="0">
		<tr>
			<td background="img/fundo_admin.jpg" align="center" >
				<table width="100" cellpadding="0"  cellspacing="0" >
					<tr>
						<td width="150" >&nbsp;</td>
						<td class="LarguraMenu">
		                    	<table  bgcolor="#fff" cellpadding="0"  cellspacing="0" width="100%">
										<tr>
											<td height="79" valign="top" align="center">
												<img src="img/logo.jpg">
											</td>
										</tr>
										<tr>
											<td height="31" align="center">
												<table height="31" background="img/Linhas.jpg" class="LarguraMenu">
													<tr>
														<td width="150">
														<?php include_once('menu.php'); ?>
                                                        </td>
													</tr>
												</table>
                                                
											</td>
										</tr>
										<tr>
											<td background="img/linha_footer.jpg">&nbsp;</td>
										</tr>
									</table>							
                        </td>
					</tr>
                    <tr>
					<table width="100%" class="Borda1N" id="TABLE2" language="javascript" background="img/fundo.jpg">
                        <tr>
                            <td class="TextoTopo">
                                Importação do arquivo para o servidor</td>
                        </tr>
                        <tr>
                            <td>
                                <fieldset class="Literal">
                                  <legend class="Literal">Informações Gerais</legend>
                                    <table width="100%" Class="TextoNormal" >					
                                    
                                        </td>
                                      </tr>
                                      <tr><td>
<?php
$arquivo_temp = $_POST['arquivo_temp'];
error_reporting(0);
$arquivo = fopen($arquivo_temp,'r');
//$arquivo = fopen(getPost('arquivo_temp'),'r');

if(!($abre = fopen('delimitador.txt', "w"))){print "Não foi possivel criar arquivo, talvez ele já exista.";die();}

if ($arquivo == false) die('Não foi possível abrir o arquivo.');

	$delimitador = "|";
	
	while(!feof($arquivo)) {
	$valor = fgets($arquivo);
	
	$dados = $campo1 = substr($valor, 0, 1).$delimitador.
		 $campo2 = substr($valor, 1, 2).$delimitador.
		 $campo3 = substr($valor, 3, 14).$delimitador.
		 $campo4 = substr($valor, 17, 3).$delimitador.
		 $campo5 = substr($valor, 20, 17).$delimitador.
		 $campo6 = substr($valor, 37, 25).$delimitador.
		 $campo7 = substr($valor, 62, 8).$delimitador.
		 $campo8 = substr($valor, 70, 12).$delimitador.
		 $campo9 = substr($valor, 82, 10).$delimitador.
		 $campo10 = substr($valor, 92, 12).$delimitador.
		 $campo11 = substr($valor, 104, 1).$delimitador.
		 $campo12 = substr($valor, 105, 2).$delimitador.
		 $campo13 = substr($valor, 107, 1).$delimitador.
		 $campo14 = substr($valor, 108, 2).$delimitador.
		 $campo15 = substr($valor, 110, 6).$delimitador.
		 $campo16 = substr($valor, 116, 10).$delimitador.
		 $campo17 = substr($valor, 126, 20).$delimitador.
		 $campo18 = substr($valor, 146, 6).$delimitador.
		 $campo19 = substr($valor, 152, 13).$delimitador.
		 $campo20 = substr($valor, 165, 3).$delimitador.
		 $campo21 = substr($valor, 168, 5).$delimitador.
		 $campo22 = substr($valor, 173, 2).$delimitador.
		 $campo23 = substr($valor, 175, 13).$delimitador.
		 $campo24 = substr($valor, 188, 13).$delimitador.
		 $campo25 = substr($valor, 201, 13).$delimitador.
		 $campo26 = substr($valor, 214, 13).$delimitador.
		 $campo27 = substr($valor, 227, 13).$delimitador.
		 $campo28 = substr($valor, 240, 13).$delimitador.
		 $campo29 = substr($valor, 253, 13).$delimitador.
		 $campo30 = substr($valor, 266, 13).$delimitador.
		 $campo31 = substr($valor, 279, 13).$delimitador.
		 $campo32 = substr($valor, 292, 2).$delimitador.
		 $campo33 = substr($valor, 294, 1).$delimitador.
		 $campo34 = substr($valor, 295, 6).$delimitador.
		 $campo35 = substr($valor, 301, 3).$delimitador.
		 $campo36 = substr($valor, 304, 10).$delimitador.
		 $campo37 = substr($valor, 314, 4).$delimitador.
		 $campo38 = substr($valor, 318, 10).$delimitador.
		 $campo39 = substr($valor, 328, 40).$delimitador.
		 $campo40 = substr($valor, 368, 2).$delimitador.
		 $campo41 = substr($valor, 370, 10).$delimitador.
		 $campo42 = substr($valor, 380, 14).$delimitador.
		 $campo43 = substr($valor, 394, 6)."\r\n";
	
	//echo $dados.'<br><br>';
	
	$insere = mysql_query("INSERT INTO retorno (`id_retorno`, `id_reg`,`tp_inscr_emp`,`inscr_emp`,`zeros`, `id_emp_banco`, `contr_part`, `zeros2`, `id_tit_banco`, `uso_banco`, `uso_banco2`, `ind_rateio`, `zeros3`, `carteira`, `id_ocorr`, `dt_ocorr_banco`, `numdoc1`, `nossonum`, `dt_venc_tit`, `vl_titulo`, `banco`, `agencia`, `esp_tit`, `desp_cobr_oco`, `outras_desp`, `juros_atraso`, `iof_devido`, `abat_conced_tit`, `desc_conced`, `vl_pago`, `juros_mora`, `outros_cred`, `brancos1`, `motivo_ocorr`, `dt_credito`, `orig_pag`, `bancos2`, `cheque_bradesco`, `motivo_rejei`, `brancos3`, `cartorio`, `protocolo`, `brancos4`, `seq_reg`) VALUES ('', '$campo1', '$campo2', '$campo3', '$campo4', '$campo5', '$campo6', '$campo7', '$campo8', '$campo9', '$campo10', '$campo11', '$campo12', '$campo13', '$campo14', '$campo15', '$campo16', '$campo17', '$campo18', '$campo19', '$campo20', '$campo21', '$campo22', '$campo23', '$campo24', '$campo25', '$campo26', '$campo27', '$campo28', '$campo29', '$campo30', '$campo31', '$campo32', '$campo33', '$campo34', '$campo35', '$campo36', '$campo37', '$campo38', '$campo39', '$campo40', '$campo41', '$campo42', '$campo43')") or die (mysql_error());
	
	$escreve = fwrite($abre, "$dados");
	}
	echo "<br><label class='Saudacao'><center>Os dados foram importados para a Base de dados com sucesso!<br>
	<br>Clique <b><a href='baixa_boleto.php'>AQUI</a></b> para baixar os boletos.</label>";

	fclose($arquivo);
	
	$ArqOrig = 'delimitador.txt';
	$ArqDest = ('retorno/delimitador.txt');
	$arq_delete = ($arquivo_temp);
						 
	//copio o arquivo para a pasta de destino
	copy($ArqOrig, $ArqDest);
	//apago o arquivo da pasta onde se encontra o arquivo
	unlink($ArqOrig);
	unlink($ArqDest);
	unlink($arq_delete);
	
	
			//a cargo do leitor melhorar o filtro anti injection  
			function filter( $str ){  
				return addslashes( $str );  
			}  
			function getPost( $key ){  
				return isset( $_POST[ $key ] ) ? filter( $_POST[ $key ] ) : null;  
			}
			?>
                                      
            </td></tr>
            <tr><td><br></td></tr>
            <tr><td><br></td></tr>
			</table>
            </td></tr></table>
                        
    	<script src="js/jquery.js"></script>
        <script src="js/modernizr.js"></script>
		<script>
			(function($){
				
				//cache nav
				var nav = $("#topNav");
				
				//add indicator and hovers to submenu parents
				nav.find("li").each(function() {
					if ($(this).find("ul").length > 0) {
						$("<span>").text("^").appendTo($(this).children(":first"));

						//show subnav on hover
						$(this).mouseenter(function() {
							$(this).find("ul").stop(true, true).slideDown();
						});
						
						//hide submenus on exit
						$(this).mouseleave(function() {
							$(this).find("ul").stop(true, true).slideUp();
						});
					}
				});
			})(jQuery);
		</script>
        </body>
</html>