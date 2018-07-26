<?php
/**
 * Created by PhpStorm.
 * User: adamveres
 * Date: 24.07.2018
 * Time: 17:07
 */

/**
 * Selects all the data that the user indicated through the (<,>,<>,=)
 * separators, and returns the array containing only the needed values
 * NOTE: '<>' === NOT
 * @param string $where
 * @param array $ogArray
 * @return array
 */
function whereImplementation(string $where, array $ogArray) : array {
    $returnArray = [];
    preg_match('/^(\w+)(=|<|>|<>)(\w+)$/', $where, $where);
    $colToSearch = array_column($ogArray, $where[1]);
    foreach ($colToSearch as $key => $colValue){
        if ($where[2] === '=') {
            if ($colValue === $where[3]) {
                $returnArray[] = $ogArray[$key];
            }
        } elseif ($where[2] === '<') {
            if ($colValue < $where[3]) {
                $returnArray[] = $ogArray[$key];
            }
        } elseif ($where[2] === '>') {
            if ($colValue > $where[3]) {
                $returnArray[] = $ogArray[$key];
            }
        } elseif ($where[2] === '<>') {
            if ($colValue !== $where[3]) {
                $returnArray[] = $ogArray[$key];
            }
        }
    }
    return $returnArray;
}