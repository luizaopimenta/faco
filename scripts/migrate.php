<?php

require __DIR__ . '/../vendor/autoload.php';

function parseEnv($path)
{
    $data = [];
    if (!file_exists($path)) return $data;
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        if (!str_contains($line, '=')) continue;
        [$k, $v] = explode('=', $line, 2);
        $data[trim($k)] = trim($v);
    }
    return $data;
}

$env = parseEnv(__DIR__ . '/../.env');

$dbHost = $env['DB_HOST'] ?? '127.0.0.1';
$dbPort = $env['DB_PORT'] ?? 3306;
$dbName = $env['DB_DATABASE'] ?? 'forge';
$dbUser = $env['DB_USERNAME'] ?? 'forge';
$dbPass = $env['DB_PASSWORD'] ?? '';

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => $dbHost,
    'database' => $dbName,
    'username' => $dbUser,
    'password' => $dbPass,
    'port' => $dbPort,
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

echo "Conectando a {$dbUser}@{$dbHost}:{$dbPort}/{$dbName}\n";

try {
    $schema = $capsule->schema();

    if (!$schema->hasTable('users')) {
        $schema->create('users', function ($table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->timestamps();
        });
        echo "Tabela 'users' criada com sucesso.\n";
    } else {
        echo "Tabela 'users' já existe — nada a fazer.\n";
    }
} catch (Exception $e) {
    echo "Erro ao aplicar migrations: " . $e->getMessage() . "\n";
    exit(1);
}
