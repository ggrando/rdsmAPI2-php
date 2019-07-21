<?

//======================================================================
// AUTHOR Guilherme Grando |  https://github.com/ggrando
//======================================================================

function new_token(){

date_default_timezone_set('America/Sao_Paulo'); 
include "conect.php";
$agora = date("Y-m-d H:i:s");


//Faz a consulta no banco de dados
$sql = "SELECT * FROM app_credentials";

$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

while ($registro = mysqli_fetch_array($resultado)) {
    
   $client_id = $registro['client_id'];
   $client_secret =  $registro['client_secret'];
   $refresh_token = $registro['refresh_token'];

 }

// Primeiro você deve instanciar um array com os campos que você quer enviar:

$array = array("client_id" => "$client_id", "client_secret" => "$client_secret", "refresh_token" => "$refresh_token");

// Depois terá que usar a função json_encode para gerar o JSON:

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


//O tratamento do retorno da chamada deve acontecer na variável que está recebendo o resultado do curl_exec, caso o retorno seja um JSON também, você deve usar a função json_decode.


$server_output = curl_exec ($ch);

curl_close ($ch);

//faz o parsing na string, gerando um objeto PHP
$obj = json_decode($server_output);

$novo_token = $obj->access_token;
$expira =  $obj->expires_in;


//imprime o conteúdo do objeto 
echo "access_token:<br> $obj->access_token<br>";
echo "<br>";
echo "Ele vai expirar em: $obj->expires_in"; 
echo " segundos";
echo "<br><br>";
echo "refresh_token: $obj->refresh_token<br>"; 

$teste = $obj->refresh_token;



 $sql = "UPDATE token_rdsm SET token = '$novo_token',  refresh = '$expira', update_date = '$agora'";


if ($conn->query($sql) === TRUE) {
echo "<br> o token atual foi atualizado para este novo ;)";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}$conn->close(); 

}



?>