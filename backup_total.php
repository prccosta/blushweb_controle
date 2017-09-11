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
                                Backup de Todos os Dados do Sistema</td>
                        </tr>
                        <tr>
                            <td>
                                <fieldset class="Literal">
                                    <legend class="Literal">Informações Gerais</legend>
                                    <table width="100%" Class="TextoNormal" >					
                                        <tr>
                                            <td align="center"><br><br>Seus dados foram copiados com sucesso na pasta BACKUP.<br>
                                              Todos os arquivos de backup total se iniciam com db-backup-total- e tem a extens&atilde;o .sql
                                              <br>
                                            <br>
                                            Clique <a href="backup.php">aqui</a> para voltar para a p&aacute;gina de backup.<br><br></td>
                                        </tr>
                                        <tr><td>
                                        
						<?php
						backup_tables('mysql01.canuteoliveiralima.com.br','canuteoliveira','gabi29041995','canuteoliveira');
						
						
						/* backup the db OR just a table */
						function backup_tables($host,$user,$pass,$name,$tables = '*')
						{
						  
						  $link = mysql_connect($host,$user,$pass);
						  mysql_select_db($name,$link);
						  
						  //get all of the tables
						  if($tables == '*')
						  {
							$tables = array();
							$result = mysql_query('SHOW TABLES');
							while($row = mysql_fetch_row($result))
							{
							  $tables[] = $row[0];
							}
						  }
						  else
						  {
							$tables = is_array($tables) ? $tables : explode(',',$tables);
						  }
						  
						  //cycle through
						  foreach($tables as $table)
						  {
							$result = mysql_query('SELECT * FROM '.$table);
							$num_fields = mysql_num_fields($result);
							
							$return.= 'DROP TABLE '.$table.';';
							$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
							$return.= "\n\n".$row2[1].";\n\n";
							
							for ($i = 0; $i < $num_fields; $i++) 
							{
							  while($row = mysql_fetch_row($result))
							  {
								$return.= 'INSERT INTO '.$table.' VALUES(';
								for($j=0; $j<$num_fields; $j++) 
								{
								  $row[$j] = addslashes($row[$j]);
								  $row[$j] = ereg_replace("\n","\\n",$row[$j]);
								  if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
								  if ($j<($num_fields-1)) { $return.= ','; }
								}
								$return.= ");\n";
							  }
							}
							$return.="\n\n\n";
						  }
						  
						  //save file
						  $handle = fopen('db-backup-total-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
						  fwrite($handle,$return);
						  fclose($handle);
						  
						  	$ArqOrig = 'db-backup-total-'.time().'-'.(md5(implode(',',$tables))).'.sql';
							$ArqDest = ('backup/db-backup-total-'.time().'-'.(md5(implode(',',$tables))).'.sql');
						 
							//copio o arquivo para a pasta de destino
							copy($ArqOrig, $ArqDest);
							//apago o arquivo da pasta onde se encontra o arquivo backup_total
							unlink($ArqOrig);
						}
						?>
                                        
                                        </td></tr>
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