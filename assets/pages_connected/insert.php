<?php
include('connection_favorite.php');
include('connection_carsgt.php');
session_start();
$nomeUSER = $_SESSION['nomeUsuario'];

// Verifica se o formulário foi submetido corretamente
if (isset($_POST['FavButton'])) {
    // Acessa os dados do formulário via POST
    $Marca = $_POST['MarcaCarro'];
    $nomeCarro = $_POST['nomeCarro'];
    $Modelo = $_POST['IdModelo'];
    $Ano = $_POST['ano'];
    $CodModelo = $_POST['CodModelo'];
    $CodAno = $_POST['codigoAno'];

    echo "Marca: " . $Marca . "<br>";
    echo "Nome do Carro: " . $nomeCarro . "<br>";
    echo "Modelo (ID): " . $Modelo . "<br>";
    echo "Ano: " . $Ano . "<br>";
    echo "Código do Modelo: " . $CodModelo . "<br>";
    echo "Código do Ano: " . $CodAno . "<br>";
    

} else {
    echo "O formulário não foi submetido corretamente.";
}

// Consulta para obter as especificações do carro
$stmt = $finalDATA->prepare("
    SELECT 
        marca.marca,
        marca.idMarca,
        modelo.nomeCarro,
        modelo.CodModelo,
        modelo.codigoAno,
        modelo.idModelo,
        versao.ano
    FROM 
        marca
    INNER JOIN 
        modelo ON marca.idMarca = modelo.idMarca
    INNER JOIN 
        versao ON modelo.idModelo = versao.idVersao
    WHERE 
        marca.idMarca = ? AND modelo.idModelo = ? AND versao.ano = ?
");

// Prepara e executa a consulta
$stmt->bind_param("iii", $Marca, $Modelo, $Ano); // "iii" significa 3 inteiros
$stmt->execute();
$carSpec = $stmt->get_result();

if ($carSpec->num_rows > 0) {
    while ($final = $carSpec->fetch_assoc()) {
        $nomeCarro = $final['nomeCarro'];
        $MarcaCarro = $final['idMarca'];
        $CodModelo = $final['CodModelo'];
        $codigoAno = $final['codigoAno'];
        $idModelo = $final['idModelo'];
        $CodModelo = $final['CodModelo'];
        $CodAno = $final['codigoAno'];
        $AnoFav = $final['ano'];
        $nomeMarca = $final['marca'];

    }
} else {
    echo "Especificações do carro não encontradas.";
    return; // Para a execução se não houver resultados
}

// Verifica se o carro já foi favoritado
$chkFAV = $favoriteDATA->prepare("SELECT * FROM favorites WHERE favoriteNAME = ?");
$chkFAV->bind_param("s", $nomeCarro); // "s" para string
$chkFAV->execute();
$execCHK = $chkFAV->get_result();
$qtdchk = $execCHK->num_rows;



if ($qtdchk == 0) {
    // Insere o carro nos favoritos
    $FavInsert = $favoriteDATA->prepare("
        INSERT INTO favorites (idfavorite, favoriteNAME, favoriteMARCA, favoriteUSER, CodModelo, CodAno, Ano, nomeMarca) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $FavInsert->bind_param("isssisis", $idModelo, $nomeCarro, $MarcaCarro, $nomeUSER, $CodModelo, $CodAno, $AnoFav, $nomeMarca);
    $FavInsert->execute();

    // var_dump($qtdchk);
    header("Location: connected_car_specification.php?Marca=$MarcaCarro&Modelo=$idModelo&CodModelo=$CodModelo&Ano=$AnoFav&codAno=$CodAno");


} else {
    header("Location: connected_car_specification.php?Marca=$MarcaCarro&Modelo=$idModelo&CodModelo=$CodModelo&Ano=$AnoFav&codAno=$CodAno&insert=yes");

}


?>