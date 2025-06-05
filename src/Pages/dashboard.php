<?php

require __DIR__ . '/../../vendor/autoload.php';

use Kazuha\Phphelp\Config\DB;

session_start();

// Aqui você poderia usar alguma verificação de sessão tipo:
// if (!isset($_SESSION['user'])) { header('Location: login.php'); exit; }

echo "🧠 Painel de Usuários Registrados<br><hr>";

try {
    $pdo = DB::connect();

    $stmt = $pdo->query("SELECT id, nome, email, senha FROM usuarios");
    $users = $stmt->fetchAll();

    if (!$users) {
        echo "🚫 Nenhum usuário encontrado.";
    } else {
        echo "<table border='1' cellpadding='8'>";
        echo "<tr><th>ID</th><th>Usuário</th><th>Senha HASH</th><th>Senha PLAIN</th></tr>";

        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>{$user['id']}</td>";
            echo "<td>{$user['username']}</td>";
            echo "<td>{$user['password']}</td>";
            echo "<td>{$user['plain_password']}</td>";
            echo "</tr>";
        }

        echo "</table>";
    }

} catch (Exception $e) {
    echo "❌ Erro ao buscar usuários: " . $e->getMessage();
}
