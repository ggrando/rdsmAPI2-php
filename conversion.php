<?php

//======================================================================
// AUTHOR Guilherme Grando |  https://github.com/ggrando
//======================================================================

function conversion(){

global $nome, $email, $token;

echo "o valor é: ";
echo $nome;
echo "<br>";
echo "o valor do e-mail é: ";
echo $email;
echo "<br>";

// Primeiro você deve instanciar um array com os campos que você quer enviar:

$array = array("event_type" => "CONVERSION", 
"event_family" => "CDP",
"payload" => array ( "conversion_identifier" => "API DO GRANDO",
   "name" => "$nome",
   "email" => "$email")
   );


// Depois terá que usar a função json_encode para gerar o JSON:

$json = json_encode($array);

// A chamada da função CURL deve ficar assim:

$ch = curl_init('https://api.rd.services/platform/events');

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(

    'Content-Type: application/json',
    'Authorization: Bearer ' .($token),
    'Content-Length: ' . strlen($json))
    

);

//O tratamento do retorno da chamada deve acontecer na variável que está recebendo o resultado do curl_exec, caso o retorno seja um JSON também, você deve usar a função json_decode.


$server_output = curl_exec ($ch);

curl_close ($ch);

echo "Esse formulário foi integrado via API 2.0 do RD Station Marketing ";

echo "<br>";


 
//faz o parsing na string, gerando um objeto PHP
$obj = json_decode($server_output);

echo "<br>";
echo "O identificador dessa conversão é: ";
echo "$obj->event_uuid";
echo "<br>";

}


?>