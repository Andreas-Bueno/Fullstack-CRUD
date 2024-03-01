<?php
include_once('connection.php');
include_once('../estudos/actions/valida_login.php');
session_start();
connectionDb();
 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
</head>
<body>
    <form action="actions/action_create_user.php" method="post">
        <label for="name_create">Nome</label>
        <input type="name" name="name_create" id="name_create" required>

        <label for="email_create">E-mail</label>
        <input type="email" name="email_create" id="email_create" required>

        <button type="submit">Cadastrar</button>
    </form>

</body>
</html>
