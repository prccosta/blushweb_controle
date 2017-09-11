// JavaScript Document
function Ajax() { 
try { 
request = new XMLHttpRequest(); 
} catch (tryMS) { 
try { 
request = new ActiveXObject("Msxml2.XMLHTTP"); 
} catch (otherMS) { 
try { 
request = new ActiveXObject("Microsoft.XMLHTTP"); 
} catch (failed) { 
request = null; 
} 
} 
} 
return request; 
} 

function FormataCpf(campo, teclapres) 
{ 
var tecla = teclapres.keyCode; 
var vr = new String(campo.value); 
vr = vr.replace(".", ""); 
vr = vr.replace("/", ""); 
vr = vr.replace("-", ""); 
tam = vr.length + 1; 
if (tecla != 14) 
{ 
if (tam == 4) 
campo.value = vr.substr(0, 3) + '.'; 
if (tam == 7) 
campo.value = vr.substr(0, 3) + '.' + vr.substr(3, 6) + '.'; 
if (tam == 11) 
campo.value = vr.substr(0, 3) + '.' + vr.substr(3, 3) + '.' + vr.substr(7, 3) + '-' + vr.substr(11, 2); 
} 
} 
function FormataCep(campo, teclapres) 
{ 
var tecla = teclapres.keyCode; 
var vr = new String(campo.value); 
vr = vr.replace(".", ""); 
vr = vr.replace("/", ""); 
vr = vr.replace("-", ""); 
tam = vr.length + 1; 
if (tecla != 9) 
{ 
if (tam == 6) 
campo.value = vr.substr(0, 5) + '-'; 
} 
} 
function FormataData(campo, teclapres) 
{ 
var tecla = teclapres.keyCode; 
var vr = new String(campo.value); 
vr = vr.replace("/", ""); 
tam = vr.length + 1; 
if (tecla != 8) 
{ 
if (tam == 3) 
campo.value = vr.substr(0, 2) + '/'; 
if (tam == 5) 
campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 4) + '/'; 
} 
} 
function fone(obj,prox) { 
switch (obj.value.length) { 
case 1: 
obj.value = "(" + obj.value; 
break; 
case 3: 
obj.value = obj.value + ")"; 
break; 
case 8: 
obj.value = obj.value + "-"; 
break; 
case 13: 
prox.focus(); 
break; 
} 
} 
function teclas(event){ 
if(((event.keyCode < 96) || (event.keyCode > 105)) && ((event.keyCode < 48) || (event.keyCode > 57)) ) { 
campo.value = campo.value.replace(String.fromCharCode(event.keyCode).toLowerCase(),""); 
} 
} 
function numMoeda(event,campo){ 
teclas(campo); 
str = campo.value; 
while(str.search(",") != -1) 
str = str.replace(",",""); 
i = 0; 
while(i< str.length){ 
if(str.substr(i,1) == ".") 
str = str.replace(".",""); 
i++; 
} 
part1 = str.substr(0,str.length - 2); 
while(part1.search(" ") != -1) 
part1 = part1.replace(" ",""); 
part2 = str.substr(str.length - 2,2); 
res = ""; 
i = part1.length; 
sob = i % 3; 
if((sob != 0) && (i > 2)) 
res = part1.substr(0,sob) + ","; 
else 
res = part1.substr(0,sob); 
j = 1; 
part1 = part1.substr(sob); 
i = 0; 
while(i < part1.length){ 
if(j == 3){ 
if(i + 1 == part1.length) 
res = res + part1.substr(i-2,3); 
else res = res + part1.substr(i-2,3) + "."; 
} 
i++; 
j = j<3?j+1:1; 
} 
campo.value = res + "." + part2; 
}

function numMoeda2(event,campo){ 
teclas(campo); 
str = campo.value; 
while(str.search(",") != -1) 
str = str.replace(",",""); 
i = 0; 
while(i< str.length){ 
if(str.substr(i,1) == ".") 
str = str.replace(".",""); 
i++; 
} 
part1 = str.substr(0,str.length - 2); 
while(part1.search(" ") != -1) 
part1 = part1.replace(" ",""); 
part2 = str.substr(str.length - 2,2); 
res = ""; 
i = part1.length; 
sob = i % 3; 
if((sob != 0) && (i > 2)) 
res = part1.substr(0,sob) + "."; 
else 
res = part1.substr(0,sob); 
j = 1; 
part1 = part1.substr(sob); 
i = 0; 
while(i < part1.length){ 
if(j == 3){ 
if(i + 1 == part1.length) 
res = res + part1.substr(i-2,3); 
else res = res + part1.substr(i-2,3) + "."; 
} 
i++; 
j = j<3?j+1:1; 
} 
campo.value = res + "," + part2; 
} 

