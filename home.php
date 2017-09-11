<?php

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

include_once('masterpage.php'); ?>
<HTML>
<HEAD>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	    <link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
    	<link href="css/Style.css" rel="stylesheet" type="text/css" />
</HEAD>
<body>
	<table style="height:100%;width:100%;">
		<tr>
			<td align="center" class="Saudacao">
            	<p>Ol&aacute;, <?php echo $_SESSION['UsuarioNome']; ?>!<br /><br />
                	Seja bem vindo(a) a adminstra&ccedil;&atilde;o do Sistema de Controle de Cobrança e de Finanças (SCCF - Versão 1.0) da Blush<em>!</em> Web e Publicidade.</p>
			</td>
		</tr>
	</table>
</body>
</HTML>