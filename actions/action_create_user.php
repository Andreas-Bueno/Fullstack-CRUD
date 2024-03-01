<?php
include_once('../connection.php');
include_once('../estudos/actions/valida_login.php');
include_once('../estudos/home.php');

connectionDb();

$name_usuario_cadastro = $_POST['name_create'];
$email_usuario_cadastro = $_POST['email_create'];

cadastroUsers($name_usuario_cadastro, $email_usuario_cadastro);

// echo "<pre>";
// print_r($name_usuario_cadastro);
// echo "</pre>";
// print_r($email_usuario_cadastro);
// echo "</pre>";




function cadastroUsers($name_usuario_cadastro, $email_usuario_cadastro)
{
        $sql = "INSERT INTO `usuario` (`usuario`, `email`,`senha`)
                VALUES ('$name_usuario_cadastro', '$email_usuario_cadastro','1234')";

        $result = mysql_query($sql);

        return  header('Location: ../home.php');
}
