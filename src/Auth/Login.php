<?php
session_start();

require __DIR__ . '/../../vendor/autoload.php';

use Kazuha\Phphelp\Auth\Auth;

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if (Auth::login($email, $senha)) {
    header("Location: ../Pages/dashboard.php");
    exit;
} else {
    echo "Login inválido!";
}
