<?php

declare(strict_types=1);

namespace App;

class Validator
{

    public function checkEmail(string $email): string
    {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email";
        }

        return "";
    }

    public function checkPassword(string $password): string
    {

        if (strlen($password) < 10) {
            return "The length of the password must be longer than 10 symbols";
        }

        return "";
    }
}