<?php
include('connection.php');
include('connection_favorite.php');
session_start();
$nomeUSER = $_SESSION['nomeUsuario'];




if (isset($_GET['Marca'], $_GET['Modelo'], $_GET['Ano'], $_GET['CodModelo'], $_GET['codAno'])) {
    $Marca = $_GET['Marca'];
    $Modelo = $_GET['Modelo'];
    $Ano = $_GET['Ano'];
    $CodModelo = $_GET['CodModelo'];
    $codAno = $_GET['codAno'];

    $sql_code1 = "SELECT * FROM favorites WHERE favoriteUSER = '$nomeUSER' AND idfavorite = $Modelo";
    $sql_query2 = $favoriteDATA->query($sql_code1);
    $quantidade = $sql_query2->num_rows;

    var_dump($quantidade);

    if($quantidade == 1){
        var_dump($quantidade);

    $UnfavDelete = "DELETE FROM favorites WHERE idfavorite = $Modelo";
    $sql_query = $favoriteDATA->query($UnfavDelete);
    header("Location: connected_filtered_catalog.php?Marca=' $Marca'&msg=Remov");

}
    else{
    header("Location: connected_car_specification.php?Marca=$Marca&Modelo=$Modelo&CodModelo=$CodModelo&Ano=$Ano&codAno=$codAno&alert=inserted");
} 
    


}



?>