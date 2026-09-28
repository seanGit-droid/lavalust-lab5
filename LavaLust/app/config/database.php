<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

// Attempt to load environment variables from .env if present
$env_paths = [
    defined('ROOT_DIR') ? ROOT_DIR . '.env' : null,
    dirname(APP_DIR) . '/.env',
    dirname(dirname(APP_DIR)) . '/.env'
];

foreach ($env_paths as $env_file) {
    if ($env_file && file_exists($env_file)) {
        foreach (file($env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
            $line = trim($line);
            if ($line === '' || strpos($line, '#') === 0) continue;
            if (strpos($line, '=') !== false) {
                list($key, $val) = explode('=', $line, 2);
                $key = trim($key);
                $val = trim($val, " \t\n\r\0\x0B\"'");
                if (!getenv($key)) {
                    putenv("{$key}={$val}");
                    $_ENV[$key] = $val;
                }
            }
        }
    }
}

// Sean's database server
$sean_ip   = '139.59.68.82';
$sean_port = 20551;
$sean_user = 'avnadmin';
$sean_pass = base64_decode('QVZOU184NnBPLVBtblF6UUN5Z0t6bXp0');
$sean_db   = 'mydb';

$host     = getenv('DB_HOST') ?: $sean_ip;
$port     = getenv('DB_PORT') ?: $sean_port;
$username = getenv('DB_USERNAME') ?: (getenv('DB_USER') ?: $sean_user);
$password = getenv('DB_PASSWORD') ?: '';
$dbname   = getenv('DB_NAME') ?: (getenv('DB_DATABASE') ?: $sean_db);
$driver   = getenv('DB_DRIVER') ?: 'mysql';

// If hostname has DNS resolution failure (like mysql-2cc8c2cd on Render), use direct IP
$is_dns_failing = (strpos($host, 'mysql-2cc8c2cd') !== false) || (!filter_var($host, FILTER_VALIDATE_IP) && gethostbyname($host) === $host);

if ($is_dns_failing || empty($password) || strpos($password, 'your_password') !== false) {
    $host     = $sean_ip;
    $port     = $sean_port;
    $username = $sean_user;
    $password = $sean_pass;
    $dbname   = $sean_db;
}

$database['main'] = array(
    'driver'	=> $driver,
    'hostname'	=> $host,
    'port'		=> (int)$port,
    'username'	=> $username,
    'password'	=> $password,
    'database'	=> $dbname,
    'charset'	=> 'utf8mb4',
    'dbprefix'	=> '',
    'path'      => ''
);

$database['default'] = &$database['main'];