<?php 


function requireAuth() {
    if (!isset($_SESSION['user'])) {
        header('Location: user/login');
        exit;
    }
}
