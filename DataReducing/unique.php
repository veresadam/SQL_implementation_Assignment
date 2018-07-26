<?php
/**
 * Created by PhpStorm.
 * User: adamveres
 * Date: 24.07.2018
 * Time: 14:29
 */

/**
 * Removes every duplicate of an already occurred column element
 * and returns the modified array
 * @param string $column
 * @param array $rows
 * @return array
 */
function uniqueRow(string $column, array $rows) : array {
    $returnArray = [];
    $columnToModify = array_column($rows, $column);
    $columnToModify = array_unique($columnToModify);
    foreach ($columnToModify as $key => $params) {
        $returnArray[] = $rows[$key];
    }
    return $returnArray;
}