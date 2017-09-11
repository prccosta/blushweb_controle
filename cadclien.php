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
    <form id="form1" action="sql_cadclien.php" method="post" name="form1">
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
        <td class="TextoTopo">Incluir Cliente</td>
    </tr>
    <tr>
        <td>
            <fieldset class="Literal">
                <legend class="Literal">Informações Gerais</legend>
                <table width="800" Class="TextoNormal" >
                <tr align="center" class="style8"><td colspan="4"><b> DADOS DO CLIENTE </b></td></tr>
                <tr align="left"><td width="222">NOME:</td>
                <td width="484">
                  <input name="nome" type="text" id="nome" class="CampoForm3"></td></tr>
                <tr align="left"><td width="222">SOBRENOME:</td>
                <td width="484">
                  <input name="sobrenome" type="text" id="sobrenome"  class="CampoForm3"></td></tr>
                <tr align="left"><td width="222">NOME DA EMPRESA:</td>
                <td width="484">
                  <input name="empresa" type="text" id="empresa"  class="CampoForm3"></td></tr>
                <tr align="left"><td width="222">RESPONSÁVEL:</td>
                <td width="484">
                  <input name="responsavel" type="text" id="responsavel"  class="CampoForm3"></td></tr>
                <tr align="left"><td>PESSOA:</td><td><label>
                <select name="pessoa" id="pessoa" class="CampoForm3">
                  <option value="0">-- Selecione --</option>
                  <option value="F&iacute;sica">F&iacute;sica</option>
                  <option value="Jur&iacute;dica">Jur&iacute;dica</option>
                </select>
                </label></td></tr>
                <tr align="left"><td>CNPJ:</td><td><label>
                  <input name="cnpj" type="text" id="cnpj"  class="CampoForm3">
                </label></td></tr>
                <tr align="left"><td>CPF DO RESPONSÁVEL:</td><td><label>
                  <input name="cpf" type="text" id="cpf"  class="CampoForm3" onKeyUp="FormataCpf(this,event)" maxlength="14">
                </label></td></tr>
                <tr align="left"><td>E-MAIL:</td><td><label>
                  <input name="email" type="text" id="email"  class="CampoForm3">
                </label></td></tr>
                <tr align="left"><td>ENDEREÇO:</td><td><label>
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
                <tr align="center" class="style8"><td colspan="4"><b> DADOS DO DOMÍNIO </b></td></tr>
                <tr align="left"><td>DOMÍNIO:</td><td><label>
                  <input name="dominio" type="text" id="dominio"  class="CampoForm3">
                </label></td></tr>
                <tr align="left"><td>CLIENTE DE SERVIÇOS?</td><td><label>
                  <select id="tcliente" name="tcliente" class="CampoForm3">
                  	<option value="0">-- Selecione --</option>
                    <?php
                    	$sql_plano = mysql_query("SELECT * FROM tipo_cliente ORDER BY id_tcliente");
							while($res_plano = mysql_fetch_array($sql_plano) ) {
                        	echo '<option value="'.$res_plano['id_tcliente'].'">'.$res_plano['nome_tcliente'].'</option>';
                            }
                    ?>
                                            </select>
                </label></td></tr>
                <tr align="left"><td>CLIENTE DE HOSPEDAGEM?</td><td><label>
                  <select id="tplano" name="tplano" class="CampoForm3">
                  	<option value="0">-- Selecione --</option>
                    <?php
                    	$sql_plano = mysql_query("SELECT * FROM tipo_plano ORDER BY id_plano");
							while($res_plano = mysql_fetch_array($sql_plano) ) {
                        	echo '<option value="'.$res_plano['id_plano'].'">'.$res_plano['id_plano'].' '.$res_plano['descricao'].'</option>';
                            }
                    ?>
                                            </select>
                </label></td></tr>
                <tr align="left"><td>USER/SENHA FINANCEIRO:</td><td><label>
                <input name="userfinanc" type="text" id="userfinanc"  class="CampoForm3">
                <input name="senhafinanc" type="text" id="senhafinanc"  class="CampoForm3">
                </label></td></tr>
                <tr align="left"><td>USER/SENHA HOSPEDAGEM:</td><td><label>
                <input name="userhospeda" type="text" id="userhospeda"  class="CampoForm3">
                <input name="senhahospeda" type="text" id="senhahospeda"  class="CampoForm3">
                </label></td></tr>
                <tr align="left"><td>SENHA ACESSO:</td><td><label>
                <input name="senha" type="text" id="senha"  class="CampoForm3"></label></td></tr>
                <tr align="left"><td>HTTP DO PAINEL DE CONTROLE:</td><td><label>
                  <input name="cpanel" type="text" id="cpanel"  class="CampoForm3">
                </label></td></tr>
                <tr align="left"><td>FTP:</td><td><label>
                  <input name="ftp" type="text" id="ftp"  class="CampoForm3">
                </label></td></tr>
                <tr align="left"><td>HTTP WEBMAIL:</td><td><label>
                  <input name="webmail" type="text" id="webmail"  class="CampoForm3">
                </label></td></tr>
                <tr align="left"><td>SERVIDOR POP3:</td><td><label>
                  <input name="pop3" type="text" id="pop3"  class="CampoForm3">
                </label></td></tr>
                <tr align="left"><td>SERVIDOR SMTP:</td><td><label>
                  <input name="smtp" type="text" id="smtp"  class="CampoForm3">
                </label></td></tr>
                <tr align="left"><td>DOCUMENTAÇÃO:<BR>(Informações do banco, layout e etc.)</td><td><label>
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
