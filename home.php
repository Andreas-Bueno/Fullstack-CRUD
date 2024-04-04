<?php
include_once('connection.php');
include_once('functions.php');


session_start();
connectionDb();

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

<body class="flex text-white font-bold  w-full h-full bg-gradient-to-r from-neutral-400 to-neutral-700">

    <nav class="grid  bg-gradient-to-r from-neutral-400 to-neutral-700	p-10 w-screen">
        <h1 class="mt-10  text-3xl	font-bold font-medium text-white text-center font-bold">
            Bem-vindo ao Painel Administrativo.
        </h1>
        <div class="flex items-center  mt-20 my-6">
            <div class="flex">
                <a href="cadastro_usuario.php" name="btn_enviar" class="text-white p-1 w-52 flex justify-center items-center font-bold h-9 button2 bg-pink-950 rounded-md hover:bg-pink-700">Cadastrar Usuário</a>

            </div>
            <div class="flex w-8/12 items-center justify-between">
                <form id="form_search" name="form_search" method="POST" class=" w-10/12 h-10 flex justify-center mx-40">
                    <input type="text" name="search_input" id="search_input" placeholder="Busque aqui..." class="flex w-60 p-1 h-9 text-black rounded-sm">
                    <button type="submit" id="search_btn" class="font-bold mx-2 relative h-9 bg-pink-950 p-1 rounded-md w-20 hover:bg-pink-700">Buscar</button>
                </form>
            </div>
        </div>





        </div>


        <div class="relative overflow-x-auto  sm:rounded-lg w-9-12">
            <table class="w-11/12 text-sm text-left text-gray-500 dark:text-gray-400 rounded-full shadow-xl">
                <thead class="h-12 text-xs bg-white  bg-opacity-5 text-white font-bold font-2xl  my-2  p-2">
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
                <tbody class="">

                    <?php for ($i = 0; $i < count($exibe_usuarios); $i++) { ?>
                        <tr class="border-4 border-double border-white dark:bg-stone-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-pink-600 hover:text-gray-900">
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
                            <td class="p-7">



                                <a id="BtnReset" name="BtnReset" class="mx-4 bg-pink-950 rounded-md text-white  hover:outline-none dark:md:hover:bg-pink-700 px-6 py-4 p-2" href="update_senha.php?id=<?= $exibe_usuarios[$i]['id']; ?>&email=<?= $exibe_usuarios[$i]['email']; ?>">


                                    Resetar senha

                                </a>

                                <a id="BtnDelete" name="BtnDelete" class="mx-4 bg-pink-950 rounded-md text-white  hover:outline-none dark:md:hover:bg-pink-700 px-6 py-4 p-2" href="actions/delete.users.php?id=<?= $exibe_usuarios[$i]['id']; ?>&status=<?= $exibe_usuarios[$i]['status']; ?>">


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
    //Todo capturar o valor do input

    document.getElementById('form_search').addEventListener('submit', function(event) {
        event.preventDefault(); // Previne o envio padrão do formulário
        url = 'exibe_pesquisa.php';
        // Captura os valores dos campos de entrada
        var busca = document.getElementById('search_input').value;

        const myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

        const urlencoded = new URLSearchParams();
        urlencoded.append("search_input", busca);

        const requestOptions = {
            method: "POST",
            headers: myHeaders,
            body: urlencoded,
            redirect: "follow"
        };

        async function response() {
            const res = await fetch(url, requestOptions)
            const data = await res.json();

            const arrayDeDados = Object.values(data);

            console.log(arrayDeDados);


        }
        response();







        // fetch("http://localhost:8000/estudos/exibe_pesquisa.php", requestOptions)
        //     .then((response) => {
        //         response.json()
        //         console.log(response);
        //     })
        //     .catch((error) => console.error())
    });
</script>

</html>
