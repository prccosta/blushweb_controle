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
		                    	<table cellpadding="0" cellspacing="0" width="100%">
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
                                Setar Parcelas em Atraso</td>
                        </tr>
                        <tr>
                            <td>
                                <fieldset class="Literal">
                                    <legend class="Literal">Informações Gerais</legend>
                                    <table width="100%" Class="TextoNormal" >
                                    	<form id="form1" name="form1" action="sql_setaatraso.php" method="post">
                                    <tr>
                                        <td>
                                            <div>
                                                <input type="submit" ID="btSetaAtraso" value="Setar Atraso" class="Botao"><br><br>
                                                    <tr><td colspan="2">
                                      <table width="100%">
                                      	<TR class="TextoTopo" align="center">
                                        	<TD width="9%">Numdoc</TD>
                                        	<TD width="21%">Responsável</TD>
                                        	<TD width="9%">Vencimento</TD>
                                        	<TD width="9%">Valor</TD>
                                        	<TD width="8%">Data Pgto</TD>
                                            <TD width="8%">Valor Pago</TD>
                                        	<TD width="9%">Status</TD> 
                                        </TR>
     <?php
	$data_hoje = date('Y-m-d');
	$data_ontem = gmdate("Y-m-d", time()-(3600*27));												  
	$sql = "SELECT * FROM boletos where venc < '$data_ontem' and status_boleto = '1' order by venc";  

	$sql_query = mysql_query($sql) or die (mysql_error());
	if (mysql_num_rows($sql_query)){ 
	while($res=mysql_fetch_array($sql_query)){
														
	$id_cadastro_temp = $res['id_boleto'];
	$sql2 = mysql_query("SELECT a.id_boleto, a.idcli, a.status_boleto, b.id_status, b.nome_st_boleto, c.id, c.responsavel
		FROM boletos as a
		LEFT JOIN status_boleto as b ON a.status_boleto = b.id_status
		LEFT JOIN cadastro as c ON a.idcli = c.id
		WHERE id_boleto = $id_cadastro_temp") or die (mysql_error());
		$res2 = mysql_fetch_array($sql2);

		echo "
		<table width='100%'>
		<tr align='center'>
		<td><input name='numdoc' type='text' name='numdoc' class='CampoForm2' readonly value='".$res['numdoc']."'></td>
		<td><input name='idcli' type='text' id='idcli' class='CampoForm' readonly value='".$res2['responsavel']."'></td>
		<td><input name='venc' type='text' id='venc' class='CampoForm2' readonly value='".date_format(new DateTime($res['venc']), "d/m/Y")."'></td>
		<td><input name='valor' type='text' id='valor' class='CampoForm2' readonly value='".$res['valor']."'></td>
		<td><input name='dtpgto' type='text' id='dtpgto' class='CampoForm2' readonly value='".$res['dtpgto']."'></td>
		<td><input name='vlpago' type='text' id='vlpago' class='CampoForm2' readonly value='".$res['vlpago']."'></td>
		<td><input name='status_boleto_nome' type='text' id='status_boleto_nome' class='CampoForm2' readonly value='".$res2['nome_st_boleto']."'>
			<input name='status_boleto' type='hidden' id='status_boleto' value='".$res['status_boleto']."'></td>
		</tr></table>";
			}
			}
			//a cargo do leitor melhorar o filtro anti injection  
			function filter( $str ){  
				return addslashes( $str );  
			}  
			function getPost( $key ){  
				return isset( $_POST[ $key ] ) ? filter( $_POST[ $key ] ) : null;  
			}
			?>
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
        </form>
</body>
</html>
