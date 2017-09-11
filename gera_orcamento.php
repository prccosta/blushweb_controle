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
                                Orçamento</td>
                        </tr>
                        <tr>
                            <td>
                              <fieldset class="Literal">
                                    <legend class="Literal">Informações Gerais</legend>
                                  <table width="100%" Class="TextoNormal" >					
                                    <tr>
                                        <td colspan="2" vAlign="top">
                                          <table cellSpacing="0" cellPadding="0" width="100%">
                                          	
                                           <?php
$meses = array("01" => "Janeiro", "02" => "Fevereiro", "03" => "Março", "04" => "Abril", "05" => "Maio", "06" => "Junho", "07" => "Julho", "08" => "Agosto", "09" => "Setembro", "10" => "Outubro", "11" => "Novembro", "12" => "Dezembro");
$mes = date("m");
$mes_extenso = $meses[$mes];
$data = date("d")." de ".$mes_extenso." de ".date("Y");
$ano = date("y");
?>					
					
<FORM action=sql_orcamento.php method=post name=cadastro id=cadastro>
<table align="center" border="0" width="935" class="tabela">
<tr class="style8">
  <td colspan="2" bordercolor="">
    Proposta n&ordm; <em><strong>(aparecer&aacute; ap&oacute;s a grava&ccedil;&atilde;o)</strong></em>/<?php echo $ano;?><br>
    <input name="ano" type="hidden" id="ano" value="<?php echo $ano;?>">
    Rio de Janeiro, <?php echo $data;?>.<br>
    <input name="data" type="hidden" id="data" value="<?php echo $data;?>">
    A(o) senhor(a) 
    <input name="cliente" type="text" id="cliente" size="30" maxlength="30" class="tabela">
    <br>
    Contato: 
    <input name="email" type="text" id="email" size="50" maxlength="50" class="tabela"></td>
  <td align="right"><img src="img/logo.gif" width="250" height="126"></td>
</tr>
  <tr align="left"><td colspan="3">Prezado Senhor(a),<br>
Em prosseguimento aos nossos entendimentos, estamos formalizando a proposta de prestação de
serviços de 
<select name="tiposite" id="tiposite" class="tabela">
  <option>Selecione...</option>
  <option>atualiza&ccedil;&atilde;o do site</option>
  <option>atualiza&ccedil;&atilde;o e desenvolvimento do site</option>
  <option>banco de dados</option>
  <option>desenvolvimento da logomarca</option>
  <option>desenvolvimento do site</option>
  <option>desenvolvimento do site e da logomarca</option>
  <option>desenvolvimento do site e do sistema</option>
  <option>atualiza&ccedil;&atilde;o do sistema</option>
  <option>atualiza&ccedil;&atilde;o e desenvolvimento do sistema</option>
  <option>desenvolvimento do sistema</option>
  <option>atualiza&ccedil;&atilde;o do SSG</option>
  <option>atualiza&ccedil;&atilde;o e desenvolvimento do SSG</option>
  <option>desenvolvimento do SSG</option>
  <option>atualiza&ccedil;&atilde;o de Hot Site</option>
  <option>atualiza&ccedil;&atilde;o e desenvolvimento de Hot site</option>
  <option>desenvolvimento de Hot Site</option>
  <option>fotografia e manipula&ccedil;&atilde;o de imagens</option>
  <option>manuten&ccedil;&atilde;o do Site e/ou Sistema</option>
  <option>publicidade(cria&ccedil;&atilde;o e divulga&ccedil;&atilde;o)</option>
  <option>publicidade(cria&ccedil;&atilde;o de v&iacute;deo)</option>
