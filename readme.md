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

TABELA "token_rdsm" responsável por guardar o token atual

| id     	| refresh     	| token       	| update_date 	|
|--------	|-------------	|-------------	|-------------	|
| int PK 	| Varchar 255 	| Varchar 900 	| Varchar 255 	| 

TABELA "app_credentials" responsável por guardar as credenciais do aplicativo.

| id     	| client_id    	| client_secret	| redirect_url	| refresh_token |
|--------	|-------------	|-------------	|-------------	|-------------	|
| int PK 	| Varchar 255 	| Varchar 900 	| Varchar 255 	| Varchar 255 	|  

<br>
É necessário possuir um banco de dados simples para gravar e gerenciar os tokens.
<h1> Como estruturar o exemplo? </h1>
<br>

1. Crie uma tabela contendo a estrurua acima;<a href="https://github.com/ggrando/rdsmAPI2-php/blob/master/database.sql"> SQL Example </a><br> 
2. Aplique as credenciais no arquivo conexão (<a href="https://github.com/ggrando/rdsmAPI2-php/blob/master/conect.php">conect.php</a>) <br>
3. Faça o processo de captura do code, ele será necessário para gerenciar as informaçes da integração; <a href="https://github.com/ggrando/rdsmAPI2-php/tree/master/CODE">Clique aqui </a> <br>
4. A raiz (CODE) pode ser destruída do seu diretório, pois, ela é a responsável pela atualização inicial das tabelas. <br>
5. O arquivo <a href="https://github.com/ggrando/rdsmAPI2-php/blob/master/form_exemplo.html">form_exemplo.html</a> te mostra um formulaŕio de exemplo que chama o arquivo <a href="https://github.com/ggrando/rdsmAPI2-php/blob/master/post.php">post.php, </a>responsável por fazer o envio da conversão. Com essa informação gerencie os disparo de acordo com o seu formulário. <br>

É importante que os dados dos arquivos que processa as informações sejam atualizados de acordo com seu formulário. <br>

<h3> Como atualizar? </h3>
- Atualize os dados que são passados pelo seu formulário no arquivo que recebe o post em: <a href="https://github.com/ggrando/rdsmAPI2-php/blob/master/post.php">post.php</a> <br>
- Atualize o arquivo que faz o disparo para o RD Station em <a href="https://github.com/ggrando/rdsmAPI2-php/blob/master/conversion.php">conversion.php</a> <br>

Você precisa passar as variáveis na tag global, no exemplo padrão somente os dados do email e nome são enviados. Você precisa também incluir as variáveis nova no Payload que é disparado.


