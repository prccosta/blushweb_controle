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
<script language="javascript">
<!--
function fnSetaExcluir(peObj){
	
	if(peObj.checked){
		document.forms[0].hdExcluir.value += peObj.value + ',';
	}else{
		var vetChaves = document.forms[0].hdExcluir.value.split(',');
		document.forms[0].hdExcluir.value = '';

		for(i=0;i < vetChaves.length - 1; i++){
			if(vetChaves[i] != peObj.value){
				document.forms[0].hdExcluir.value += vetChaves[i] + ',';
			}
		}
	}
}
//-->
</script>
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
                                Pesquisar de Vendas por Consultor</td>
                        </tr>
                        <tr>
                            <td>
                                <fieldset class="Literal">
                                  <legend class="Literal">Informações Gerais</legend>
                                    <table width="100%" Class="TextoNormal" >					
                                    <form id="form1" name="form1" action="" method="post">
                                    <tr>
                                        <td colspan="2" vAlign="top" >
                                          <table Class="TextoNormal" width="450">
                                            <tr>
                                              <td>Consultor:</td>
                                              <td><select id="consultor" name="consultor" class="CampoForm3">
                                                <option value="0">-- Selecione --</option>
                                                <?php
                                                $sql_cadastro = mysql_query("SELECT * FROM cadconsultor ORDER BY nome, sobrenome");
                                                    while($res_cadastro = mysql_fetch_array($sql_cadastro) ) {
                                                    echo '<option value="'.$res_cadastro['id_consultor'].'">'.$res_cadastro['nome'].' '.$res_cadastro['sobrenome'].'</option>';
                                                    }
                                                ?>
                                                </select></td>
                                              </tr>
                                            <tr>
                                              <td style="height: 20px"><br><input type="submit" id="pesquisar" class="Botao" value=" Pesquisar "></td>
                                              </tr>
                                            
                                            </form>
                                            </table>                                        </td>
                                      </tr>
                                      <tr><td colspan="2">
                                      <table width="400">
                                        <TR align="center">
                                        	<TD class="TextoTopo2">Contrato</TD>
                                            <TD class="TextoTopo2">Valor</TD>
                                            <TD class="TextoTopo2">Comissão</TD>
                                        </TR>
     <?php
	if( $_SERVER['REQUEST_METHOD']=='POST' )  
		{  
	$where = Array();  
							  
	$consultor = getPost('consultor');  
	
	if( $consultor ){ $where[] = " `id_consultor`='$consultor'"; }
												  
	$sql = "SELECT * FROM cadconsultor ";  
	if( sizeof( $where ) )  
	$sql .= ' WHERE '.implode( ' AND ',$where );
	$sql .= ' order by nome ';
													  
	$sql_query = mysql_query($sql) or die (mysql_error());
	if (mysql_num_rows($sql_query)){ 
	$res=mysql_fetch_array($sql_query);
		
	$id_consultor_temp = $res['id_consultor'];
	$sql2 = mysql_query("SELECT *
		FROM controle_venda as a
		LEFT JOIN cadconsultor as b ON a.id_cad_consultor = b.id_consultor
		WHERE id_cad_consultor = $id_consultor_temp") or die (mysql_error());
		while($res2 = mysql_fetch_array($sql2)){
		$consultor_temp = $res['nome']." ".$res2['sobrenome'];
		
		//$valor_total_venda_temp = (float) str_replace(",", "", $res2['valor_total_venda']);
		
		$soma_valor_total = $soma_valor_total + (float) str_replace(",", "", $res2['valor_total_venda']);
		$total_venda = number_format($soma_valor_total, 2, ',', '.');
		
		$soma_comissao = $soma_comissao + (float) str_replace(",", "", $res2['comissao']);
		$total_comissao = number_format($soma_comissao, 2, ',', '.');
		
		echo "<form name='form1' method='post' action='editar_venda.php'>
		<table width='400'>
		<tr align='center'>
		<td class='CampoForm2'>".$res2['cod_contrato']."</td>
		<td class='CampoForm2'>".$res2['valor_total_venda']."</td>
		<td class='CampoForm2'>".$res2['comissao']."
			<input name='id_cliente' type='hidden' id='id_cliente' value='".$res2['id_contr_venda']."'></td>
		</tr>";
			}
			}
			}
			echo "<tr><td colspan='3'><br></td></tr>
			<tr align='center'><td colspan='3' align='right'><b>Total Geral: R$ ".$total_venda."</b></td></tr>
			<tr align='center'><td colspan='3' align='right'><b>Total Comissão: R$ ".$total_comissao."</b></td></tr></table>";
			//a cargo do leitor melhorar o filtro anti injection  
			function filter( $str ){  
				return addslashes( $str );  
			}  
			function getPost( $key ){  
				return isset( $_POST[ $key ] ) ? filter( $_POST[ $key ] ) : null;  
			}
			?>
                                </td></tr></table>
                                
                            
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