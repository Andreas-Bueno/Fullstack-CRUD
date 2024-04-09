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
        <div id="alert_search" class="fixed justify-center items-center h-22 inset-x-0 mt-60 mx-auto invisible w-60 z-40 shadow-2xl p-2">
            <div class="bg-yellow-100 text-yellow-600 p-8 rounded-lg text-xl ">
                <!-- Conteúdo da sua caixa aqui -->
                <p>Usuáio não encontrado 😞</p>
            </div>
        </div>

        <div id="campo_vazio" class="fixed justify-center items-center h-22 inset-x-0 mt-60 mx-auto invisible w-60 z-40 shadow-2xl p-2">
            <div class="bg-yellow-100 text-yellow-600 p-8 rounded-lg text-xl ">
                <!-- Conteúdo da sua caixa aqui -->
                <p>Campo de busca Vazio 😞</p>
            </div>
        </div>

        <tbody id="table-container" class="relative overflow-x-auto  sm:rounded-lg w-9-12">
            <table id="tabela_home" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rounded-lg shadow-xl" id="tabela_principal">
                <thead id="thead" class="h-12 text-xs bg-white  bg-opacity-5 text-white font-bold font-2xl  my-2  p-2">
                    <div id="tabela-container">

                    </div>
                    <tr>
                        <th scope="col" class="">
                            ID
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

                <tbody id="tabela_search_and_all" class="">


                    <?php for ($i = 0; $i < count($exibe_usuarios); $i++) { ?>
                        <tr id="ocult_div_filha" class="border-4 border-double border-white dark:bg-stone-900 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-pink-600 hover:text-gray-900">
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
                            <td class="py-7 px-3">



                                <a id="BtnReset" name="BtnReset" class="w-5  h-3 bg-pink-950 rounded-md text-white  hover:outline-none dark:md:hover:bg-pink-700 p-4" href="update_senha.php?id=<?= $exibe_usuarios[$i]['id']; ?>&email=<?= $exibe_usuarios[$i]['email']; ?>">


                                    Resetar senha

                                </a>

                                <a id="BtnDelete" name="BtnDelete" class="w-5 h-3  ml-4 bg-pink-950 rounded-md text-white  hover:outline-none dark:md:hover:bg-pink-700 p-4" href="actions/delete.users.php?id=<?= $exibe_usuarios[$i]['id']; ?>&status=<?= $exibe_usuarios[$i]['status']; ?>">


                                    Alterar Status

                                </a>
                            </td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </tbody>
    </nav>

</body>
<script>
    // Atribuindo uma variavel para o form
    var tr_principal = document.getElementById('ocult_div');

    //ao clicar no submit
    document.getElementById('form_search').addEventListener('submit', function(event) {
        event.preventDefault(); // Previne o envio padrão do formulário
        url = 'exibe_pesquisa.php';
        // Captura os valores dos campos de entrada
        var busca = document.getElementById('search_input').value;
        var tabela_id = document.getElementById('tabela_principal')

        if (busca == '') {
            var alert_vazio = document.getElementById('campo_vazio')
            alert_vazio.classList.remove('invisible');

        } else {

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

            function mostrarPorAlgunsSegundos() {
                // Remover a classe 'invisible'
                document.getElementById('alert_search').classList.remove('invisible');

                // Definir um tempo (em milissegundos) para mostrar a div
                const tempoMostrando = 3000; // 3 segundos
                const tempoReload = 3200;

                if (busca == '') {
                    setTimeout(function() {

                        document.getElementById('campo_vazio').classList.add('invisible');
                    }, tempoMostrando);
                    setTimeout(function() {
                        window.location.reload();
                    }, tempoMostrando);

                }
                setTimeout(function() {

                    document.getElementById('alert_search').classList.add('invisible');
                }, tempoMostrando);

                setTimeout(function() {
                    window.location.reload();
                }, tempoReload);
            }

            async function response() {


                const res = await fetch(url, requestOptions)


                const data = await res.json();


                arrayDeDados = Object.values(data);


                if (res.ok) {
                    console.log('Promise resolved and HTTP status is successful');
                    // ...do something with the response
                } else {
                    // Custom message for failed HTTP codes

                    if (res.status === 404) mostrarPorAlgunsSegundos();
                    if (res.status === 500) throw new Error('500, internal server error');
                    // For any other server error

                }

                var minhaDiv = document.getElementById("tabela_search_and_all");
                var botaoExistente_reset = document.getElementById('BtnReset');
                var botaoExistente_status = document.getElementById('BtnDelete');

                minhaDiv.innerHTML = "";


                for (i = 0; i < arrayDeDados.length; i++) {
                    result_id = arrayDeDados[i]['id'].toString();
                    result_name = arrayDeDados[i]['usuario'].toString();
                    result_email = arrayDeDados[i]['email'].toString();
                    result_senha = arrayDeDados[i]['senha'].toString();
                    result_status = arrayDeDados[i]['status'].toString();
                }
                var tbody = document.getElementById("tbody_new");
                var novatbody = document.createElement("tbody");
                var novaLinha = document.createElement("tr");
                var colunaNome = document.createElement("td");
                var colunaId = document.createElement("td");



                colunaId.textContent = result_id;
                novaLinha.appendChild(colunaId);

                colunaNome.textContent = result_name;
                novaLinha.appendChild(colunaNome);


                //adicionando as classes para alinhar a pesquisa corretamente
                minhaDiv.classList.add("text-white");
                minhaDiv.classList.add("p-2");
                minhaDiv.classList.add("gap-12");
                minhaDiv.classList.add("mt-4");
                minhaDiv.classList.add("w-screen");

                //alinhando Btns
                botaoExistente_reset.classList.add("w-5");
                botaoExistente_status.classList.add("w-5");

                //criando os elentos e adicionando ao final os botões existentes
                var colunaEmail = document.createElement("td");
                colunaEmail.textContent = result_email;
                novaLinha.appendChild(colunaEmail);

                var colunaSenha = document.createElement("th");
                colunaSenha.textContent = result_senha;
                novaLinha.appendChild(colunaSenha);

                var colunaStatus = document.createElement("td");
                colunaStatus.textContent = result_status;
                novaLinha.appendChild(colunaStatus);
                // Adiciona o botão clonado à div dinâmica


                var colunaBtn01 = document.createElement("td");
                var colunaBtn02 = document.createElement("td");

                minhaDiv.appendChild(novaLinha);


                novaLinha.classList.add("h-20");

                novaLinha.classList.add("bg-stone-900");
                novaLinha.classList.add("ml-4");
                botaoExistente_status.classList.add("mx-2");
                botaoExistente_reset.classList.add("mx-2");

                novaLinha.appendChild(colunaBtn01);

                colunaBtn01.appendChild(botaoExistente_status);
                colunaBtn01.appendChild(botaoExistente_reset);



            }



            response();


        }

    });
</script>

</html>
