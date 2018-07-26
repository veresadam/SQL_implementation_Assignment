#! /usr/bin/env php
<?php
declare(strict_types=1);
require_once "constants.php";
require_once "Input/getopts.php";
require_once "ValidateInput/validateInput.php";
require_once "Parsing/fileToArray.php";
require_once "ValidateParsed/validateTableData.php";
require_once "ValidateParsed/validateColumnUsingFlags.php";
require_once "DataReducing/unique.php";
require_once "DataReducing/where.php";
require_once "DataTransformation/cases.php";
require_once "DataTransformation/sorting.php";
require_once "DataTransformation/functionMapping.php";
require_once "Aggregation/aggregation.php";
require_once "OutputComputation/sortColumns.php";
require_once "OutputComputation/select.php";
require_once "Output/outputToFile.php";
require_once "Output/outputToScreen.php";

/**
 * Created by PhpStorm.
 * User: adamveres
 * Date: 21.07.2018
 * Time: 17:24
 */

/**
 * the Main function that calls all the functions that are designed for
 * processing the data given by the user
 */

function mainFunction(){
    $input = getInput();
    if (($errors = validateInput($input))) {

        die($errors);
    }
    $tableArray = file($input[FROM], FILE_IGNORE_NEW_LINES);
    $tableArray = fileToArray($tableArray);
    $tableArray = array_values($tableArray);
    if (($errors = validateColumnUsingFlags($input, $tableArray[1]))){

        die($errors);
    }
    if (isset($input[WHERE])) {
       $tableArray = whereImplementation($input[WHERE], $tableArray);
    }
    if (isset($input[UNIQUE])) {
        $tableArray = uniqueRow($input[UNIQUE], $tableArray);
    }
    if (isset($input[SORT_COL])) {
        $tableArray = sorting($input[SORT_COL], $input[SORT_MODE], $input[SORT_DIRECTION], $tableArray);
    }
    if (isset($input[MULTI_SORT])) {
        $tableArray = multiSorting($input[MULTI_SORT], $input[MULTI_SORT_DIR], $tableArray);
    }
    if (isset($input[MAP_FUNCT])) {
        $tableArray = functionMapping($input[MAP_FUNCT], $input[MAP_FUNCT_COL], $tableArray);
    }
    $tableArray = changeCaseOnColumns($input, $tableArray);
    if (isset($input[SUM])) {
        $tableArray = sumAggregation($input[SUM], $tableArray);
    }
    if (isset($input[AGGREGATE_PRODUCT])) {
        $tableArray = productAggregation($input[AGGREGATE_PRODUCT], $tableArray);
    }
    if (isset($input[AGGREGATE_LIST])) {
        $tableArray = glueingAggregation($input[AGGREGATE_LIST], $input[AGGREGATE_LIST_GLUE], $tableArray);
    }
    if (isset($input[SELECT])) {
        $tableArray = selectColumns($tableArray, $input[SELECT]);
    }
    if (isset($input[COL_SORT])) {
        $tableArray = columnSorting($input[COL_SORT], $tableArray);
    }
    if (!isset($input[OUTPUT]) || $input[OUTPUT] === 'screen') {
        outputToScreen($tableArray);
    } else {
        outputToFile($tableArray, $input[OUTPUT_FILE]);
    }
}

mainFunction();