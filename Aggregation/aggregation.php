<?php
/**
 * Created by PhpStorm.
 * User: adamveres
 * Date: 25.07.2018
 * Time: 17:47
 */

/**
 * The aggregation calls will do the desired calculations/actions that are
 * requested by the user and will add a new column to the end of the first
 * element of the data array, removing all other rows
 *
 * @param string $column
 * @param array $originalArray
 *
 * @return array
 */

function sumAggregation(string $column, array $originalArray) : array {
    $columnArray = array_column($originalArray, $column);
    $sum = 0;
    foreach ($columnArray as $col){

        $sum += (int)$col;
    }
    $originalArray[0]['sum'] =  $sum;
    $newArray[] = $originalArray[0];

    return $newArray;
}

/**
 * @param string $column
 * @param array $originalArray
 *
 * @return array
 */

function productAggregation(string $column, array $originalArray) : array {
    $columnArray = array_column($originalArray, $column);
    $product = 1;
    foreach ($columnArray as $col){

        $product *= (int)$col;
    }
    $originalArray[0]['product'] =  $product;
    $newArray[] = $originalArray[0];

    return $newArray;
}

/**
 * @param string $column
 * @param string $glue
 * @param array $originalArray
 *
 * @return array
 */

function glueingAggregation(string $column, string $glue, array $originalArray) : array {
    $columnArray = array_column($originalArray, $column);

    $originalArray[0]["glued"] = implode($glue, $columnArray);
    $newArray[] = $originalArray[0];

    return $newArray;
}
