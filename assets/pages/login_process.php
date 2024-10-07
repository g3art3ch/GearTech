<?php
include('connection.php');
if (!isset($_SESSION)) {
    session_start();
}
if (!empty($_POST['email']) && !empty($_POST['senha'])) {

    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    $quantidade = $sql_query->num_rows;


    if ($quantidade == 1) {
        $usuario = $sql_query->fetch_assoc();

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nomeUsuario'] = $usuario['nomeUsuario'];
        $ckEmail = $_SESSION['email'] = $usuario['email'];
        $ckSENHA = $_SESSION['senha'] = $usuario['senha'];
        $_SESSION['status'] = $usuario['status'];
        if ($_SESSION['status'] == 2) {
            header("Location: /GearTech/assets/pages_connected/connected.php");
        } else {
            echo 'Confirme seu email!';
        }

    } else {

        header("Location: /GearTech/assets/pages/login.php?error=log");

    }

}
else {

    header("Location: /GearTech/assets/pages/login.php?errorempty=empty");

}

?>