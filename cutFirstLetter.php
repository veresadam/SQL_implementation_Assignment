<?php
/**
 * Created by PhpStorm.
 * User: adamveres
 * Date: 25.07.2018
 * Time: 18:42
 */

function cutFirstLetter(string $x) : string
{
    return substr($x, 1, strlen($x)-1);
}