</select>
feito totalmente em 
<label for="tecnologia"></label>
<select name="tecnologia" id="tecnologia" class="tabela">
  <option>Selecione...</option>
  <option>HTML e CSS</option>
  <option>HTML5 e CSS3</option>
  <option>FLASH</option>
  <option>FLASH, HTML e CSS</option>
  <option>FLASH, HTML5 e CSS3</option>
  <option>PHP e MySQL</option>
  <option>PHP, MySQL, HTML E CSS</option>
  <option>PHP, MySQL, HTML5 E CSS3</option>
  <option>MySQL</option>
  <option>Ferramentas Gr&aacute;ficas(Photoshop, Corel, Illustrator, etc)</option>
  <option>WEB(HTML5 e CSS3) e GRÁFICO(PHOTOSHOP e ETC)</option>
  <option>Mídias Sociais (Facebook, Twitter, Youtube e etc)</option>
</select>
.</td>
  </tr>
<tr align="left"><td colspan="3"><strong>1. Apresentação</strong></td>
</tr>
<tr align="left">
  <td colspan="3">A <strong>Blush<em>!</em> Web e Publicidade</strong> focaliza seu campo de atuação em programação visual, web
design, sinalização, produção editorial e outros. Atende empresas de pequeno, médio ou
grande porte e pessoas físicas buscando sempre solucionar as necessidades de comunicação
de seus clientes. Acompanha as fases de planejamento, design e produção, buscando oferecer
um produto final condizente com a qualidade do projeto inicialmente apresentado.</td></tr>
<tr align="left"><td colspan="3"><strong>2. Projeto</strong></td></tr>
<tr align="left">
  <td colspan="3">a) 
    <select name="tiposite2" id="tiposite2" class="tabela">
      <option>Selecione...</option>
      <option>Atualiza&ccedil;&atilde;o do site</option>
      <option>Atualiza&ccedil;&atilde;o e Desenvolvimento do site</option>
      <option>Banco de Dados</option>
      <option>Desenvolvimento da Logomarca</option>
      <option>Desenvolvimento do site</option>
      <option>Desenvolvimento do Site e da Logomarca</option>
      <option>Desenvolvimento do Site e do Sistema</option>
      <option>Atualiza&ccedil;&atilde;o do sistema</option>
      <option>Atualiza&ccedil;&atilde;o e Desenvolvimento do sistema</option>
      <option>Desenvolvimento do sistema</option>
      <option>Atualiza&ccedil;&atilde;o do SSG</option>
      <option>Atualiza&ccedil;&atilde;o e Desenvolvimento do SSG</option>
      <option>Desenvolvimento do SSG</option>
      <option>Atualiza&ccedil;&atilde;o de Hot Site</option>
      <option>Atualiza&ccedil;&atilde;o e Desenvolvimento de Hot site</option>
      <option>Desenvolvimento de Hot Site</option>
      <option>Fotografia e Manipula&ccedil;&atilde;o de Imagens</option>
      <option>Manuten&ccedil;&atilde;o do Site e/ou Sistema</option>
      <option>Publicidade(cria&ccedil;&atilde;o e divulga&ccedil;&atilde;o)</option>
      <option>Publicidade(cria&ccedil;&atilde;o de v&iacute;deo)</option>
    </select>
do site feito <strong><em>(tecnologia selecionada acima)</em></strong>, para a empresa
<input name="empresa" type="text" id="empresa" size="30" maxlength="50" class="tabela">
    , incluindo as seguintes se&ccedil;&otilde;es:</td></tr>
<tr align="left"><td colspan="3"><textarea name="obs" cols="130" rows="5" id="obs" class="tabela"></textarea></td></tr>
<tr align="left">
  <td colspan="3"><label>
  	Obs: O conteúdo definitivo será estruturado de acordo com o planejamento estratégico, a
ser definido entre o cliente e a Blush<em>!</em> Web e Publicidade e informado no contrato de prestação de serviços.
     No caso do site ser gerenci&aacute;vel pelo cliente ou uma loja virtual, a  responsabilidade de criar, editar, alterar e excluir menu e produtos e também informa&ccedil;&otilde;es do site  &eacute; toda do cliente. </label></td></tr>
<tr align="left">
  <td><strong>3. Etapas  de desenvolvimento do projeto</strong></td></tr>
