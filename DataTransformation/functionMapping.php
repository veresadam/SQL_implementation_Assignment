<?php
/**
 * Created by PhpStorm.
 * User: adamveres
 * Date: 25.07.2018
 * Time: 17:27
 */

/**
 * Includes the function that is found in the $functionName.php and applies
 * it on the column specified by the user in the data array
 *
 * @param $functionName
 * @param $column
 * @param $originalArray
 *
 * @return array
 */
function functionMapping($functionName, $column, $originalArray) {
    require_once "$functionName.php";

    return array_map(function ($row) use ($column, $functionName){
        $row[$column] = $functionName($row[$column]);
        return $row;
    }, $originalArray);
}
