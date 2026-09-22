<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthMiddleware
{
    public function handle(Closure $next)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
<<<<<<< HEAD
=======
            $_SESSION['error'] = 'Please log in to access this page.';
>>>>>>> 08eae6d04971826e8153e702e6c1c05b634b5a87
            redirect('login');
            exit();
        }

        return $next();
    }
}
