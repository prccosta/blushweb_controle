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
        <noscript>
        	<!--[if IE]>
            	<link rel="stylesheet" href="css/ie.css">
            <![endif]-->
        </noscript>
	<FORM action="boleto/boleto_bradesco.php" method="POST" name="consulta" id="consulta">
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
        <td class="TextoTopo">Gera&ccedil;&atilde;o de Boletos de Hospedagem Carteira 06</td>
    </tr>
    <tr>
        <td>
            <fieldset class="Literal">
                <legend class="Literal">Informações Gerais</legend>
                <table width="800" Class="TextoNormal" >
                	<tr align="center" class="style8">
                      <td colspan="4"><b> Preencha os campos abaixo para gerar um boleto avulso do Banco Bradesco</b></td></tr>
                    <?php
                        $palavra = $_POST['id'];
						$sql = mysql_query("SELECT * FROM cadastro WHERE id = '$palavra'");
						$sql2 = mysql_query("SELECT MAX(numdoc) as numdoc FROM boletos");
                        while($resultado=mysql_fetch_array($sql2)) {
                        $v_codprocesso = $resultado["numdoc"];
                        $v_codprocesso = $v_codprocesso + 1;
                        echo "<tr align='left'>
                        <td>N&ordm; do DOCUMENTO:</td><td><label>$v_codprocesso
                        <input name='numdoc' type='hidden' id='numdoc' value='".$v_codprocesso."'>
                        </label></td></tr>";
                        }
                    while($res=mysql_fetch_array($sql)){
                    echo "<tr align='left'>
                      <td width='222'>PLANO:</td>
                      <td width='484'><span class='formato'>
                      <select name='plano' class='TextoNormal'>
						<option value='0'>-- Selecione o plano --</option>";
						$sql_plano = "SELECT * FROM tipo_plano ORDER BY id_plano";
                        $qr = mysql_query($sql_plano) or die(mysql_error());
                        while($ln = mysql_fetch_assoc($qr)){
							echo '<option value="'.$ln['id_plano']."|".$ln['valor'].'">'.$ln['id_plano'].' - '.$ln['descricao'].'</option>';
						}
						
					echo "</select>
                    </span></td></tr>
                    <tr align='left'>
                    <td width='222'>TAXA BANCÁRIA:</td>
                    <td width='484'><span class='formato'>
                      <select name='taxa_boleto' class='TextoNormal'>
                      	<option value='0'>-- Selecione a taxa --</option>";
						$sql_taxa = "SELECT * FROM taxa ORDER BY id_taxa";
                        $qr = mysql_query($sql_taxa) or die(mysql_error());
                        while($ln = mysql_fetch_assoc($qr)){
							echo '<option value="'.$ln['valor'].'">'.$ln['id_taxa'].' - '.$ln['valor'].'</option>';
						}
						
					echo "</select>
                    </span></td></tr>
                    <tr align='left'>
                    <td width='222'>VENCIMENTO:</td>
                    <td width='484'><span class='formato'>
                      <input name='vencimento' type='text' id='vencimento' size='20' maxlength='10' onkeyup='FormataData(this,event)' class='TextoNormal'>
                    </span></td></tr>
                    <tr align='left'>
                    <td width='222'>REFERÊNCIA DE PAGAMENTO:</td>
                    <td width='484'><span class='formato'>
                      <select name='demonstrativo_2' class='TextoNormal'>
                      	<option value='0'>-- Selecione a mensagem --</option>
                        <option value='Hospedagem do seu site'>Mensalidade referente a Hospedagem do seu site</option>
                        <option value='Criação de Sites ou Sistemas'>Mensalidade referente a Criação de Sites ou Sistemas</option>
                        <option value='Renegociação de Dívida'>Mensalidade referente a Renegociação de Dívida</option>
                      </select>
                    </span></td></tr>
                    <tr align='left'>
                    <td width='222'>NOME DO SACADO:</td>
                    <td width='484'>".$res['nome']." ".$res['sobrenome']."
                    <input name='idcli' type='hidden' id='idcli' value='".$res['id']."'>
                    <input name='nome' type='hidden' id='nome' value='".$res['nome']." ".$res['sobrenome']."'></td></tr>
                    <tr align='left'>
                      <td>CPF:</td><td><label>".$res['cpf']."
                    </label></td></tr>
                    <tr align='left'>
                      <td>ENDERE&Ccedil;O:</td>
                      <td><label>".$res['endereco']."
                      <input name='endereco' type='hidden' id='endereco' value='".$res['endereco']."'>
                    </label></td></tr>
                    <tr align='left'>
                      <td>BAIRRO:</td>
                      <td><label>".$res['bairro']."
                    </label></td></tr>
                    <tr align='left'>
                      <td>CIDADE:</td>
                      <td><label>".$res['cidade']."
                      <input name='cidade' type='hidden' id='cidade' value='".$res['cidade']."'>
                    </label></td></tr>
                    <tr align='left'>
                      <td>ESTADO:</td>
                      <td>".$res['estado']."
                      <input name='estado' type='hidden' id='estado' value='".$res['estado']."'></td></tr>
                    <tr align='left'><td>CEP:</td><td><label>
                    <input name='cep' type='hidden' id='cep' value='".$res['cep']."'>
                      ".$res['cep']."
                    </label></td></tr>
                    <tr align='left'><td>TELEFONE:</td><td><label>".$res['telefone']."
                    </label></td></tr>
                    <tr align='center'><td colspan='4'>
                      <INPUT class=botoes id=Confirmar onclick='return valida();validaEmail()' type=submit value=Confirmar name=Confirmar>
                      <label>
                        <input type='reset' name='limpar' id='limpar' value='Limpar'>
                        </label><br><br><label><a href='boleto_avulso.php'>Voltar</a></label>
                      <p>&nbsp; </p></td></tr>
				</table></fieldset></form>";
				}
				?>
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
