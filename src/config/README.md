* Para uso



``` php

use Kazuha4sys\Config\DB;

$pdo = DB::connect();

$stmt = $pdo->prepare('SELECT * FROM usuarios');
$stmt->execute();
$usuarios = $stmt->fetchAll();

print_r($usuarios);
```
