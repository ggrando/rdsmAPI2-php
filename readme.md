<h1> Integração com o RD Station Marketing via API 2.0 em PHP </h1>
<b>Objetivo?</b> Demonstrar o envio de uma conversão para o RD Station Marketing em PHP adotando a estrutura de autenticação da API 2.0 <br>
<br>
<blockquote>
Este software tem o objetivo de auxiliar o desenvolvedor a criar uma integração simples com o RD Station Marketing através da API pública 2.0.
<br> 
<h3> Isenção de Responsabilidade </h3> <br>
Este software é gratuito e não está associado ao RD Station Marketing. RD Station Marketing é uma marca registrada da empresa Resultados Digitais. Este código não é um produto oficial da Resultados Digitais.

</blockquote>

<h3>Processo de fluxo de autenticação OAuth adotado aqui: </h3>

<img src="https://uploaddeimagens.com.br/images/002/201/492/full/FLUXO_API.png">

<h3>Estrutura de banco de dados necessária</h3>

| id     	| refresh     	| token       	| update_date 	|
|--------	|-------------	|-------------	|-------------	|
| int PK 	| Varchar 255 	| Varchar 900 	| Varchar 255 	| 

<br>
É necessário possuir um banco de dados simples para gravar e gerenciar os tokens.
<h1> Como estruturar o exemplo? </h1>
<br>
1. Crie uma tabela contendo a estrurua acima;<br>
2. Faça o processo de captura do code, ele será necessário para gerenciar as informaçes da integração;
