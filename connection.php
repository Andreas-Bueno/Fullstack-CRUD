<?php
function connectionDb(){
    $connection = mysql_connect(
        "db:3306",
        "root",
        "root");
        $showconnection =  mysql_select_db("MeuBancoDeDados", $connection);

        if (!$showconnection) die ("<h1>Connection failed</h1>");
    }
