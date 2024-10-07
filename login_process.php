<?php
include('assets/pages_connected/connection.php');
if (!isset($_SESSION)) {
    session_start();
}
if (!empty($_POST['email']) && !empty($_POST['senha'])) {

    $email = $userDATA->real_escape_string($_POST['email']);
    $senha = $userDATA->real_escape_string($_POST['senha']);

    $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $sql_query = $userDATA->query($sql_code) or die("Falha na execução do código SQL: " . $userDATA->error);

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

        header("Location: /GearTech/index.php?error=log");

    }

}
else {

    header("Location: /GearTech/index.php?errorempty=empty");

}

?>