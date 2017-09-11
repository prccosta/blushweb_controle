<?php
require_once("includes/conexao.php");
include "post.php";

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
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
    
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
                                Atualização do Cliente</td>
                        </tr>
                        <tr>
                            <td>
                                <fieldset class="Literal">
                                   <legend class="Literal">Informações Gerais</legend>
                                   <table width="100%" Class="TextoNormal" >					
                                     <tr>
                                        <td vAlign="top">&nbsp;</td>
                                        <td vAlign="middle" align="left"></td>
                                     </tr>
                                     <tr>
                                        <td colSpan="2">
                                        <?php
											$id_cadastro = $_POST['id_cadastro'];
											$nome = $_POST['nome'];
											$sobrenome = $_POST['sobrenome'];
											$tipo_cliente = $_POST['tipo_cliente'];
											$tipo_plano = $_POST['tipo_plano'];
											$empresa = $_POST['empresa'];
											$responsavel = $_POST['responsavel'];
											$pessoa = $_POST['pessoa'];
											$cnpj = $_POST['cnpj'];
											$cpf = $_POST['cpf'];
											$email = $_POST['email'];
											$endereco = $_POST['endereco'];
											$bairro = $_POST['bairro'];
											$cidade = $_POST['cidade'];
											$estado = $_POST['estado'];
											$cep = $_POST['cep'];
											$rg = $_POST['rg'];
											$telefone = $_POST['telefone'];
											$celular = $_POST['celular'];
											$datanasc = $_POST['datanasc'];
																					
											$sql=mysql_query("update `cadastro` set nome = '$nome', sobrenome = '$sobrenome', tcliente = '$tipo_cliente', tplano = '$tipo_plano', empresa = '$empresa', responsavel = '$responsavel', pessoa = '$pessoa', cnpj = '$cnpj', cpf = '$cpf', email = '$email', endereco = '$endereco', bairro = '$bairro', cidade = '$cidade', estado = '$estado', cep = '$cep', rg = '$rg', telefone = '$telefone', celular = '$celular', datanasc = '$datanasc' where id = '$id_cadastro'") or die(mysql_error());
											if($sql){
echo "<br><br><label class='Saudacao'><center>O cadastro do cliente foi atualizado com sucesso!<br>Clique <a href='pesquisarcliente.php'>Aqui</a> para voltar para página de pesquisa.</label>";
} else {
echo "<label class='Saudacao'><center>Ocorreu um erro durante a atualização!<br>Clique <strong><a href='pesquisarcliente.php'>Aqui</a></strong> para voltar para página de pesquisa.</label>";
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