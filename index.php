<?php

declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: adamveres
 * Date: 24.07.2018
 * Time: 11:46
 */

//DO NOT TOUCH

$Runner = function (string $myString)
{
    echo "Hello there". $myString;
};

function IDoManyThings(callable $Runner){
    $names = [1, 2, 3];
    foreach ($names as $name){
        $Runner($name);
        $Runner($name);
        $Runner($name);
    }
}

IDoManyThings(function (string $string){
    echo "Salut" . $string;
});
