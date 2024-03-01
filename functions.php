<?php
function errorMessage()
{
    echo "Falha ao cadastrar";
}

function show_users()
{
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
