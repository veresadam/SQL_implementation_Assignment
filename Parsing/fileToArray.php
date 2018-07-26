<?php
/**
 * Created by PhpStorm.
 * User: adamveres
 * Date: 23.07.2018
 * Time: 17:28
 */

/**
 * Converts the array that contains the lines of the FROM file into
 * a multi-dimensional array that follows the structure
 * [index]=>[dataOne] = [valueOne], ...
 * @param $inputArray
 * @return array
 */
function fileToArray($inputArray){
    $keys = explode(',',$inputArray[0]);
    unset($inputArray[0]);
    $resultArray = [];
    foreach ($inputArray as $rowNum => $row){
        $resultArray[$rowNum] = array_combine($keys,explode(',', $row));
        if ($resultArray[$rowNum] == '') {
            die("Row number $rowNum has an invalid number of arguments!\n");
        }
    }
    return $resultArray;
}