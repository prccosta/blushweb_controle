<?php
require_once("includes/conexao.php");

// A sess�o precisa ser iniciada em cada p�gina diferente
if (!isset($_SESSION)) session_start();

$nivel_necessario = 1;

// Verifica se n�o h� a vari�vel da sess�o que identifica o usu�rio
if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {
	// Destr�i a sess�o por seguran�a
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
                                Baixa de Pagamentos dos Boletos em Atraso</td>
                        </tr>
                        <tr>
                            <td>
                                <fieldset class="Literal">
                                  <legend class="Literal">Informa��es Gerais</legend>
                                    <table width="100%" Class="TextoNormal" >					
                                    <tr>
                                        <td vAlign="top">&nbsp;</td>
                                        <td vAlign="middle" align="left"></td>
                                     </tr>
                                     <tr>
                                        <td colSpan="2">
<?php
$_pagi_sql = "SELECT * FROM `boletos` as a 
LEFT JOIN retorno AS b ON a.numdoc = substring(b.nossonum,12,8)
LEFT JOIN status_boleto AS c ON a.status_boleto = c.id_status
WHERE a.numdoc = substring(b.nossonum,12,8) AND a.status_boleto = '2' AND b.id_ocorr IN ('06', '17')
ORDER BY a.venc";
$_pagi_result = mysql_query($_pagi_sql) or die (mysql_error());
while($res2=mysql_fetch_array($_pagi_result)){
							
$id_boleto = $res2['id_boleto'];
$vlpago_total = substr(intval($res2['vl_pago']), 0, -2).".".substr(intval($res2['vl_pago']), -2);
$dtpgto_temp = "20".substr($res2['dt_ocorr_banco'],-2)."-".substr($res2['dt_ocorr_banco'],-4,-2)."-".substr($res2['dt_ocorr_banco'],0,2);
							
$sql = mysql_query("UPDATE boletos SET status_boleto = '3', vlpago = '$vlpago_total', dtpgto = '$dtpgto_temp' where id_boleto = '$id_boleto'") or die(mysql_error());
					}
if($sql){
echo "<br><br><label class='Saudacao'><center>Os boletos foram baixados com sucesso!<br>Clique <a href='baixa_boleto.php'>Aqui</a> para voltar para p�gina de Baixa de Pagamento dos Boletos.</label><br><br>";

} else {
echo "<label class='Saudacao'><center>Ocorreu um erro durante a atualiza��o!<br>Clique <strong><a href='baixa_boleto.php'>Aqui</a></strong> para voltar para p�gina de Baixa de Pagamento dos Boletos.</label><br><br>";
}
			//a cargo do leitor melhorar o filtro anti injection  
			function filter( $str ){  
				return addslashes( $str );  
			}  
			function getPost( $key ){  
				return isset( $_POST[ $key ] ) ? filter( $_POST[ $key ] ) : null;  
			}
			?>
                               </td>
                                     </tr>
                                    </table>
                                </fieldset>
                            </td>
                            </tr>
                        </table>
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