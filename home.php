<?php
include_once('connection.php');
include_once('functions.php');


session_start();
connectionDb();


$search_input = $_GET['search_input'];


$exibe_usuarios = show_users();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="flex bg-stone-950 text-white w-full h-full">

    <nav class="grid bg-stone-950 text-gray-700 p-10 w-screen items-center mx-16">
        <h1 class="mt-10  text-2xl	font-bold font-medium text-pink-700 text-center font-bold">
            Olá, bem-vindo ao Painel Administrativo.
        </h1>
        <div class="flex items-center  mt-20 my-6">
            <div class="flex">
                <a href="cadastro_usuario.php" name="btn_enviar" class=" p-1 w-52 flex justify-center items-center text-black font-bold h-9 button2 bg-pink-700 rounded-md">Cadastrar Usuário</a>

            </div>
            <div class="flex w-8/12 items-center justify-between">
                <form method="GET" class=" w-10/12 h-10 flex justify-center mx-40">
                    <input type="text" name="search_input" id="search_input" placeholder="Busque aqui..." class="flex w-60 p-1 h-9 text-black rounded-sm">
                    <button id="btn_search" name="btn_search" onclick="search_data()" type="submit" class="mx-2 relative h-9 bg-pink-600 p-1 rounded-md w-20">Buscar</button>
                </form>
            </div>
        </div>





        </div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-9-12">
            <table class="w-11/12 text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs bg-pink-950 text-white font-bold uppercase my-2">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nome
                        </th>
                        <th scope="col" class="px-6 py-3">
                            E-mail
                        </th>
                        <th scope="col" class="px-5 py-3">
                            Senha
                        </th>
                        <th scope="col" class="px-4 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php for ($i = 0; $i < count($exibe_usuarios); $i++) { ?>
                        <tr class="bg-white border-b dark:bg-stone-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-pink-600 hover:text-gray-900">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?php echo $exibe_usuarios[$i]['id'];   ?>
                            </th>
                            <td class="px-6 py-4">
                                <?php echo $exibe_usuarios[$i]['usuario'];   ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $exibe_usuarios[$i]['email'];
                                ?>

                            </td>

                            <td class="px-6 py-4">
                                <?php echo $exibe_usuarios[$i]['senha'];   ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $exibe_usuarios[$i]['status'];
                                ?>

                            </td>
                            </td>
                            <td class="px-6 py-4">



                                <a id="BtnReset" name="BtnReset" class="mx-4 bg-pink-600 rounded-md text-gray-900 outline hover:outline-none dark:md:hover:bg-pink-700 px-6 py-4" href="update_senha.php?id=<?= $exibe_usuarios[$i]['id']; ?>&email=<?= $exibe_usuarios[$i]['email']; ?>">


                                    Resetar senha

                                </a>

                                <a id="BtnDelete" name="BtnDelete" class="mx-4 bg-red-600 rounded-md text-gray-900 outline hover:outline-none dark:md:hover:bg-red-700 px-6 py-4" href="actions/delete.users.php?id=<?= $exibe_usuarios[$i]['id']; ?>&status=<?= $exibe_usuarios[$i]['status']; ?>">


                                    Alterar Status

                                </a>
                            </td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </nav>

</body>
<script>
    var search_bar = document.getElementById('search_input');

    function search_data() {
        window.location = 'functions.php?search=' + search_bar.value;
    }
</script>

</html>
