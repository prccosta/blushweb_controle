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
            Atualização de Cliente</td>
    </tr>
	<TR>
		<TD>
		 <fieldset class="Literal">
                <legend class="Literal">Informações Gerais</legend>
						<?php
                        $palavra = $_POST['id_cliente'];
						$sql=mysql_query("SELECT * FROM cadastro WHERE id = '$palavra'") or die (mysql_error());
						$res=mysql_fetch_array($sql);
						echo "<table width='600' class='TextoNormal' >
						<form id='form1' name='form1' action='sql_editar_cliente.php' method='post'>
                        <tr>
							<input name='id_cadastro' type='hidden' name='id_cadastro' value='".$res['id']."'>
                            <td>NOME: </td>
                            <td><input name='nome' type='text' name='nome' class='CampoForm3' value='".$res['nome']."'></td>
                        </tr>
						<tr>
                            <td>SOBRENOME: </td>
                            <td><input name='sobrenome' type='text' name='sobrenome' class='CampoForm3' value='".$res['sobrenome']."'></td>
                        </tr>
                        <tr>
                            <td>TIPO CLIENTE: </td>
                            <td><input name='tipo_cliente' type='text' name='tipo_cliente' class='CampoForm3' value='".$res['tipo_cliente']."'></td>
                        </tr>
                        <tr>
                            <td>TIPO PLANO: </td>
                            <td><input name='tipo_plano' type='text' name='tipo_plano' class='CampoForm3' value='".$res['tipo_plano']."'></td>
                        </tr>
                        <tr>
                            <td>EMPRESA: </td>
                            <td><input name='empresa' type='text' name='empresa' class='CampoForm3' value='".$res['empresa']."' maxlength='15'></td>
                        </tr>
						<tr>
                            <td>RESPONSÁVEL: </td>
                            <td><input name='responsavel' type='text' name='responsavel' class='CampoForm3' value='".$res['responsavel']."'></td>
                        </tr>
						<tr>
                            <td>PESSOA: </td>
                            <td>
								<select id='pessoa' name='pessoa' class='CampoForm3'>
									<option value='".$res['pessoa']."'>".$res['pessoa']."</option>
									<option value='Física'>Física</option>
									<option value='Jurídica'>Jurídica</option>
							</td>
                        </tr>
						<tr>
                            <td>CNPJ: </td>
                            <td>
							<input name='cnpj' type='text' id='cnpj' class='CampoForm3' value='".$res['cnpj']."'>
							</td>
                        </tr>
						<tr>
                            <td>CPF: </td>
                            <td>
							<input name='cpf' type='text' id='cpf' class='CampoForm3' value='".$res['cpf']."'>
							</td>
                        </tr>
						<tr>
                            <td>E-MAIL: </td>
                            <td>
							<input name='email' type='text' id='email' class='CampoForm3' value='".$res['email']."'>
							</td>
                        </tr>
						<tr>
                            <td>ENDEREÇO: </td>
                            <td>
							<input name='endereco' type='text' id='endereco' class='CampoForm3' value='".$res['endereco']."'>
							</td>
                        </tr>
						<tr>
                            <td>BAIRRO: </td>
                            <td>
							<input name='bairro' type='text' id='bairro' class='CampoForm3' value='".$res['bairro']."'>
							</td>
                        </tr>
						<tr>
                            <td>CIDADE: </td>
                            <td>
							<input name='cidade' type='text' id='cidade' class='CampoForm3' value='".$res['cidade']."'>
							</td>
                        </tr>
						<tr>
                            <td>ESTADO: </td>
                            <td>
							<input name='estado' type='text' id='estado' class='CampoForm3' value='".$res['estado']."'>
							</td>
                        </tr>
						<tr>
                            <td>CEP: </td>
                            <td>
							<input name='cep' type='text' id='cep' class='CampoForm3' value='".$res['cep']."' onkeyup='FormataCep(this,event)' maxlength='9'>
							</td>
                        </tr>
						<tr>
                            <td>RG: </td>
                            <td>
							<input name='rg' type='text' id='rg' class='CampoForm3' value='".$res['rg']."'>
							</td>
                        </tr>
						<tr>
                            <td>TELEFONE: </td>
                            <td>
							<input name='telefone' type='text' id='telefone' class='CampoForm3' value='".$res['telefone']."' onkeyup='fone(this,event)' maxlength='13'>
							</td>
                        </tr>
						<tr>
                            <td>CELULAR: </td>
                            <td>
							<input name='celular' type='text' id='celular' class='CampoForm3' value='".$res['celular']."' onkeyup='fone(this,event)' maxlength='13'>
							</td>
                        </tr>
						<tr>
                            <td>DATA DE NASCIMENTO: </td>
                            <td>
							<input name='datanasc' type='text' id='datanasc' class='CampoForm3' value='".$res['datanasc']."'>
							</td>
                        </tr>
						
						<tr><td><br>
							<input type='submit' id='atualizar' class='Botao' value=' Atualizar Cliente '>
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