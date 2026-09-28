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

// Active working database for Sean
$active_host = 'mysql-1ae50f6f-lavalustproject1.c.aivencloud.com';
$active_port = 21503;
$active_user = 'avnadmin';
$active_pass = base64_decode('QVZOU19QSUU0ZnQ1bkw2VWtvRHRIZHFn');
$active_db   = 'mydb';

$host     = getenv('DB_HOST') ?: $active_host;
$port     = getenv('DB_PORT') ?: $active_port;
$username = getenv('DB_USERNAME') ?: (getenv('DB_USER') ?: $active_user);
$password = getenv('DB_PASSWORD') ?: '';
$dbname   = getenv('DB_NAME') ?: (getenv('DB_DATABASE') ?: $active_db);
$driver   = getenv('DB_DRIVER') ?: 'mysql';

// Detect expired old host (e.g. Render env still pointing to old demo host), unresolvable host, or placeholder passwords
$is_expired_host = (strpos($host, 'mysql-2cc8c2cd') !== false || strpos($host, 'anonuevo') !== false);
$is_unresolvable = !filter_var($host, FILTER_VALIDATE_IP) && (gethostbyname($host) === $host);

if ($is_expired_host || $is_unresolvable || empty($password) || strpos($password, 'your_password') !== false) {
    $host     = $active_host;
    $port     = $active_port;
    $username = $active_user;
    $password = $active_pass;
    $dbname   = $active_db;
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