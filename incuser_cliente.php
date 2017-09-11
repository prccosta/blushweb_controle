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
	header("Location: ../acesso_sistema.php"); exit;
}
?>
<!DOCTYPE html>
<html lang="br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Canut e Oliveira Lima Advogados Associados</title>
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
    <form id="form1" action="sql_incusuario.php" method="post" name="form1">
    <table width="100%" height="100%"  cellpadding="0"  cellspacing="0"  border="0">
		<tr>
			<td background="img/fundo_admin.jpg" align="center" >
				<table width="100" cellpadding="0"  cellspacing="0" >
					<tr>
						<td width="150" >&nbsp;</td>
						<td class="LarguraMenu">
		                    	<table  bgcolor="#B2B2B2" cellpadding="0"  cellspacing="0" width="100%">
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
                                Incluir Usuário Cliente</td>
                        </tr>
                        <tr>
                          <td>
                                <fieldset class="Literal">
                                    <legend class="Literal">Informações Gerais</legend>
                                    <table width="750" Class="TextoNormal" >									
                                    <tr>
                                        <td vAlign="top">&nbsp;</td>
                                        <td vAlign="middle" align="left">
                                            <table width="100%" class="TextoNormal">
                                                    <tr>
                                                        <td class="TextoNormal" height="25">Cliente:</td>
                                                        <td width="90%"><select id="id_cliente" name="id_cliente" class="CampoTexto">
                                                 <option value="0">-- Selecione o cliente --</option>
                                                    <?php
                                                        $sql_id_cliente = mysql_query("SELECT * FROM cliente");
														 while($res_id_cliente=mysql_fetch_array($sql_id_cliente) ) {
                                                         echo '<option value="'.$res_id_cliente['id_cliente'].'|'.$res_id_cliente['nome_exib'].'">'.$res_id_cliente['nome_exib'].'</option>';
                                                        }
                                                    ?>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td class="TextoNormal" height="24" style="HEIGHT: 24px">Usuário:&nbsp;</td>
                                        <td width="90%" style="HEIGHT: 24px">
                                            <input type="text" id="usuario" name="usuario" class="CampoTexto">
                                        </td>
                                    </tr>                
                                    <tr>
                                        <td class="TextoNormal" height="24" style="HEIGHT: 24px">Senha:&nbsp;</td>
                                        <td width="90%" style="HEIGHT: 24px">
                                            <input type="text" id="senha" name="senha" class="CampoTexto">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="TextoNormal" height="25">E-mail:&nbsp;</td>
                                        <td width="90%"><input type="text" id="email" name="email" class="CampoTexto">&nbsp;&nbsp;&nbsp;
                                        				<input type="hidden" id="perfil" name="perfil" class="CampoTexto" value="1"></td>
                                    </tr>
                                    <tr>
                                        <td class="TextoNormal" height="25">Status:&nbsp;</td>
                                        <td width="90%">
                                            <select name="status" id="status" class="CampoTexto">
                                            	<option>-- Escolha o Status --</option>
                                            	<option value="1">Ativo</option>
                                            	<option value="2">Inativo</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colSpan="2" height="25">&nbsp;&nbsp;
                                            <input type="submit" id="gravar" class="Botao" value=" Gravar ">&nbsp;<input name="Reset" type="reset" class="Botao" value=" Limpar "></td>
                                    </tr>
                                
                                </fieldset>
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