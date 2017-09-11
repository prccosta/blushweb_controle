<?php

require_once("includes/conexao.php");

//$user_id = $_SESSION['user_id'];

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
        <script type="text/javascript">
   
      $(document).ready(function(){
        // Evento change no campo categoria  
         $("select[name=plano]").change(function(){
            // Exibimos no campo cursos antes de concluirmos
			$("select[name=valor]").html('<option value="">Carregando...</option>');
            // Exibimos no campo cursos antes de selecionamos a cursos, serve também em caso
			// do usuario ja ter selecionado o categoria e resolveu trocar, com isso limpamos a
			// seleção antiga caso tenha feito.
			$("select[name=meses]").html('<option value="">Aguardando valor...</option>');
			// Passando tipo por parametro para a pagina ajax-cursos.php
            $.post("ajax_planos.php",
                  {plano:$(this).val()},
                  // Carregamos o resultado acima para o campo cursos
				  function(valor1){
                     $("select[name=valor]").html(valor1);
                  }
                  )
         })
     	// Evento change no campo cursos 
	 	$("select[name=valor]").change(function(){
            // Exibimos no campo modulos antes de concluirmos
			$("select[name=meses]").html('<option value="">Carregando...</option>');
            // Passando cursos por parametro para a pagina ajax-modulos.php
            $.post("ajax_planos.php",
                  {valor:$(this).val()},
                  // Carregamos o resultado acima para o campo modulos
				  function(valor1){
                     $("select[name=meses]").html(valor1);
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
            Atualização do Plano</td>
    </tr>
	<TR>
		<TD>
		 <fieldset class="Literal">
                <legend class="Literal">Informações Gerais</legend>
						<?php
                        $palavra = $_POST['id_plano'];
						$sql=mysql_query("SELECT * FROM tipo_plano WHERE id_plano = '$palavra'") or die (mysql_error());
						$res=mysql_fetch_array($sql);
						echo "<table width='600' class='TextoNormal' >
						<form id='form1' name='form1' action='sql_editar_boleto.php' method='post'>
                        <tr>
                            <td>ID do Plano: </td>
                            <td><input name='id_plano' type='hidden' name='id_plano' value='".$res['id_plano']."'>".$res['id_plano']."</td>
                        </tr>
                        <tr>
                            <td>Plano: </td>
                            <td><select name='plano' class='CampoTexto'>
                                                <option value='0'>Escolher descrição</option>";
                                                $sql = "SELECT * FROM tipo_plano ORDER BY id_plano";
                                                $qr = mysql_query($sql) or die(mysql_error());
                                                while($ln = mysql_fetch_assoc($qr)){
                                                    echo '<option value="'.$ln['id_plano'].'">'.$ln['id_plano'].' - '.$ln['descricao'].'</option>';
                                                    }
                                                echo "</select></td>
                        </tr>
                        <tr>
                            <td>Valor do Plano: </td>
                            <td><select name='valor' class='CampoTexto'>
								<option value='0' selected='selected'>Aguardando descrição...</option></td>
                        </tr>
						<tr>
                            <td>Meses do Plano: </td>
                            <td>
							<select id='meses' name='meses' class='CampoTexto'>
								<option value='0' selected='selected'>Aguardando valor...</option></td>
                        </tr>
						<tr><td><br>
							<input type='submit' id='atualizar' class='Botao' value=' Atualizar Plano '>
						</td></tr>
                    </table>
            </fieldset>
		</TD>
	</TR>
	<tr>
	    <td>&nbsp;
            </td>
	</tr>
</form></TABLE>";
?>                
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