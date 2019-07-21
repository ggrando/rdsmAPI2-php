<?php

//======================================================================
// AUTHOR Guilherme Grando |  https://github.com/ggrando
//======================================================================

include "../conect.php";
date_default_timezone_set('America/Sao_Paulo'); 
$agora = date("Y-m-d H:i:s");


//Recebe os dados do RDSM
$code = $_GET["code"];

if($_GET["code"] === "") echo "CODE NAO CONCEDIDO NA URL!\n";

//Faz a consulta no banco de dados
$sql = "SELECT * FROM app_credentials";

$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

while ($registro = mysqli_fetch_array($resultado)) {

   $client_id = $registro['client_id'];
   $client_secret =  $registro['client_secret'];

 }
 
 
//Cria o Array com o Json

$array = array("client_id" => "$client_id", 
"client_secret" => "$client_secret",
"code" => "$code" 
   );


//Usa a função json_encode para gerar o JSON:

$json = json_encode($array);

// A chamada da função CURL deve ficar assim:

$ch = curl_init('https://api.rd.services/auth/token');

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(

    'Content-Type: application/json',
    'Content-Length: ' . strlen($json))
    );

//Tratamento do retorno da chamada

$server_output = curl_exec ($ch);

curl_close ($ch);


//FIM DO PROCESSO DO CODE
//INICIA O PROCESSO DE TRATAMENTO DO TOKEN



//TRATANDO O JSON DO CODE PARA UM NOVO DISPARO
$obj = json_decode($server_output);

$novo_token = $obj->access_token;
$expira =  $obj->expires_in;
$refresh = $obj->refresh_token;


//ATUALIZA A TABELA DE TOKEN COM OS NOVOS DADOS

 $sql = "UPDATE token_rdsm SET token = '$novo_token',  refresh = '$expira', update_date = '$agora'";


if ($conn->query($sql) === TRUE) {
echo "Tabela token_rdsm atualizada";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}


$sql = "UPDATE app_credentials SET refresh_token = '$refresh'";


if ($conn->query($sql) === TRUE) {
echo "<br>Tabela token_rdsm atualizad<br>Essa janela já pode ser fechada....";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}$conn->close(); 

?>
