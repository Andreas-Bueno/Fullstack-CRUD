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

<body>

    <nav class=" bg-gray-800 text-gray-200 p-10">
        <h1 class="mt-0  text-2xl	font-bold font-medium text-pink-700 text-center">
            Olá, bem-vindo ao Painel Administrativo.
        </h1>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 justify-between">
                <div class="flex">
                    <div class="-ml-2 mr-2 flex items-center md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>


                            <div class="hidden md:ml-6 md:flex md:items-center md:space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <!-- <a href="#" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Dashboard</a> -->
                                <!--  <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Team</a> -->
                                <!--    <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Projects</a> -->
                                <!--    <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Calendar</a> -->
                            </div>
                    </div>
                    <div class="flex items-center bg-red-600">


                    </div>


                    <div x-data="{ open: false}">
                    <button
                    @click="open = ! open"
                     id="btnAddUser" name="btnAddUser" class="bg-pink-500 relative  p-1 text-white-400 hover:text-white focus:outline-none focus:ring-2d focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                    >Cadastrar Usuário
                    </button>

                        <div x-show="open" x-transition>
                            <div class="absolute flex h-60 w-4/12 bg-red-600 z-40 text-black">
                            <form action="functions.php" method="POST" class="flex items-center p-1 gap-2" required>
                                <label for="">Nome</label>
                                <input class="p-1" type="text" id="name_create" name="name_create">

                                <label for="">Email</label>
                                <input class="p-1" id="email_create" name="email_create" type="email" required>

                                <button name="btn_enviar" type="submit" class="text-black font-bold h-1button2 w-10"
                                >Finalizar</button>
                            </form>
                            <!-- pegando os dados do form -->

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
        </div>
        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Dashboard</a>
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Team</a>
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Projects</a>
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Calendar</a>
            </div>
            <div class="border-t border-gray-700 pb-3 pt-4">
                <div class="flex items-center px-5 sm:px-6">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-white">Tom Cook</div>
                        <div class="text-sm font-medium text-gray-400">tom@example.com</div>
                    </div>
                    <button type="button" class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </button>
                </div>
                <div class="mt-3 space-y-1 px-2 sm:px-3">
                    <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your
                        Profile</a>
                    <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
                    <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign
                        out</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        E-mail
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Password
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($exibe_usuarios); $i++) { ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-pink-600 hover:text-gray-900">
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
                        </td>
                        <td class="px-6 py-4">



                            <a id="BtnReset" name="BtnReset" class="bg-pink-600 rounded-md text-gray-900 outline hover:outline-none dark:md:hover:bg-pink-700 px-6 py-4" href="update_senha.php?id=<?= $exibe_usuarios[$i]['id']; ?>&email=<?= $exibe_usuarios[$i]['email']; ?>">


                                Resetar senha

                            </a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
