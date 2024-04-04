<?php
header("Acess-Control-Allow-Origin: *");

include_once('connection.php');
connectionDb();

//Tratando os dados enviados pelo front
$inputData = $_POST['search_input'];


 $response[] = valida_search_input($inputData);

 $json_response = json_encode($response);

 echo $json_response;

 exit;



// $trimmed_input = (string) trim($input_pesquisa);

// $return_to_front = valida_search_input($trimmed_input);


// header('Content-Type: application/json');






// //todo tratativas do input, verificar tipo string, forçar tipo string, trim os spaces,

// //Todo  formatar antes do encode,
// var_dump($retorno_search);

// return json_encode($retorno_search);

// exit;

function valida_search_input($inputData)
{
    if (!empty($inputData)) {

        $sql = "SELECT * FROM `usuario` WHERE usuario LIKE '%$inputData%'";
        $resultado = mysql_query($sql);

        if (mysql_num_rows($resultado) > 0) {
            while ($row = mysql_fetch_assoc($resultado)) {

                return $row;
            }
        } else {
            return  $resultado;
        }
    }
}
