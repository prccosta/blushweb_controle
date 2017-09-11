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
    <form id="form1">
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
                                Alterar Senha</td>
                        </tr>
                        <tr>
                            <td>
                                <fieldset class="Literal">
                                    <legend class="Literal">Informações Gerais</legend>
                                    <table width="750" Class="TextoNormal" >					
                                        <tr>
                                            <td colspan="2">
                                            	<?php
												$usuario = $_SESSION['UsuarioID'];
												$senha = $_POST['senha_atual'];
												$senha_nova = $_POST['senha_nova'];
												$confirme_senha = $_POST['confirme_senha'];
												
												$sql=mysql_query("select senha from usuarios where id = '$usuario'"); 
												$row= mysql_fetch_assoc($sql);
												$senha_banco = $row['senha'];
												//buscando a senha que ja esta salva para poder comparar com a que ele vai digitar

												 // echo $senha_banco ." | ". $senha_nova ." | ". $confirme_senha; 
												 
												 if(($senha_nova=="") && ($confirme_senha==""))
													{  
													  echo "<script>alert('Campos senha não podem ser Nulos!');
																	 window.location='alterarsenha.php';
													   </script>";
													   return false;
													}
													
											
												 //verificando se as senhas conhecidem, e compara com a senha já existente
												 if(($senha != $senha_banco) && ($senha_nova != $confirme_senha))
													{  
													  echo"<script>alert('Senhas Digitadas não conhecidem!');
																	 window.location='alterarsenha.php';
													   </script>";
													}
												 
												 else
													if($result=mysql_query("update usuarios set senha = MD5('$confirme_senha') where id = '$usuario'")) //verifica se é verdadeiro o resultado da query, e retorna mensagem
													 {      
														echo"<script>alert('Senha Alterada com Sucesso!');
																	 window.location='alterarsenha.php';
															  </script>";
													 }
											   
										
										 
									?>
                                            
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colSpan="2">Sua senha foi alterada com sucesso!</td>
                                        </tr>
                                    </table>
                                    </fieldset>
                                </td>
                            </tr>
                        </table>
						</form>
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
