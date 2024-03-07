<?php
include_once('../connection.php');
include_once('../estudos/actions/valida_login.php');
include_once('../estudos/home.php');
connectionDb();

$id_usuario = $_GET["id"];
$status_usuario = $_GET["status"];

if ($status_usuario=='0') {
    status_user_0($id_usuario);
}else {
    status_user_1($id_usuario);
}



function status_user_0($id_usuario){

    $sql=" UPDATE usuario SET `status` = '1' WHERE `id` = $id_usuario;";
    $result= mysql_query($sql);
    header('Location: ../home.php');



}

function status_user_1($id_usuario){
    $sql=" UPDATE `usuario` SET `status` = '0' WHERE `id` = $id_usuario;";
        $result= mysql_query($sql);
        header('Location: ../home.php');
}
