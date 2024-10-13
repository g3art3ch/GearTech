<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    // Verifica se o HTTP_REFERER está disponível
    if (isset($_SERVER['HTTP_REFERER'])) {
        $referer = $_SERVER['HTTP_REFERER'];
    } else {
        // Se não houver HTTP_REFERER, redireciona para uma página padrão (ou onde achar melhor)
        $referer = '/GearTech/assets/pages_connected/connected.php';
    }

    // Redireciona para a página de origem com o erro
    header("Location: $referer?error=Unco");
    exit();
}
