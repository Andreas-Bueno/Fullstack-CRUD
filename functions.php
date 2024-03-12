<?php
function errorMessage()
{
    echo "Falha ao cadastrar";
}

    // if (!empty($_GET['search_input'])) {
    //     $input = $_GET['search_input'];
    //     $sql= "SELECT * FROM usuarios WHERE id LIKE '%$input%' OR nome LIKE '%$input%' OR email LIKE '%$input%' ORDER BY id DESC";

    // } else {
    //     show_users();
    // }

function show_users()
{
    if (!empty($_GET['search_input'])) {
        $input = $_GET['search_input'];
        $sql= "SELECT * FROM `usuario` WHERE usuario LIKE '$input'";
        $resultado = mysql_query($sql);


        if (mysql_num_rows($resultado) > 0) {
            while ($row = mysql_fetch_assoc($resultado)) {
                $array_usuarios[] = $row;
            }
        } else {
            $array_usuarios = [];
        }
        return $array_usuarios;

    } else {

    $sql = "SELECT * FROM usuario;";
    $resultado = mysql_query($sql);

    if (mysql_num_rows($resultado) > 0) {
        while ($row = mysql_fetch_assoc($resultado)) {
            $array_usuarios[] = $row;
        }
    } else {
        $array_usuarios = [];
    }
    return $array_usuarios;
}
}
