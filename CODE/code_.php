<?php

//======================================================================
// AUTHOR Guilherme Grando |  https://github.com/ggrando
//======================================================================

include "../conect.php";



//Recebe os dados do formulario
$client_id = $_POST["client_id"];
$redirect_url = $_POST["redirect_url"];
$client_secret = $_POST["client_secret"];

 
 $sql = "UPDATE app_credentials SET 
 client_id = '$client_id', 
 client_secret = '$client_secret', 
 redirect_url = '$redirect_url'";

//SE TUDO DER CERTO COM A ATUALIZACAO DO BANCO REDIRECIONA

if ($conn->query($sql) === TRUE) {
echo "

Você será redirecionado... <META http-equiv='refresh' content='0;URL=https://api.rd.services/auth/dialog?client_id={$client_id}&redirect_url={$redirect_url}'>";

} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}$conn->close(); 



?>