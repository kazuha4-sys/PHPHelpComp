<?php

// Testar se tem um erro no composer ou no composer.json
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "🚀 Iniciando test.php<br>";

// Carrega o autoload do Composer
require __DIR__ . '/../vendor/autoload.php';

// Usa a classe DB que está no namespace Kazuha\Phphelp\Config
use Kazuha\Phphelp\Config\DB;

try {
    // Tenta conectar
    $pdo = DB::connect();

    // Executa um teste simples pra ver se tá vivo
    $stmt = $pdo->query("SELECT NOW() AS agora");
    $result = $stmt->fetch();

    echo "✅ Conectado com sucesso!<br>🕒 Hora atual no banco: " . $result['agora'];

} catch (Exception $e) {
    // Mostra erro em caso de falha (se chegar aqui, algo deu MUITO ruim)
    echo "❌ Erro ao conectar: " . $e->getMessage();
}
