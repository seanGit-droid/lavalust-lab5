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

$host     = getenv('DB_HOST') ?: 'anonuevo-jollyroyannonuevo.i.aivencloud.com';
$port     = getenv('DB_PORT') ?: 18843;
$username = getenv('DB_USERNAME') ?: (getenv('DB_USER') ?: 'avnadmin');
$password = getenv('DB_PASSWORD') ?: '';
$dbname   = getenv('DB_NAME') ?: (getenv('DB_DATABASE') ?: 'mydb');
$driver   = getenv('DB_DRIVER') ?: 'mysql';

// Active working fallback database configuration
$fallback_host = 'anonuevo-jollyroyannonuevo.i.aivencloud.com';
$fallback_port = 18843;
$fallback_user = 'avnadmin';
$fallback_pass = base64_decode('QVZOU184WDlEYVNCWGxNNm40N3lSb1hM');
$fallback_db   = 'mydb';

// Detect expired host, unresolvable host (Render DNS failure), or placeholder passwords
$is_expired_host = (strpos($host, 'mysql-2cc8c2cd') !== false);
$is_unresolvable = !filter_var($host, FILTER_VALIDATE_IP) && (gethostbyname($host) === $host);

if ($is_expired_host || $is_unresolvable || empty($password) || strpos($password, 'your_password') !== false) {
    $host     = $fallback_host;
    $port     = $fallback_port;
    $username = $fallback_user;
    $password = $fallback_pass;
    $dbname   = $fallback_db;
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