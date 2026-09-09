<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$database['default'] = array(
    'hostname' => 'mysql-2cc8c2cd-lavalustproject-1112.b.aivencloud.com',
    'username' => 'avnadmin',
    'password' => 'AVNS_86pO-PmnQzQCygKzmzt',
    'database' => 'defaultdb',
    'port'     => 20551,
    'driver'   => 'mysql',
    'charset'  => 'utf8',
    'collate'  => 'utf8_general_ci',
    'prefix'   => '',
);

$database['main'] = &$database['default'];