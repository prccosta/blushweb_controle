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
                                Orçamentos</td>
                        </tr>
                        <tr>
                            <td>
                              <fieldset class="Literal">
                                    <legend class="Literal">Informações Gerais</legend>
                                  <table width="100%" Class="TextoNormal" >					
                                    <tr>
                                        <td colspan="2" vAlign="top">
                                          <table cellSpacing="0" cellPadding="0" width="100%">
                                          	
                                            <table align="center" border="0" width="920">
                                            <tr align="center" class="style8">
                                              <td colspan="3"><b> Selecione a op&ccedil;&atilde;o desejada: </b></td>
                                            </tr>
                                            <tr><td colspan="3"><br></td></tr>
                                            </table>
                                            <table align="center" border="1" width="920"  bordercolor="#83c0fb">
                                            <tr align="center">
                                            <td colspan="2" height="20"><a href="gera_orcamento.php">GERAR ORÇAMENTO</a></td>
                                            </tr>
                                            <tr align="center">
                                            <td colspan="2"><br></td>
                                            </tr>
                                            <tr align="center">
                                            <td colspan="2">
                                              <form name="orcamento" method="post" action="view_orcamento.php">
                                                <label for="id_orcamento" class="tabela">Digite o número do orçamento e clique em pesquisar: 
                                                <input type="text" name="id_orcamento" id="id_orcamento" class="CampoForm2">
                                                <input name="pesquisar" type="submit" value="Pesquisar" class="Botao">
                                                </label>
                                              </form></td>
                                            </tr>
                                            </table>
                                              
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