<?php
include_once('../connection.php');
include_once('../estudos/actions/valida_login.php');
include_once('../estudos/home.php');

connectionDb();

$name_usuario_sujo = $_POST['name_create'];

$name_usuario_cadastro = filter_var($name_usuario_sujo, FILTER_SANITIZE_STRING);
// $name_usuario_cadastro =  $_POST['name_create'];
// $email_usuario_cadastro = $_POST['email_create'];
$email_usuario_cadastro = strtolower($_POST['email_create']);

        cadastroUsers($name_usuario_cadastro, $email_usuario_cadastro, $mensagem_sucesso);










function cadastroUsers($name_usuario_cadastro, $email_usuario_cadastro, $mensagem_sucesso)
{      if (isset($name_usuario_cadastro,$email_usuario_cadastro)) {
    $sql = "INSERT INTO `usuario` (`usuario`, `email`,`senha`)
                VALUES ('$name_usuario_cadastro', '$email_usuario_cadastro','1234')";

    $result = mysql_query($sql);

     return  header('Location: ../home.php?<?php >?');
}


}
