<?php
include_once('connection.php');
// include_once('../estudos/actions/valida_login.php');
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
    <title class="">Cadastro de Usuários</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="flex justify-center items-center h-screen w-screen  bg-gradient-to-r from-stone-950 to-stone-700 text-white ">
    <form action="actions/action_create_user.php" method="post" class="grid mx-1">

        <h1 class="p-2 font-bold text-3xl h-10 my-4 text-white">Cadastro de usuário</h1>
        <label for="name_create" class="rounded-md p-2 font-bold text-md text-white mt-10">Nome</label>

        <input type="name" name="name_create" id="name_create" placeholder="Nome..." autofocus class="mt-4 rounded-md p-2 text-black" required>
        <br>
        <div>
            <?php echo  $name_usuario_cadastro_error; ?>
        </div>
        <br>
        <label for="email_create" class=" rounded-md p-2 font-bold text-md rounded-full text-white">E-mail</label>


        <input type="email" name="email_create" id="email_create" placeholder="exemplo@exemplo.com" required class="mt-4 rounded-md p-2 text-black">
        <br>
        <div>
            <?php echo  $email_usuario_cadastro_error; ?>
        </div>
        <br>
        <button type="submit" id="BtnCadastrar" name="BtnCadastrar" class="font-semibold leading-6 text-white shadow-sm hover:bg-pink-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 relative w-full rounded-md w-20 h-20  font--4xl font-bold p-1 text-2xl bg-pink-950">


            Cadastrar</button>


        <a href="home.php" class="mt-3 flex justify-center items-center p-2 font-semibold text-white shadow-sm hover:bg-pink-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 relative w-full rounded-md w-14 h-10 font--4xl font-bold text-xl bg-pink-950">


            Voltar</a>



    </form>
    </form>

    <div>

</body>

</html>
