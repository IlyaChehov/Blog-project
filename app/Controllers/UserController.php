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

        $userData = $model->getAttribute();
        $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);
        $model->setAttribute($userData);

        if (!$model->save()) {
            session()->set('formErrors', $model->getErrors());
            session()->set('formValue', $model->getAttribute());
            session()->setFlash('error', 'Произошла ошибка, попробуйте позже.');
            response()->redirect('/register');
        }

        session()->setFlash('success', 'Вы успешно зарегистрировались.');
        response()->redirect('/login');
    }
}