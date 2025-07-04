<?php

namespace App\Models;

use Core\Core\Model;

class User extends Model
{
    protected string $table = 'users';
    protected array $fillable = ['name', 'email', 'password'];
    protected array $rulesValidation = [
        'name' => ['required' => true, 'max' => 255, 'min' => 4],
        'email' => ['required' => true, 'email' => true],
        'password' => ['required' => true, 'min' => 6],
        'confirmPassword' => ['match' => 'password']
    ];
}