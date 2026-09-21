<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Middlewares Configuration
 */
$config['middlewares'] = [
    'AuthMiddleware'    => load_class('AuthMiddleware', 'middlewares'),
    'auth'              => load_class('AuthMiddleware', 'middlewares'),
    'StudentMiddleware' => load_class('StudentMiddleware', 'middlewares'),
    'student'           => load_class('StudentMiddleware', 'middlewares'),
];
