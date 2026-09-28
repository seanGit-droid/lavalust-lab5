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
$env_pass = getenv('DB_PASSWORD');
if (!empty($env_pass) && strpos($env_pass, 'your_password') === false) {
    $password = $env_pass;
} else {
    $password = base64_decode('QVZOU184WDlEYVNCWGxNNm40N3lSb1hM');
}
$dbname   = getenv('DB_NAME') ?: (getenv('DB_DATABASE') ?: 'mydb');
$driver   = getenv('DB_DRIVER') ?: 'mysql';

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