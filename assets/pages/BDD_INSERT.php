<?php
include('connection_temp.php');
require("../fipeIN/vendor/autoload.php");

use DeividFortuna\Fipe\FipeCarros;
session_start();

if (isset($_GET["Marca"])) {
    $marcaURL = $_GET["Marca"];
    $modelos = FipeCarros::getModelos($marcaURL);


    if (is_array($modelos) && isset($modelos['modelos'])) {
        $modelos = $modelos['modelos'];
    } else {
        // Defina $modelos como um array vazio ou trate o erro conforme necessário
        $modelos = [];
        echo '<br>';
        echo 'Erro ao obter modelos. Tente novamente mais tarde.';
        echo  '<br>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/var.css">
    <link rel="stylesheet" href="../css/main/main.css">
    <link rel="stylesheet" href="../css/main/header.css">
    <link rel="stylesheet" href="../css/main/footer.css">
    <link rel="stylesheet" href="../css/recomendation.css">
    <link rel="shortcut icon" href="../icons/logo.ico" type="image/x-icon">
    <title>Seu carro ideal</title>

</head>

<body>
    <main>
        <header>

        </header>


        <?php
        foreach ($modelos as $modelo) {
            $years = FipeCarros::getAnos($marcaURL, $modelo['codigo']);
            foreach ($years as $year) {
                if ($year['codigo'] >=   2019) {
                    echo $modelo['nome'] . '<br>';
                    $codModelo = $modelo['codigo'];
            $codAno = $year['codigo'];
            $nomeModelo = $modelo['nome'];

            $sql_code = "INSERT INTO carros(codigoModelo, nome, ano, codigoMarca) 
            VALUES ($codModelo, '$nomeModelo', $codAno, $marcaURL)";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
$quantidade = $sql_query->num_rows;
                }else
                echo 'Not inserted, year smaller than 2019';
            }
            
        }
        ?>


</body>

</html> 