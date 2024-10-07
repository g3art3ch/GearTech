<?php
include('connection_favorite.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $marca = $_POST['marca'];

    // Consulta para buscar os modelos correspondentes à marca selecionada
    $sql = "SELECT DISTINCT modelo FROM favorites WHERE nomeMarca = ?";
    $stmt = $favoriteDATA->prepare($sql);
    $stmt->bind_param("s", $marca);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cria um array para armazenar os modelos
    $modelos = array();
    while ($row = $result->fetch_assoc()) {
        $modelos[] = $row['modelo'];
    }

    // Retorna os modelos em formato JSON
    echo json_encode($modelos);
}
?>
