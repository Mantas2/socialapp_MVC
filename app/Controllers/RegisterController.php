<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Validator;
use App\Exceptions\RouteNotFoundException;
use App\Models\RegisterUsers;

class RegisterController
{
    protected Validator $validator;

    public function __construct()
    {
        $this->validator = new Validator();
    }

    public function registerView()
    {
        return (new View('home/register'))->make();
    }

    public function validation()
    {
        $badEmail = $this->validator->checkEmail($_POST['email']);
        $badPass = $this->validator->checkPassword($_POST['password']);
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];

        if (!empty($badPass) || !empty($badForm) || !empty($badEmail)) {
            // Render the register page with error message
            return (new View('home/register', ['badPass' => $badPass, 'badEmail' => $badEmail]))->make();
        }

        $user = (new RegisterUsers())->getQueryResults("SELECT * FROM users WHERE email = :email", $email);

        if ($user) {
            return (new View('home/register', ['error' => 'A user with such email aready exists']))->make();
        } else {
            (new RegisterUsers())->putUsersQuery("INSERT INTO users (username, email, password)
            VALUES (:username, :email, :password)", $username, $email, $password);

        }
        

        header('Location: /');
        exit();

    }

}