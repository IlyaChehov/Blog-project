<?php

function dump(mixed $data): void
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

/**
 * @template T
 * @param class-string<T> $key
 * @return T
 * @throws Exception
 */
function container(string $key): object
{
    return \Core\ServiceContainer\ServiceContainer::getContainer()->getServices($key);
}