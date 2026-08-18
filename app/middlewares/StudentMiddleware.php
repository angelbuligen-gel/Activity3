    <?php

    defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

    class StudentMiddleware
    {
        public function handle(Closure $next)
        {
           if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
            if (!isset($_SESSION['student_access']) || $_SESSION['student_access'] !== true) {
                echo "You can't access this page.";
                exit;
            }
            return $next();
        }
    }
