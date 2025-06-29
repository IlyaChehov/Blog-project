<?php

namespace App\Controllers;

class PostController
{
    public function show(array $params): string
    {
        extract($params);
        return "post: {$slug}";
    }
}