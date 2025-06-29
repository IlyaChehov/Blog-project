<?php

namespace App\Controllers;

class UserController
{
    public function register(): void
    {
        view()->render('user/register', ['pageTitle' => 'Регистрация']);
    }

    public function store(): void
    {
        echo 'www';
    }
}