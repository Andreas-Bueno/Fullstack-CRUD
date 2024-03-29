<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanofi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="h-10/12 z-1 bg-gradient-to-r from-neutral-700 to-neutral-400 text-white">
    <div class="flex min-h-screen ">
        <div class="flex flex-1 flex-col justify-center px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">

                <div class="">
                    <img class="h-100 w-auto" src="images/COMPUTER.gif"
                        alt="Your Company">
                    <h2 class="mt-8 text-2xl font-bold leading-9 tracking-tight text-white">Bem vindo!</h2>
                    <p class="mt-2 text-sm leading-6 text-gray-500">


                    </p>
                </div>
                <div class="mt-10 h-10/12 w-full">
                    <div>
                        <form action="actions/valida_login.php" method="POST" class="space-y-6">
                            <div>
                                <label for="email" class="backdrop-blur-sm block font-medium leading-6 text-white">Email</label>
                                <div class="my-4">
                                    <input id="email" name="email" type="email" autocomplete="email" required autofocus
                                        class="font-xl p-1 font-semi-bold text-black border-4 invalid:border-Cyan-500
                                         focus:invalid:border-blue-500 focus:invalid:ring-blue-500 block w-full rounded-md border-0  shadow-sm  ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div >
                                <label for="password"
                                    class="backdrop-blur-sm block  font-medium leading-6 text-white">Senha</label>
                                <div class="my-4">
                                    <input id="password" name="password" type="password" autocomplete="current-password"
                                        required
                                        class="text-black block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            </div>

                            <div>
                                <button type="submit" class="flex w-full justify-center rounded-md bg-pink-950 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-pink-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 mt-12">
                                    Entrar
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="mt-10">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="w-full border-b border-white"></div>
                            </div>
                            <div class="relative flex justify-center text-sm font-medium leading-6">

                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-2 gap-2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative hidden w-0 flex-1 sm:block">
            <img class="absolute inset-0 h-full w-full object-cover"src="images/crud.png"alt="">
        </div>
    </div>
</body>

</html>