function soma() { 


campo1 = document.cadastro.freteliq.value; 
campo1 = campo1.replace(/[.]/g, ""); 
campo1 = campo1.replace(/[,]/g, ""); 

campo2 = document.cadastro.seguro.value; 
campo2 = campo2.replace(/[.]/g, ""); 
campo2 = campo2.replace(/[,]/g, ""); 

campo3 = document.cadastro.txbancaria.value; 
campo3 = campo3.replace(/[.]/g, ""); 
campo3 = campo3.replace(/[,]/g, ""); 

campo4 = document.cadastro.pedagio.value; 
campo4 = campo4.replace(/[.]/g, ""); 
campo4 = campo4.replace(/[,]/g, ""); 

campo5 = document.cadastro.ajudextra.value; 
campo5 = campo5.replace(/[.]/g, ""); 
campo5 = campo5.replace(/[,]/g, ""); 

campo6 = document.cadastro.heajudante.value; 
campo6 = campo6.replace(/[.]/g, ""); 
campo6 = campo6.replace(/[,]/g, ""); 

campo7 = document.cadastro.hemotorista.value; 
campo7 = campo7.replace(/[.]/g, ""); 
campo7 = campo7.replace(/[,]/g, ""); 

campo8 = document.cadastro.hesupervisor.value; 
campo8 = campo8.replace(/[.]/g, ""); 
campo8 = campo8.replace(/[,]/g, ""); 

campo9 = document.cadastro.matexced.value; 
campo9 = campo9.replace(/[.]/g, ""); 
campo9 = campo9.replace(/[,]/g, ""); 

campo10 = document.cadastro.txpermanente.value; 
campo10 = campo10.replace(/[.]/g, ""); 
campo10 = campo10.replace(/[,]/g, ""); 

if(campo1!="" && campo2!="" && campo3!="" && campo4!="" && campo5!="" && campo6!="" && campo7!="" && campo8!="" && campo9!="" && campo10!="") { 
total = parseFloat(campo1)+parseFloat(campo2)+parseFloat(campo3)+parseFloat(campo4)+parseFloat(campo5)+parseFloat(campo6)+parseFloat(campo7)+parseFloat(campo8)+parseFloat(campo9)+parseFloat(campo10);
document.cadastro.subtotal.value=parseFloat(total); 
} 
} 

function preenchezeros() { 
var campos = document.getElementsByTagName('input'); 
for(var i=0;i<campos.length;i++){ 
if(campos[i].type=='text' && campos[i].value==','){campos[i].value='0,00';} 
} 
} 

function somaiss() { 
var subtotal = document.cadastro.subtotal.value.replace(/\D/g, ""); 
var iss = ((subtotal/100)*0.05).toFixed(2); 
document.cadastro.iss.value=iss; 

}

function somacomissao() { 
var valor_total_venda = document.vendas.valor_total_venda.value.replace(/\D/g, ""); 
var comissao = ((valor_total_venda/100)*0.10).toFixed(2); 
document.vendas.comissao.value=comissao; 

}

function somatotal() { 


campo1 = document.cadastro.subtotal.value; 
campo1 = campo1.replace(/[.]/g, ""); 
campo1 = campo1.replace(/[,]/g, ""); 

campo2 = document.cadastro.iss.value; 
campo2 = campo2.replace(/[.]/g, ""); 
campo2 = campo2.replace(/[,]/g, ""); 

if(campo1!="" && campo2!="") { 
total = parseFloat(campo1)+parseFloat(campo2); 
document.cadastro.total.value=parseFloat(total); 
} 
}
function numMoedaDecimal(event,campo){ 
teclas(campo); 
str = campo.value; 
while(str.search(",") != -1) 
str = str.replace(",",""); 
i = 0; 

part1 = str.substr(0,str.length - 2); 
while(part1.search(" ") != -1) 
part1 = part1.replace(" ",""); 
part2 = str.substr(str.length - 2,2); 
res = ""; 
i = part1.length; 
sob = i % 3; 
if((sob != 0) && (i > 2)) 
res = part1.substr(0,sob); 
else 
res = part1.substr(0,sob); 
j = 1; 
part1 = part1.substr(sob); 
i = 0; 
while(i < part1.length){ 
if(j == 3){ 
if(i + 1 == part1.length) 
res = res + part1.substr(i-2,3); 
else res = res + part1.substr(i-2,3); 
} 
i++; 
j = j<3?j+1:1; 
} 
campo.value = res + "," + part2; 
}