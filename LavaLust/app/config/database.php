<?php
defined('PREVENT_DIRECT_SCRIPT_ACCESS') OR exit('No direct script access allowed');

$database['default'] = array(
    'hostname' => 'mysql-2cc8c2cd-lavalustproject-1112.b.aivencloud.com',
    'username' => 'avnadmin',
    'password' => 'YOUR_AIVEN_PASSWORD_HERE', // Ilagay ang totoong Aiven password mo
    'database' => 'defaultdb',
    'port'     => 20551,
    'driver'   => 'pdo',
    'charset'  => 'utf8',
    'collate'  => 'utf8_general_ci',
    'prefix'   => '',
);

// Fallback for LavaLust core versions looking for 'main' key
$database['main'] = &$database['default'];