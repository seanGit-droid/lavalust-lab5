<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthMiddleware
{
    public function handle($next)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $isLoggedIn = (!empty($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) || !empty($_SESSION['user_id']);

        if (!$isLoggedIn) {
            $_SESSION['error'] = 'Please log in to access this page.';
            $_SESSION['auth_error'] = 'Please log in to access this page.';
            redirect('login');
            exit;
        }

        return $next();
    }
}
