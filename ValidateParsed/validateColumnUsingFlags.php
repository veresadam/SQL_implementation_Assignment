<?php
/**
 * Created by PhpStorm.
 * User: adamveres
 * Date: 24.07.2018
 * Time: 09:31
 * @param $input
 * @param $tableArrayRow
 * @return string
 */

/**
 * A big-ass function that goes over every possible flag option and
 * checks every defined option for errors. Similar to the prior validator,
 * this one also returns an imploded array containing all the error messages
 *
 * @param $input
 * @param $tableArrayRow
 *
 * @return string
 */
function validateColumnUsingFlags(array $input, array $tableArrayRow) : string {
    $errorMsg = [];

//    $selectInput = $input[SELECT] ?? null;

    if (isset($input[SELECT])) {
        $errorMsg[] = checkSelectColumns($input[SELECT] ?? null, $tableArrayRow, SELECT);
    }
    if (isset($input[SORT_COL])) {
        $errorMsg[] = checkIfColumnExists($input[SORT_COL], $tableArrayRow, SORT_COL);
    }
    if (isset($input[MULTI_SORT])) {
        $errorMsg[] = checkSelectColumns($input[MULTI_SORT], $tableArrayRow, MULTI_SORT);
    }
    if (isset($input[UNIQUE])) {
        $errorMsg[] = checkIfColumnExists($input[UNIQUE], $tableArrayRow, UNIQUE);
    }
    if (isset($input[WHERE])) {
        $errorMsg[] = checkWhereColumn($input[WHERE], $tableArrayRow, WHERE);
    }
    if (isset($input[SUM])) {
        $errorMsg[] = checkIfColumnExists($input[SUM], $tableArrayRow, SUM);
    }
    if (isset($input[AGGREGATE_PRODUCT])) {
        $errorMsg[] = checkIfColumnExists($input[AGGREGATE_PRODUCT], $tableArrayRow, AGGREGATE_PRODUCT);
    }
    if (isset($input[AGGREGATE_LIST])) {
        $errorMsg[] = checkIfColumnExists($input[AGGREGATE_LIST], $tableArrayRow, AGGREGATE_LIST);
    }
    if (isset($input[UPPER])) {
        $errorMsg[] = checkIfColumnExists($input[UPPER], $tableArrayRow, UPPER);
    }
    if (isset($input[LOWER])) {
        $errorMsg[] = checkIfColumnExists($input[LOWER], $tableArrayRow, LOWER);
    }
    if (isset($input[TITLECASE])) {
        $errorMsg[] = checkIfColumnExists($input[TITLECASE], $tableArrayRow, TITLECASE);
    }
    if (isset($input[POWER])) {
        $errorMsg[] = checkIfColumnExists(explode(' ', $input[POWER])[0], $tableArrayRow, POWER);
    }
    if (isset($input[MAP_FUNCT_COL])) {
        $errorMsg[] = checkIfColumnExists($input[MAP_FUNCT_COL], $tableArrayRow, MAP_FUNCT_COL);
    }
    $errorMsg = array_filter($errorMsg);
    return implode("\n", $errorMsg);
}