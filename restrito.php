<?php

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
<?php include_once('masterpage.php'); ?>
    <table style="height:100%;width:100%;">
		<tr>
			<td align="center" class="Mensagem">
            <p>Olá, <?php echo $_SESSION['UsuarioNome']; ?>!</p>
			</td>
		</tr>
	</table>