<?php

namespace Kazuha\Phphelp\Auth;

use Kazuha\Phphelp\Config\DB;
use PDO;

class Auth {
    public static function login(string $email, string $senha): bool {
        $pdo = DB::connect();
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($senha, $user['senha'])) {
            $_SESSION['user'] = $user;
            return true;
        }

        return false;
    }

    public static function register(string $nome, string $email, string $senha): bool {
        $pdo = DB::connect();
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        return $stmt->execute([$nome, $email, password_hash($senha, PASSWORD_BCRYPT)]);
    }

    public static function logout() {
        session_destroy();
    }

    public static function check(): bool {
        return isset($_SESSION['user']);
    }

    public static function user() {
        return $_SESSION['user'] ?? null;
    }
}
