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