<?php
include_once('connection.php');
include_once('../estudos/actions/valida_login.php');
include_once('../estudos/actions/create_user_login.php');
session_start();
connectionDb();

//erros

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="flex justify-center items-center h-screen w-screen  bg-gradient-to-r from-pink-700 bg-pink-950 text-white ">
    <form action="actions/action_create_user.php" method="post" class="grid mx-2">

        <h1 class="p-2 font-bold text-2xl h-10 my-4">Cadastro de usuário</h1>
        <label for="name_create" class="rounded-md p-2 font-bold text-md">Nome</label>

        <input type="name" name="name_create" id="name_create" placeholder="Nome..." autofocus class="rounded-md p-2 text-black" required>
        <br>
        <div>
            <?php echo  $name_usuario_cadastro_error; ?>
        </div>
        <br>
        <label for="email_create" class="rounded-md p-2 font-bold text-md">E-mail</label>


        <input type="email" name="email_create" id="email_create" placeholder="exemplo@exemplo.com" required class="rounded-md p-2 text-black">
        <br>
        <div>
            <?php echo  $email_usuario_cadastro_error; ?>
        </div>
        <br>
        <button type="submit" id="BtnCadastrar" name="BtnCadastrar" class="relative w-full rounded-md w-20 h-20  font--4xl font-bold p-1 text-2xl bg-pink-950">


            Cadastrar</button>



    </form>
    <div>

</body>

</html>
