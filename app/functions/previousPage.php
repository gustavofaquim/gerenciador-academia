<?php
if (isset($_SERVER['HTTP_REFERER'])) {
    $previousPage = $_SERVER['HTTP_REFERER'];
} else {
    $previousPage = '../'; // Página padrão caso não haja referência anterior
}

if (isset($_POST['redirect'])) {
    header("Location: $previousPage");
    exit;
}
