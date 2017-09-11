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
<form action="sql_esqueci_adm.php" method="post" name="login">
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
												<td width=16 height=200 bgcolor=#fff valign=top><br>&nbsp;&nbsp;&nbsp;&nbsp;</td>
												<td width="520" align=center valign=middle bgcolor=#fff>
													<table cellSpacing="0" cellPadding="0" border="0">
                                                        <tr>
                                                            <td colspan="4" height="5" class="TextoCinza10N2"><br>
                                                          :: Área administrativa - Recupere sua senha<br><br></td>
                                                        </tr>
                                                        <tr>
                                                         <td colspan="4" height="25" class="TextoCinza10N"><br>
                                                           Informe o login e e-mail do usuário para solicitar a nova senha.<br>
                                                           Será enviada para o seu e-mail.</td>
                                                        </tr>
                                                        <tr>
                                                         <td colspan="4"><br></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="TextoCinza10N" colspan="4">Login:&nbsp;&nbsp;

                                                            <input type="text" name="usuario" id="usuario" maxlength="25" size="30" autofocus class="TextoCinza11N"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="TextoCinza10N" colspan="4">E-mail:
                                                            <input type="text" name="email" id="email" size="30" class="TextoCinza11N"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="TextoCinza10N" colspan="4"><br>
                                                            <input type="image" src="img/bt_EnviarSenha.jpg" value="submit" align="center"><br />
                                                                </td>
                                                        </tr>
                                                         <tr>
                                                            <td colspan="4" align="center" class="TextoPreto10N"><br />
                                                            </td>
                                                        </tr>
                                                      </table>
													<p align= justify><br><br>
													<p align= justify><br><br><br>
                        <CENTER></CENTER>
													</td>
											</tr>
										</table>
									</td>
									<td width="22">&nbsp;</td>
								</tr>
								<tr>
									<td align=right>&nbsp;</td>
									<td align=right>&nbsp;</td>
									<td align=right>&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	</form>
<?php
					  if(isset($_SESSION['erro']))
					{						
						echo ' <script language="javascript"> alert("'.$_SESSION['erro'].'")</script>';
						session_destroy(); 
					}
?>
</BODY>
</HTML>
