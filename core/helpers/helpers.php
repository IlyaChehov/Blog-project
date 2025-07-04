<?php

use JetBrains\PhpStorm\NoReturn;

function dump(mixed $data): void
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

#[NoReturn] function dumpDie(mixed $data): void
{
    dump($data);
    die;
}

function getLink(string $path): string
{
    return HOST . $path;
}

function a(string $text): string
{
    return htmlspecialchars($text, ENT_QUOTES);
}

function old(string $key): string
{
    return isset($_SESSION['formValue'][$key]) ? a($_SESSION['formValue'][$key]) : '';
}

function showError(string $key): string
{
    $output = '';
    $errors = session()->get('formErrors');
    if (isset($errors[$key])) {
        $output .= '<div class="invalid-feedback d-block"><ul class="list-unstyled">';
        $output .= $errors[$key][0];
        $output .= '</ul></div>';
    }
    return $output;
}

function showAlerts(): void
{
    if (isset($_SESSION['_flash_'])) {
        foreach ($_SESSION['_flash_'] as $k => $v) {
            view()->renderPartial("tpl/{$k}", ["{$k}Message" => \session()->getFlash($k)]);
        }
    }
}