<?php
/**
 * Created by PhpStorm.
 * User: adamveres
 * Date: 25.07.2018
 * Time: 08:57
 */

/**
 * Checks the parameters that are needed for the simple sort to create
 * the parameters array that is needed for the call_user_func_array for
 * the array_multisort function
 *
 * @param string $column
 * @param string $sortMode
 * @param string $direction
 * @param array $originalArray
 *
 * @return array
 */
function sorting(string $column, string $sortMode, string $direction, array $originalArray) :array {
    $columnArray = array_column($originalArray, $column);
    $sortParametersArray = [$columnArray];
    if ($direction === 'desc'){
        $sortParametersArray[]= SORT_DESC;
    }
    if ($sortMode === 'alpha') {
        $sortParametersArray[] = SORT_STRING;
    } elseif ($sortMode === 'numeric') {
        $sortParametersArray[] = SORT_NUMERIC;
    }
    $sortParametersArray[] = &$originalArray;
    call_user_func_array('array_multisort', $sortParametersArray);
    return $originalArray;
}

function multiSorting(string $columnsString, string $directionsString, array $originalArray) : array {
    $columnsArray = explode(',', $columnsString);
    $directionsArray  = explode(',', $directionsString);
    $sortParametersArray = [];
    foreach ($columnsArray as $index => $column){
        $sortParametersArray[] = array_column($originalArray, $column);
        if ($directionsArray[$index] === 'desc') {
            $sortParametersArray[] = SORT_DESC;
        }
    }

    $sortParametersArray[] = &$originalArray;
    call_user_func_array('array_multisort', $sortParametersArray);
    return $originalArray;
}
