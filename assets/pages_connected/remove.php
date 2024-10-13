<?php 
include('connection.php');
include('connection_favorite.php');
session_start();

if (isset($_GET['Marca'], $_GET['Modelo'], $_GET['Ano'], $_GET['CodModelo'], $_GET['codAno'])) {
    $Marca = $_GET['Marca'];
    $Modelo = $_GET['Modelo'];
    $Ano = $_GET['Ano'];
    $CodModelo = $_GET['CodModelo'];
    $codAno = $_GET['codAno'];

$UnfavDelete = "DELETE FROM favorites WHERE idfavorite = $Modelo";
    $sql_query = $favoriteDATA->query($UnfavDelete);

    header("Location: connected_filtered_catalog.php?Marca=' $Marca'&msg=Remov");


}



?>