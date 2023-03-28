<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Validator;
use App\Exceptions\RouteNotFoundException;
use App\Models\LoginUsers;

class LoginController
{
    public function loginView()
    {
        return (new View('home/login'))->make();
    }

    public function login()
    {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = (new LoginUsers())->getQueryResults(
            "SELECT id FROM users WHERE email = ? AND password = ?",
            $email, $password
        );

        $username = (new LoginUsers())->getQueryResults(
            "SELECT username FROM users WHERE email = ? AND password = ?",
            $email, $password
        );

        if ($user) {
            $_SESSION['user_id'] = $user[0]['id'];
            $_SESSION['username'] = $username[0]['username'];

        //    echo '<pre>';
        //    var_dump($_SESSION['user_id']);
        //    echo '<pre>';

            // Redirect the user to the homepage or another protected page
            header('Location: /');
            exit();
        } else {
            // Invalid credentials, so show an error message to the user
            return (new View('home/login', ['error' => 'Invalid email or password']))->make();
        }

    }

}