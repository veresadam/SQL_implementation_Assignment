<?php
/**
 * Created by PhpStorm.
 * User: adamveres
 * Date: 26.07.2018
 * Time: 09:18
 */

function outputToScreen($arrayToOutput) {
    echo json_encode($arrayToOutput, JSON_PRETTY_PRINT) . PHP_EOL;
}