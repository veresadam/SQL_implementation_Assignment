<?php
/**
 * Created by PhpStorm.
 * User: adamveres
 * Date: 26.07.2018
 * Time: 08:51
 */

function outputToFile($arrayToOutput, $fileName) {
    $file = fopen($fileName, 'w');
    foreach ($arrayToOutput as $index => $personData){
        $implodedArray[] = implode(',', $personData);
    }
    $contentString = implode("\n", $implodedArray);
    fwrite($file, $contentString);
    fclose($file);
}