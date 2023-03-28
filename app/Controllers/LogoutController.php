<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Validator;
use App\Exceptions\RouteNotFoundException;

class LogoutController
{
    public function logout()
    {
        if (isset($_POST)) {
            session_destroy();
            header('Location: /');
            exit;
        }
    }

}