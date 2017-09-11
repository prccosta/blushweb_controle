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
        <td class="TextoTopo">Incluir Venda</td>
    </tr>
    <tr>
        <td>
            <fieldset class="Literal">
                <legend class="Literal">Informa��es Gerais</legend>
<?php 


?>
                <form id="vendas" action="sql_incvenda.php" method="post" name="vendas">
                <table width="800" Class="TextoNormal" >
                <tr align="left"><td width="150">CONSULTOR:</td>
                <td width="484">
                  <select id="consultor" name="consultor" class="CampoForm3">
                  	<option value="0">-- Selecione --</option>
                    <?php
                    $sql_cadastro = mysql_query("SELECT * FROM cadconsultor ORDER BY nome, sobrenome");
						while($res_cadastro = mysql_fetch_array($sql_cadastro) ) {
                    	echo '<option value="'.$res_cadastro['id_consultor'].'">'.$res_cadastro['nome'].' '.$res_cadastro['sobrenome'].'</option>';
                    	}
                    ?>
                    </select></td></tr>
                <tr align="left"><td width="150">CONTRATO:</td>
                <td width="484">
                  <input name="contrato" type="text" id="contrato"  class="CampoForm3"></td></tr>
                <tr align="left"><td width="150">VALOR DA VENDA:</td>
                <td width="484">
                  <input name="valor_total_venda" type="text" id="valor_total_venda"  class="CampoForm3" onBlur="somacomissao();numMoeda(event,comissao);" onkeyup="numMoeda(event,this);" maxlength="12"></td></tr>
                <tr align="left"><td width="150">COMISS�O:</td>
                <td width="484">
                  <input name="comissao" type="text" id="comissao"  class="CampoForm3" readonly></td></tr>
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