<?php
// ------------------------- DADOS DIN�MICOS DO SEU CLIENTE PARA A GERA��O DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formul�rio c/ POST, GET ou de BD (MySql,Postgre,etc)	//

// DADOS DO BOLETO PARA O SEU CLIENTE
$idcli = $_POST['idcli'];
$nosso_numero = $_POST['numdoc'];
$dias_de_prazo_para_pagamento = 0;
$taxa_boleto = 2.10;
// $data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006";
$data_venc = $_POST['vencimento'];
$valor_cobrado = $_POST['valor']; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

$dadosboleto["nosso_numero"] = $nosso_numero;  // Nosso numero sem o DV - REGRA: M�ximo de 11 caracteres!
$dadosboleto["numero_documento"] = $dadosboleto["nosso_numero"];	// Num do pedido ou do documento = Nosso numero
$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emiss�o do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com v�rgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $_POST['nome'];
$dadosboleto["endereco1"] = $_POST['endereco'];
$dadosboleto["endereco2"] = $_POST['cidade']." - ".$_POST['estado']." - ".$_POST['cep'];

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = "Pagamento de Compra na Blush! Web e Publicidade";
$dadosboleto["demonstrativo2"] = "Mensalidade referente a compra de Produtos <br>Taxa banc�ria - R$ ".number_format($taxa_boleto, 2, ',', '');
$dadosboleto["demonstrativo3"] = "Blush! Web e Publicidade - http://www.blushweb.com.br";
$dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% ap�s o vencimento + 0,33% ao dia";
$dadosboleto["instrucoes2"] = "- Ap�s o vencimento pagar somente nas ag�ncias do Bradesco";
$dadosboleto["instrucoes3"] = "- Em caso de d�vidas entre em contato conosco: contato@blushweb.com.br";
$dadosboleto["instrucoes4"] = "&nbsp; Emitido pelo Blush! Web e Publicidade - www.blushweb.com.br";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "001";
$dadosboleto["valor_unitario"] = $valor_boleto;
$dadosboleto["aceite"] = "";		
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "DS";


// ---------------------- DADOS FIXOS DE CONFIGURA��O DO SEU BOLETO --------------- //


// DADOS DA SUA CONTA - Bradesco
$dadosboleto["agencia"] = "2922"; // Num da agencia, sem digito
$dadosboleto["agencia_dv"] = "0"; // Digito do Num da agencia
$dadosboleto["conta"] = "0007628"; 	// Num da conta, sem digito
$dadosboleto["conta_dv"] = "7"; 	// Digito do Num da conta

// DADOS PERSONALIZADOS - Bradesco
$dadosboleto["conta_cedente"] = "0007628"; // ContaCedente do Cliente, sem digito (Somente N�meros)
$dadosboleto["conta_cedente_dv"] = "7"; // Digito da ContaCedente do Cliente
$dadosboleto["carteira"] = "06";  // C�digo da Carteira: pode ser 06 ou 03

// SEUS DADOS
$dadosboleto["identificacao"] = "Blush! Web e Publicidade - As melhores ideias est�o aqui!";
$dadosboleto["cpf_cnpj"] = "15.704.888/0001-10";
$dadosboleto["endereco"] = "Coloque o endere�o da sua empresa aqui";
$dadosboleto["cidade_uf"] = "Rio de Janeiro / RJ";
$dadosboleto["cedente"] = "Blush! Web e Publicidade";

// N�O ALTERAR!
include("include/funcoes_bradescop.php"); 
include("include/layout_bradescop.php");

?>
