<?

//======================================================================
// AUTHOR Guilherme Grando |  https://github.com/ggrando
//======================================================================

//Define a data
date_default_timezone_set('America/Sao_Paulo'); 


//Faz a chamada dos arquivos responsaveis por atualizar a integracao
include 'conect.php';
include 'atualiza_token.php';
include 'conversion.php';


//Faz a consulta no banco de dados para obter os tokens atuais
$sql = "SELECT * FROM token_rdsm";

$resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

while ($registro = mysqli_fetch_array($resultado)) {
    
   $token = $registro['token'];
   $data =  $registro['update_date'];
   $expira = $registro['refresh'];
   
 }

//Recebe os dados do seu formulario
$nome = $_POST["nome"];
$email = $_POST["email"];


//Faz a conta do campo data do banco de dados com a data atual
$expires_in = $expira;

$tempo_passado = $data;
$agora = date("Y-m-d H:i:s");
$segundos = (strtotime($agora) - strtotime($tempo_passado));
$minutos = $segundos / (60);
$horas = $minutos / (60);
$mostra_horas = intval($horas);
$mostra_minutos = intval($minutos - ($mostra_horas * 60));

$mostra_segundos = intval($segundos - ($mostra_minutos * 60 * 60) - ($mostra_minutos * 60));

$falta = $segundos - $expires_in;

//Inicia a validacao do token
if ($segundos > $expires_in  ){

new_token();
conversion();

} else {
    
conversion();

}


//A funcao new_token() e responsavel por atualizar o token e esta localizada no arquivo atualiza_token.php
// A funcao conversion () envia o pacote de conversao para o RDSM


?>

