<?php
include_once('../connection.php');
include_once('../estudos/actions/valida_login.php');
include_once('../estudos/home.php');

connectionDb();

$name_usuario_cadastro=null;
$email_usuario_cadastro=null;
$name_usuario_cadastro_error=null;
$name_usuario_cadastro_error=null;

$name_usuario_sujo = $_POST['name_create'];

if (isset($_POST['BtnCadastrar'])) {
    $name_usuario_cadastro = filter_var($name_usuario_sujo, FILTER_SANITIZE_STRING);
    $email_usuario_cadastro = strtolower($_POST['email_create']);



    if (empty($name_usuario_cadastro))
     {
        echo $name_usuario_cadastro_error = "O campo nome está vazio";
    }else {
        cadastroUsers($name_usuario_cadastro, $email_usuario_cadastro);
    }
}


// $name_usuario_cadastro =  $_POST['name_create'];
// $email_usuario_cadastro = $_POST['email_create'];













function cadastroUsers($name_usuario_cadastro, $email_usuario_cadastro)

{

        $sql = "INSERT INTO `usuario` (`usuario`, `email`,`senha`,`status`)
                    VALUES ('$name_usuario_cadastro', '$email_usuario_cadastro','1234','1')";

        $result = mysql_query($sql);

         return  header('Location: ../home.php?<?php echo  >?');

}
