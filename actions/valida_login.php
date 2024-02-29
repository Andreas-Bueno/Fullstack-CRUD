<?php
include_once('../connection.php');
session_start();

connectionDb();
/*PARAMETROS DE ENTRADA*/

$emailInput = $_POST['email'];
$senhaInput = $_POST['password'];

if (isset($emailInput)) {
    $emailvalido = valida_input_email($emailInput);
}

echo "<pre>";
print_r(valida_login($senhaInput,$emailInput));
echo "</pre>";




















/*FUNÇÕES*/



function valida_input_email($emailInput)
{
    $emailInput = strtolower(trim($emailInput));

if (filter_var($emailInput, FILTER_VALIDATE_EMAIL) ) {
   return "Sucessfully";
}else {
   return "Invalid email";
}

}


function valida_login($senhaInput,$emailInput){
    $sql= "SELECT * FROM `usuario` WHERE email = '$emailInput' AND senha = '$senhaInput' LIMIT 1;";

   $result = mysql_query($sql);
    if (!$result) {
        return "Não foi possivel executar a consulta";
        exit;
    }
    $usuario = mysql_fetch_assoc($result);

    if (!$usuario) {
    return ;
    }else {

         $_SESSION['id'] = $usuario['id'];
         $_SESSION['usuario'] = $usuario['usuario'];
         $_SESSION['emai'] = $usuario['email'];

        header('Location: ../home.php');
        exit();
    }

}
