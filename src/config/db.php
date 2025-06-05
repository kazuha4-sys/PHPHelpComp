<?php

namespace Kazuha\Phphelp\config;

use PDO;
use PDOException;

class DB {
    
    /*
    // Conexão e configuração do database

    // Para fazer a conexão com o database SQL, vc pode 
    // fazer pelo método da variável ou pelo método da constante,,
    // os dois vão dar o mesmo resultado 

    // VARIAVEL
    // $localhost = "localhost"; // ou 127.0.0.1
    // $user = "root"; // Mude 'root' para o usuário que vc colocou 
    // $password = ""; // Caso você tenha uma senha
    // $database = "teste" // Mude 'teste' para o nome da sua database criada no SQL
    */

    // CONSTANTE
    const DB_HOST = 'localhost'; // Altere se necessário
    const DB_USER = 'root'; // Altere se necessário
    const DB_DATABASE = 'teste'; // Altere para o nome do seu banco de dados
    const DB_PASS = ''; // Altere se for usar senha 

    // Opções para maior segurança
    private static array $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Ativa exceções para erros
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Define fetch padrão como array associativo
        PDO::ATTR_EMULATE_PREPARES => false, // Desativa emulação de prepares pra evitar SQL Injection
        PDO::ATTR_PERSISTENT => true, // Conexão persistente pra melhorar performance
    ];

    /*
    // Se você for pelo método da variável, troque 'DB_HOST', 'DB_DATABASE', 'DB_USER' e 'DB_PASS' por as variáveis 
    // '$localhost', '$user', '$database' e '$password'.
    */

    public static function connect(): PDO {
        try {
            $pdo = new PDO(
                "mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_DATABASE . ";charset=utf8mb4",
                self::DB_USER,
                self::DB_PASS,
                self::$options
            );
            return $pdo;
        } catch (PDOException $e) {
            // Loga o erro mas não mostra pro usuário por segurança
            error_log("Erro na conexão com o banco de dados: " . $e->getMessage());
            die("Erro interno. Tente novamente mais tarde."); // Mensagem genérica pra segurança
        }
    }
}
