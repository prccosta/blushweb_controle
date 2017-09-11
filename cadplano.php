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
        <td class="TextoTopo">Incluir Plano</td>
    </tr>
    <tr>
        <td>
            <fieldset class="Literal">
                <legend class="Literal">Informações Gerais</legend>
                <form id="form1" action="sql_cadplano.php" method="post" name="form1">
                <table width="800" Class="TextoNormal" >
                <tr align="left"><td width="89">DESCRIÇÃO:</td>
                <td width="699">
                  <input name="descricao" type="text" id="descricao" class="CampoForm3"></td></tr>
                <tr align="left"><td width="89">VALOR:</td>
                <td width="699">
                  <input name="valor" type="text" id="valor"  class="CampoForm3" onkeyup="numMoeda(event,this);"></td></tr>
                <tr align="left"><td>MESES:</td><td><label>
                  <select id="meses" name="meses" class="CampoForm3">
                    <option>-- Escolha --</option>
                    <option value="1">1 mês</option>
                    <option value="3">3 meses</option>
                    <option value="6">6 meses</option>
                    <option value="12">1 ano</option>
                    <option value="24">2 anos</option>
                    <option value="36">3 anos</option>
                  </select></label></td></tr>
                <tr><td colspan="4"><p><br>
                    <INPUT class=Botao id=Enviar type=submit value=Cadastrar name=Enviar>
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