<tr align="left">
	<td colspan="3">
    1ª etapa: Planejamento<br><br>

    a)	Listagem dos objetivos a serem satisfeitos;<br>
    b)	Definição do conteúdo; <br>
    c)	Organização do conteúdo (estruturação dos níveis hierárquicos de informação); <br><br>
    
    2ª etapa: Design<br><br>
    
    a)	Criação e desenvolvimento dos elementos de interface: identidade visual do site<br>
    b)	Diagramação do conteúdo (textos e gráficos) da página;<br>
    c)	Seleção e tratamento de imagens;<br>
    d)	Aplicação e supervisão de testes de usabilidade.<br><br>
    
    3ª etapa: Tecnologia <br><br>
    
    a)	Programação completa da página (conteúdo estático, dinâmico e sistemas);<br>
    b)	Publicação do site numa área de testes para revisão on-line;<br>
    c)	Publicação definitiva.<br><br>

	</td></tr>
<tr align="left"><td colspan="3"><strong>4.	Cronograma</strong></td></tr>
<tr align="left">
	<td colspan="3">
    O cronograma proposto para a concretização deste projeto seguirá o prazo definido para as seguintes fases:<br><br>
    
    a)	1ª etapa (planejamento) – <input name="etapa1" type="text" id="etapa1" size="2" maxlength="3" class="tabela"> 
    dia(s) útil(eis)<br>
    b)	2ª etapa (design) – <input name="etapa2" type="text" id="etapa2" size="2" maxlength="3" class="tabela"> 
    dia(s) útil(eis)<br>
    c)	3ª etapa (tecnologia) – <input name="etapa3" type="text" id="etapa3" size="2" maxlength="3" class="tabela"> 
    dia(s) útil(eis)<br><br>
    
    Obs: Prazo pedido para criação e testes. Para que não haja nenhum imprevisto e também podendo ser finalizado antes do prazo.<br><br>

    </td></tr>
<tr class="style8"><td colspan="3"><strong>5. Investimento e Forma de Pagamento</strong></td></tr>
<tr align="left">
  <td colspan="3">
	Por tais serviços no item 2, deverá ser pago à <strong>Blush<em>!</em> Web e Publicidade</strong> o valor de R$ 
	<input name="valor" type="text" id="valor" size="10" maxlength="12" onkeyup="numMoeda2(event,this);" class="tabela">
	 (
	 <input name="extenso" type="text" id="extenso" size="50" maxlength="100" class="tabela">
	 ) a ser pago em at&eacute;
	 <select name="formapag" id="formapag" class="tabela">
	   <option>Selecione...</option>
	   <option>pagamento unico</option>
	   <option>1x sem juros</option>
	   <option>2x sem juros</option>
	   <option>3x sem juros</option>
	   <option>4x sem juros</option>
	   <option>5x sem juros</option>
	   <option>6x sem juros</option>
	   <option>7x sem juros</option>
	   <option>8x sem juros</option>
	   <option>9x sem juros</option>
	   <option>10x sem juros</option>
       <option>11x sem juros</option>
       <option>12x sem juros</option>
</select>	 
	 	 no boleto bancário.<br>
	<br>

	Lembrando que para pagamentos em boleto nos valores acima serão acrescidos a taxa bancária.<br><br>

  </td></tr>
<tr align="left">
  <td colspan="3"><strong>6. &Acirc;mbito de Interven&ccedil;&atilde;o do Cliente</strong></td></tr>
<tr align="left">
  <td colspan="3">
  	a)	Formação de uma equipe de acompanhamento que servirá como interlocutora durante o projeto;<br>
	b)	Fornecimento a <strong>Blush<em>!</em> Web e Publicidade</strong> de todas as informações e elementos necessários ao início e ao desenvolvimento do projeto, em suporte digital compatível com PCs e dentro de um período de tempo razoável de modo a evitar atrasos ou interrupções dos prazos estabelecidos no cronograma.<br><br>

  </td></tr>
