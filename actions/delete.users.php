<?php
include_once('../connection.php');
include_once('../estudos/actions/valida_login.php');
include_once('../estudos/home.php');

connectionDb();

$id_usuario = $_GET["id"];
$email_usuario = $_GET["email"];



function delete_user($id_usuario,$email_usuario){
    $sql="DELETE FROM comentario WHERE id = ";


}
