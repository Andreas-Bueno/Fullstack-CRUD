<?php
include_once('connection.php');
include_once('../estudos/actions/valida_login.php');
include_once('../estudos/home.php');

//pegando dados do formulario\\
$name_usuario_cadastro = $_POST["name_create"];
$email_usuario_cadastro= $_POST["email_create"];
//url para sucesso no cadastro\\
$urlSucesso = "../home.php?idMenu=1&msg=1000101";
//funcão de cadastro\\
verifica_usuario_db($email_usuario_cadastro,$name_usuario_cadastro);




function show_users()
{
    $sql = "SELECT * FROM usuario;";
    $resultado = mysql_query($sql);

    if (mysql_num_rows($resultado) > 0) {
        while ($row = mysql_fetch_assoc($resultado)) {
            $array_usuarios[] = $row;
        }
    } else {
        $array_usuarios = [];
    }
    return $array_usuarios;
}

function cadastroUsers($name_usuario_cadastro, $email_usuario_cadastro)
{

                $sql = "INSERT INTO `usuario` (`usuario`, `email`,`senha`)
                VALUES ('$name_usuario_cadastro', '$email_usuario_cadastro','1234')";

                $resultado = mysql_query($sql);
            return;
}

function verifica_usuario_db($email_usuario_cadastro,$name_usuario_cadastro){
    $error_mesage= 'Nenhum usuario para cadastrar';
    $sql = "SELECT * FROM usuario WHERE email LIKE '$email_usuario_cadastro';";
    if ($sql) {
        cadastroUsers($name_usuario_cadastro, $email_usuario_cadastro);
    }else {
        return exit;
    }
}
