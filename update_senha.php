<?php
include_once('../estudos/connection.php');
connectionDb();

 $id_usuario = $_GET["id"];
 $email_usuario = $_GET["email"];


$senha_reset = reset_senha($id_usuario);









function reset_senha ($id_usuario){
$sql=" UPDATE `usuario` SET `senha` = 'sanofi' WHERE `id` = $id_usuario;";
$result= mysql_query($sql);
return header('Location: home.php'); ;
}
