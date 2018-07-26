<?php
/**
 * Created by PhpStorm.
 * User: adamveres
 * Date: 25.07.2018
 * Time: 18:55
 */

/**
 * Sorts the columns in ascending or descending order (purely cosmetic)
 *
 * @param $direction
 * @param $originalArray
 *
 * @return array
 */

function columnSorting($direction, $originalArray) {
    $newArray = [];
    foreach ($originalArray as $row) {
        if ($direction === 'desc') {
            krsort($row);
        } else {
            ksort($row);
        }
        $newArray[] = $row;
    }
    return $newArray;
}