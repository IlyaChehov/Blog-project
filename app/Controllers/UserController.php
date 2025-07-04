<?php

namespace App\Controllers;

use App\Models\Post;
use App\Models\User;

class UserController
{
    public function register(): void
    {
        view()->render('user/register', ['pageTitle' => 'Регистрация']);
    }

    public function store(): void
    {
        $data = request()->getData(['name', 'email', 'password', 'confirmPassword']);
        $model = new User($data);
        if ($model->validate()) {
            session()->set('formErrors', $model->getErrors());
            session()->set('formValue', $model->getAttribute());
            session()->setFlash('error', 'Введите корректные данные.');
            response()->redirect('/register');
        }
    }
}