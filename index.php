<?php
session_start();
require ("includes/conexao.php");

?>
<HTML>
  <HEAD>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <TITLE>SCCF - Sistema de Controle de Cobran&ccedil;a e Finan&ccedil;as</TITLE>
        <link href="css/out_Styles.css" rel="stylesheet" type="text/css">
  </HEAD>
<BODY leftmargin=o topmargin=0>
	<table width="100%" height="100%" cellpadding=0 cellspacing=0>
		<tr >
			<td align=center valign=top>
				<table width=770 border=0 cellpadding=0 cellspacing=0>
					<tr>
						<td>
							<table border=0 cellpadding=0 cellspacing=0>
								<tr>
									<td colspan=3 height=187><img src="img/topo.jpg"></td>
								</tr>
								<tr>
									<td colspan=3>
										<table cellSpacing="0" cellPadding="0" border="0">
	                                        <tr>
		                                        <td width="770" background="img/buscar.jpg" height="21" >&nbsp;
			                                        
		                                        </td>
		                                        
	                                        </tr>
                                        </table>
									</td>
								</tr>
								<tr>
									<td colspan=3 height=20><img src="img/buscar_I.jpg"></td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<table border="0"  width="100%" cellpadding=0 cellspacing=0>
								<tr>
									
									<td valign="top">
										<table border=0 width="100%" height="100%" cellpadding=0 cellspacing=0>
											<tr>
												<td colspan=2 bgcolor=#fff align="center"><font face=verdana size=2 color="#00aeef"><b>&nbsp;&nbsp;&nbsp;:: Sistema de Controle de Cobran&ccedil;a e Finan&ccedil;as - Vers&atilde;o 1.0</b></font></td>
											</tr>
											<tr>
												
												<td bgcolor=#fff align=left valign=middle>
													<table cellSpacing="0" cellPadding="0" border="0" width="100%">
                                                        <form action="validacao.php" method="post" name="login">
                                                        <tr>
                                                            <td colspan="2" height="60" class="TextoCinza10N">
<br>
                                                          :: &Aacute;REA ADMINISTRATIVA</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="TextoCinza10NR">Login</td>
                                                            <td>
                                                            
                                                            <input type="text" name="usuario" id="usuario" maxlength="25" size="12" autofocus class="TextoCinza11N"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="TextoCinza10NR">Senha</td>
                                                            <td><input type="password" name="senha" id="senha" size="12" class="TextoCinza11N"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td><br /></td>
                                                            <td><input type="image" src="img/botao_ok.jpg" value="submit" align="left">                                                              <br />
                                                            </td>
                                                        </form></tr>
                                                        <tr>
                                                            <td align="left" class="TextoCinza10NR"><a href="esqueci_adm.php"><br>Esqueci minha senha</a><br />
                                                            </td>
                                                        </tr>
                                                      </table>
													</font></td>
                                                    <td bgcolor=#fff align=left valign=middle>
													<table cellSpacing="0" cellPadding="0" border="0" width="100%">
                                                      </table>
													</font></td>
                                            </tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
<?php
					  if(isset($_SESSION['erro']))
					{						
						echo ' <script language="javascript"> alert("'.$_SESSION['erro'].'")</script>';
						session_destroy(); 
					}
?>
</BODY>
</HTML>