<tr align="left">
  <td colspan="3"><strong>7. &Acirc;mbito de Interven&ccedil;&atilde;o da Blush<em>!</em> Web e Publicidade</strong></td></tr>
<tr align="left">
	<td colspan="3">
	a) Prestar os serviços que são objeto da presente proposta com a competência e diligência adequadas ao cumprimento desta, defendendo os legítimos interesses e expectativas do cliente, principalmente no que se refere às relações com terceiros;<br>
    b) Comunicar ao cliente, após a respectiva verificação, qualquer circunstância que possa condicionar o regular desenvolvimento do projeto;<br>
    c) Não divulgar ou comunicar a terceiros, sem expresso consentimento do cliente, qualquer informação recebida, bem como elementos gráficos ou estudos relacionados com o projeto, sem prejuízo do exercício dos direitos reconhecidos no Código dos Direitos Autorais.<br><br>

    </td></tr>
<tr align="left">
  <td colspan="3"><strong>8. Atendimento ao Cliente</strong></td></tr>
<tr align="left">
  <td colspan="3">A <strong>Blush<em>!</em> Web e Publicidade</strong> realizar&aacute; o <em>follow  up</em> deste projeto junto ao cliente, tendo em vista a observ&acirc;ncia dos prazos  acordados e da qualidade dos servi&ccedil;os prestados.<br><br></td></tr>
<tr align="left">
  <td colspan="3"><strong>9. Considera&ccedil;&otilde;es Gerais</strong></td></tr>
<tr align="left">
  <td colspan="3">
    a) Sendo necessária digitalização de imagens em grandes formatos (maiores que ofício), produção de conteúdo, conversão de arquivos, digitação de textos e/ou outros serviços não previstos nesta proposta, serão cobrados à parte, mediante prévia autorização do cliente, como serviços complementares;<br>
    b) Não estão incluídos os serviços de fotografia e aluguel de banco de imagens;<br>
    c) No plano de manutenção o cliente terá direito às atualizações de acordo com plano contratado. Ultrapassando esse limite deverá ser feito um orçamento à parte com outras formas de pagamento se necessário;<br>
    d) Caso o cronograma se estenda por mais de um mês do prazo estabelecido, por motivos de atrasos de entrega de conteúdo ou outro motivo por parte do cliente, será feito um novo orçamento, para aprovação do cliente do pagamento de horas adicionais, sendo R$ 50,00 o valor da hora técnica. Esse procedimento visa exclusivamente o cumprimento do cronograma previsto;<br>
    e)	Em caso de atraso no pagamento do valor da parcela, o cliente deverá pagar multa de 2% e 0,33% do valor da parcela por dia de atraso.<br><br>

	Na expectativa de estar oferecendo a melhor oferta para os serviços solicitados, aproveitamos a oportunidade para apresentar protestos de consideração e apreço.<br><br>

  </td></tr>
<tr align="left"><td colspan="4">Atenciosamente,</td></tr>
<tr align="left">
  <td colspan="4"><br><img src="img/assinatura.jpg" width="325" height="67"><br><img src="images/linha.jpg" width="325" height="1"></td></tr>
<tr align="left">
  <td colspan="4"></td></tr>
  <tr align="left">
  <td colspan="4">
  	Priscila R. da Costa<br>
  	Dire&ccedil;&atilde;o Geral<br>
	contato@blushweb.com.br<br>
	21 8386-4225 | 7904-8315 <br>
	<br><br>


	De acordo,<br>
	Favor responder o e-mail aprovando o orçamento.<br><br>

  </td></tr>
<tr align="center"><td colspan="4"><p><br>
        <INPUT class=botoes id=Cadastrar onclick="return valida();validaEmail()" type=submit value=Cadastrar name=Cadastrar>
        <label>
          <input type="reset" name="limpar" id="limpar" value="Limpar"> 
        </label>
</p>
    <p>&nbsp; </p></td></tr>
</table>
</FORM> 
                                              
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