<?php
session_start();
if (isset($_POST['marca']) && isset($_POST['carCOUNT'])) {
    $marca = $_POST['marca'];
    $carCOUNT = $_POST['carCOUNT'];
    $_SESSION['marcaSelecionada'][$carCOUNT] = $marca;
}
?>
