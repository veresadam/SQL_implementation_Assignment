<?php
/**
 * Created by PhpStorm.
 * User: veres
 * Date: 7/25/2018
 * Time: 10:50 PM
 */

/**
 * Returns an array with the data array's contents with only the specified
 * column values
 *
 * @param array $originalArray
 * @param string $select
 *
 * @return array
 */

function selectColumns(array $originalArray, string $select) : array {
    $columnsArray = explode(',', $select);
    $returnArray = [];
    $i = 0;
    foreach ($originalArray as $index => $personData) {
        foreach ($originalArray[$index] as $col => $val) {
            if (in_array($col, $columnsArray)) {
                $returnArray[$i][$col] = $val;
            }
        }
        $i++;
    }
    return $returnArray;
}
