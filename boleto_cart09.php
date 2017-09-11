<?php

require_once("includes/conexao.php");

//$user_id = $_SESSION['user_id'];

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
		                    	<table cellpadding="0"  cellspacing="0" width="100%">
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
            Gerar Cobrança Manual de Boleto Carteira 09</td>
    </tr>
	<TR>
		<TD>
		 <fieldset class="Literal">
                <legend class="Literal">Informações Gerais</legend>
						<?php
                        $palavra = $_POST['id_boleto'];
						$sql=mysql_query("SELECT a.id_boleto, a.numdoc, a.valor, a.venc, a.dtpgto, a.vlpago,  a.status_boleto, a.idcli, a.nome, b.nome_st_boleto
						FROM boletos as a
						LEFT JOIN status_boleto as b ON a.status_boleto = b.id_status
						WHERE id_boleto = '$palavra'") or die (mysql_error());
						$res=mysql_fetch_array($sql);
						echo "<table width='400' class='TextoNormal'>
						<form id='form1' name='form1' action='sql_boleto_cart09.php' method='post'>
                        <tr>
                          <td>Cliente:</td>
                          <td width='215'><select id='id_cadastro' name='id_cadastro' class='CampoTexto'>
                          	<option value='0'>-- Selecione --</option>";
                            	$sql_cadastro = mysql_query('SELECT id, nome, sobrenome FROM cadastro ORDER BY nome');
								while($res_cadastro = mysql_fetch_array($sql_cadastro) ) {
                                echo '<option value="'.$res_cadastro['id'].'">'.$res_cadastro['nome'].' '.$res_cadastro['sobrenome'].'</option>';
                                                        }
                        echo "</select></td></tr>
						<tr><td>Número do Documento: </td>
                            <td><input name='numdoc' type='text' name='numdoc' class='CampoTexto'></td>
                        </tr>
						<tr>
                            <td>Nosso Número: </td>
                            <td><input name='nossonumero' type='text' name='nossonumero' class='CampoTexto'></td>
                        </tr>
                        <tr>
                            <td>Valor do Boleto: </td>
                            <td><input name='valor' type='text' name='valor' class='CampoTexto' onkeyup='numMoeda(event,this);' maxlength='15'></td>
                        </tr>
                        <tr>
                            <td>Vencimento: </td>
                            <td><input name='venc' type='text' name='venc' class='CampoTexto' onkeyup='FormataData(this,event)' maxlength='10'></td>
                        </tr>
						<tr>
                            <td>Status: </td>
                            <td>
							
							<select id='status_boleto' name='status_boleto' class='CampoTexto'>
									<option value='".$res['id_status']."'>".$res['nome_st_boleto']."</option>";
									$sql_pag = "SELECT id_status, nome_st_boleto FROM status_boleto ORDER BY id_status";
									$res_pag = mysql_query($sql_pag) or die (mysql_error());
									while ($row = mysql_fetch_assoc($res_pag)) {
										echo '<option value="'.$row['id_status'].'">'.$row['nome_st_boleto'].'</option>';
									}
							echo "</td>
                        </tr>
						<tr><td><br>
							<input type='submit' id='atualizar' class='Botao' value=' Gerar Cobrança '>
						</td></tr>
                    </table>
            </fieldset>
		</TD>
	</TR>
	<tr>
	    <td>&nbsp;
            </td>
	</tr>
</form></TABLE>";
?>                
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