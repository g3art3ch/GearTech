<?php 
include('connection_carsgt.php'); // Certifique-se de que este arquivo contém a conexão

if (isset($_POST['modelo'])) {
    $modelo = $_POST['modelo'];
    
    // Consulta ao banco de dados para buscar anos do modelo
    $query = "SELECT DISTINCT ano FROM favorites WHERE favoriteNAME = ?";
    
    // Prepare a declaração
    $stmt = $favoriteDATA->prepare($query);
    
    // Bind dos parâmetros
    $stmt->bind_param("s", $modelo); // "s" indica que estamos passando uma string
    $stmt->execute();
    
    // Obtendo o resultado
    $result = $stmt->get_result();
    $anos = $result->fetch_all(MYSQLI_ASSOC);

    // Gera as opções de ano
    echo '<option value="">Selecione um ano</option>';
    
    if ($anos) {
        foreach ($anos as $ano) {
            echo '<option value="' . htmlspecialchars($ano['ano']) . '">' . htmlspecialchars($ano['ano']) . '</option>';
        }
    } else {
        // Caso nenhum ano seja encontrado
        echo '<option value="">Nenhum ano disponível</option>';
    }
    
    // Fechar a declaração
    $stmt->close();
}
?>
