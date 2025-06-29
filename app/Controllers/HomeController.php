<?php

namespace App\Controllers;

class HomeController
{
    public function index(): void
    {
        view()->render('home/index', ['pageTitle' => 'Главная страница']);
    }
}