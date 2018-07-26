<?php
/**
 * Created by PhpStorm.
 * User: adamveres
 * Date: 23.07.2018
 * Time: 19:14
 */

/**
 * @param string $select
 * @param array $tableArray
 * @param string $flagName
 *
 * @return string
 */

function checkSelectColumns(string $select, array $tableArray, string $flagName) : string {
    $columns = explode(',', $select);
    foreach ($columns as $col){
        if (checkIfColumnExists($col, $tableArray, $flagName) !== ''){
            return "One or more columns provided in the $flagName are not valid";
        }
    }
    return '';
}

/**
 * @param string $column
 * @param array $tableArray
 * @param string $flagName
 *
 * @return string
 */

function checkIfColumnExists(string $column, array $tableArray, string $flagName) : string {
    if (!array_key_exists($column, $tableArray)){
        return "A provided column is not valid at the flag --$flagName\n";
    }
    return '';
}

/**
 * @param string $where
 * @param array $tableArray
 * @param string $flagName
 *
 * @return string
 */

function checkWhereColumn(string $where, array $tableArray, string $flagName) : string {
    preg_match('/\w+(?=<|>|=)/', $where, $colName);
    return checkIfColumnExists($colName[0], $tableArray, $flagName);
}
