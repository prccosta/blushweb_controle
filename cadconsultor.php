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
		<script>
			var el = document.getElementsByTagName("body")[0];
			el.className = "";
		</script>
        <script src="js/jquery.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("select[name=devedor]").change(function(){
					$("select[name=aluno_devedor]").html('<option value="0">Carregando...</option>');
					
					$.post("c_aluno_devedor.php",
						{devedor:$(this).val()},
						function(valor){
							$("select[name=aluno_devedor]").html(valor);
						}
						)
				})
			})
		</script>
        <noscript>
        	<!--[if IE]>
            	<link rel="stylesheet" href="css/ie.css">
            <![endif]-->
        </noscript>
    <form id="form1" action="sql_cadconsultor.php" method="post" name="form1">
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
									</table>							
                        </td>
					</tr>
                    <tr>
                    <table width="100%" class="Borda1N" id="TABLE2" language="javascript" background="img/fundo.jpg">
    <tr>
        <td class="TextoTopo">Incluir Consultor</td>
    </tr>
    <tr>
        <td>
            <fieldset class="Literal">
                <legend class="Literal">Informa��es Gerais</legend>
                <table width="800" Class="TextoNormal" >
                <tr align="center" class="style8">
                  <td colspan="4"><b> DADOS DO CONSULTOR </b></td></tr>
                <tr align="left"><td width="222">NOME:</td>
                <td width="484">
                  <input name="nome" type="text" id="nome" class="CampoForm3"></td></tr>
                <tr align="left"><td width="222">SOBRENOME:</td>
                <td width="484">
                  <input name="sobrenome" type="text" id="sobrenome"  class="CampoForm3"></td></tr>
                <tr align="left">
                  <td>CPF:</td><td><label>
                  <input name="cpf" type="text" id="cpf"  class="CampoForm3" onKeyUp="FormataCpf(this,event)" maxlength="14">
                </label></td></tr>
                <tr align="left"><td>E-MAIL:</td><td><label>
                  <input name="email" type="text" id="email"  class="CampoForm3">
                </label></td></tr>
                <tr align="left"><td>ENDERE�O:</td><td><label>
                  <input name="endereco" type="text" id="endereco" class="CampoForm3">
                </label></td></tr>
                <tr align="left"><td>BAIRRO:</td><td><label>
				  <input name="bairro" type="text" id="bairro" class="CampoForm3">
                </label></td></tr>
                <tr align="left"><td>CIDADE:</td><td><label>
                  <input name="cidade" type="text" id="cidade" class="CampoForm3">
                </label></td></tr>
                <tr align="left"><td>ESTADO:</td><td><label>
                  <select id="estado" name="estado" class="CampoForm3">
                    <option>-- Escolha o Estado --</option>
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AM">AM</option>
                    <option value="AP">AP</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MG">MG</option>
                    <option value="MS">MS</option>
                    <option value="MT">MT</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="PR">PR</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="RS">RS</option>
                    <option value="SC">SC</option>
                    <option value="SE">SE</option>
                    <option value="SP">SP</option>
                    <option value="TO">TO</option>
                  </select></label></td></tr>
                <tr align="left"><td>CEP:</td><td><label>
                  <input name="cep" type="text" id="cep"  class="CampoForm3" onkeyup="FormataCep(this,event)" maxlength="9">
                </label></td></tr>
                <tr align="left"><td>TELEFONE:</td><td><label>
                  <input name="telefone" type="text" id="telefone"  class="CampoForm3" onkeyup="fone(this,event)" maxlength="13">
                </label></td></tr>
                <tr align="left"><td>CELULAR:</td><td><label>
                  <input name="celular" type="text" id="celular"  class="CampoForm3" onkeyup="fone(this,event)" maxlength="13">
                </label></td></tr>
                <tr align="left"><td>DATA DE NASCIMENTO:</td><td><label class="formato">
                  <input name="datanasc" type="text" id="datanasc"  class="CampoForm3" onkeyup="FormataData(this,event)" maxlength="10">
                </label></td></tr>
                <tr align="left">
                  <td>LOGIN:</td><td><label>
                  <input name="usuario" type="text" id="usuario"  class="CampoForm3">
                </label></td></tr>
                <tr align="left">
                  <td>SENHA:</td><td><label>
                  <input name="senha" type="text" id="senha"  class="CampoForm3">
                </label></td></tr>
                <tr align="left">
                  <td>INFORMA&Ccedil;&Otilde;ES DA CONTA:</td><td><label>
                  <textarea name="obs" cols="40" rows="5" id="obs" class="CampoForm3"></textarea>
                </label></td></tr>
                <tr><td colspan="4"><p><br>
                    <INPUT class=Botao id=Enviar onclick="return valida();validaEmail()" type=submit value=Cadastrar name=Enviar>
                    <label><input type="reset" name="limpar" id="limpar" value="Limpar" class="Botao"></label>
                </p>
                    <p>&nbsp; </p></td></tr>
		</table>
			</fieldset>
       
    </form>
    
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
