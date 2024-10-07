<?php 
include('connection_favorite.php'); // Certifique-se de que este arquivo contém a conexão

if (isset($_POST['marca'])) {
    $marca = $_POST['marca'];
    
    // Consulta ao banco de dados para buscar modelos da marca
    $query = "SELECT favoriteNAME FROM favorites WHERE nomeMarca = ?";
    
    // Prepare a declaração
    $stmt = $favoriteDATA->prepare($query);
    
    // Bind dos parâmetros
    $stmt->bind_param("s", $marca); // "s" indica que estamos passando uma string
    $stmt->execute();
    
    // Obtendo o resultado
    $result = $stmt->get_result();
    $modelos = $result->fetch_all(MYSQLI_ASSOC);

    // Inicia as opções de modelo
    
    if ($modelos) {
        foreach ($modelos as $modelo) {
            // Escape special characters to avoid HTML issues
            echo '<option value="' . htmlspecialchars($modelo['favoriteNAME']) . '">' . htmlspecialchars($modelo['favoriteNAME']) . '</option>';
        }
    } else {
        // Caso nenhum modelo seja encontrado
        echo '<option value="">Nenhum modelo disponível</option>';
    }
    
    // Fechar a declaração
    $stmt->close();
}
?>
