<?php
session_start();

require __DIR__ . '/../../vendor/autoload.php';

use Kazuha\Phphelp\Auth\Auth;

$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if (Auth::register($nome, $email, $senha)) {
    header("Location: ../Pages/login.php");
    exit;
} else {
    echo "Erro ao registrar!";
}
