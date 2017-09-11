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

	<form id="form1">
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
                                Recebimento de Parcela</td>
                        </tr>
                        <tr>
                            <td>
                                <fieldset class="Literal">
                                    <legend class="Literal">Informações Gerais</legend>
                                    <table width="100%" Class="TextoNormal" >
                                        <tr>
                                            <td vAlign="top" >&nbsp;</td>
                                            <td vAlign="middle" align="left"	>
                                                <table class="TextoNormal" width="100%" border="0">
                                                    <tr>
                                                        <td width="120">Selecione:</td>
                                                        <td width="100%"><input name="arquivo" type="file" class="Botao">&nbsp;
                                                            <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" ControlToValidate="fArquivo"
                                                                ErrorMessage="Selecione um arquivo" ValidationGroup="Recebimento"></asp:RequiredFieldValidator></td>
                                                    </tr>
                                                    <tr>
                                                        <td colSpan="2"><br>
                                                            <table>
                                                                <tr>
                                                                    <td><input type="button" ID="Button1"class="Botao" value="&nbsp;&nbsp;Listar Parcelas&nbsp;&nbsp;" ValidationGroup="Recebimento" /></td>
                                                                    
                                                                </tr>
                                                            </table>
                                                             <asp:GridView ID="gwRecebimento" runat="server" AutoGenerateColumns="False" DataSourceID="dsParcela" BackColor="#CCCCCC" BorderColor="#999999" BorderStyle="Solid" BorderWidth="3px" CellPadding="4" CellSpacing="2" ForeColor="Black" Font-Size="XX-Small" Font-Names="Verdana">
                                                            <Columns>
                                                                <asp:TemplateField>
                                                                    <ItemTemplate>
                                                                        <asp:CheckBox ID="cbRecebimento" runat="server" Visible='<%# (Eval("CodigoParcela") <> "") AND (Eval("StatusCodigo") <> 2)  %>' OnCheckedChanged="cbRecebimento_CheckedChanged" AutoPostBack="True" />
                                                                    </ItemTemplate>
                                                                </asp:TemplateField>
                                                                <asp:BoundField DataField="DataCredito" HeaderText="Data do Cr&#233;dito" SortExpression="DataCredito" />
                                                                <asp:BoundField DataField="CodigoParcela" HeaderText="Codigo da Parcela" SortExpression="CodigoParcela" />
                                                                <asp:BoundField DataField="ValorPago" HeaderText="Valor Pago" SortExpression="ValorPago" DataFormatString="{0:C}" HtmlEncode="False"  />
                                                                <asp:BoundField DataField="DataVencimento" HeaderText="Data de Vencimento" SortExpression="DataVencimento" DataFormatString="{0:dd/MM/yyyy}" />
                                                                <asp:BoundField DataField="IdenTitulo" HeaderText="Identifica&#231;&#227;o do Titulo" SortExpression="IdenTitulo" />
                                                                <asp:BoundField DataField="NumProcesso" HeaderText="N&#176; do Processo" SortExpression="NumProcesso" />
                                                                <asp:BoundField DataField="NumParcela" HeaderText="N&#176; da Parcela" SortExpression="NumParcela" />
                                                                <asp:BoundField DataField="NomeCliente" HeaderText="Cliente" SortExpression="NomeCliente" />
                                                                <asp:BoundField DataField="NomeDevedor" HeaderText="Devedor" SortExpression="NomeDevedor" />
                                                                <asp:BoundField DataField="ValorParcela" HeaderText="Valor da Parcela" SortExpression="ValorParcela"  DataFormatString="{0:C}" HtmlEncode="False"/>
                                                                <asp:BoundField DataField="StatusNome" HeaderText="Status" SortExpression="StatusNome" />
                                                            </Columns>
                                                            <FooterStyle CssClass="FooterStyle" />
                                                             <PagerStyle CssClass="PagerStyle" />
                                                             <RowStyle CssClass="ItemStyle" />
                                                             <HeaderStyle CssClass="HeaderStyle" />
                                                        </asp:GridView>
                                                        <asp:ObjectDataSource ID="dsParcela" runat="server" OldValuesParameterFormatString="original_{0}"
                                                            SelectMethod="fnBuscaReferencia" TypeName="canut.LibRecebimento"></asp:ObjectDataSource></td>
                                                    </tr>
                                                    <tr>
                                                        <td colSpan="2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <input type="Button" ID="btReceber" value="Receber Parcelas&nbsp;" class="Botao"/>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
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
        </form>
</body>
</html>