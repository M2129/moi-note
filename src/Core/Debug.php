<?php

function dump(mixed $data): void
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}

function dd(mixed $data): never
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';

    die();
}
