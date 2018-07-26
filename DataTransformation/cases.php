<?php
/**
 * Created by PhpStorm.
 * User: veres
 * Date: 7/24/2018
 * Time: 10:16 PM
 */

/**
 * Changes the case of the specified column in the specified type
 * NOTE: the cases WILL conflict if called on the same column
 *
 * @param array $input
 * @param array $originalArray
 *
 * @return array
 */

function changeCaseOnColumns(array $input, array $originalArray) : array {
    if (isset($input[LOWER])){
        if (array_key_exists($input[LOWER], $originalArray[0])){
            $columnArray = array_column($originalArray, $input[LOWER]);
            foreach ($columnArray as $key => $string){
                $originalArray[$key][$input[LOWER]] = strtolower($string);
            }
        }
    }

    if (isset($input[UPPER])){
        if (array_key_exists($input[UPPER], $originalArray[0])){
            $columnArray = array_column($originalArray, $input[UPPER]);
            foreach ($columnArray as $key => $string){
                $originalArray[$key][$input[UPPER]] = strtoupper($string);
            }
        }
    }

    if (isset($input[TITLECASE])){
        if (array_key_exists($input[TITLECASE], $originalArray[0])){
            $columnArray = array_column($originalArray, $input[TITLECASE]);
            foreach ($columnArray as $key => $string){
                $originalArray[$key][$input[TITLECASE]] = ucwords($string);
            }
        }
    }
    if (isset($input[POWER])){
        $powerVal = explode(' ', $input[POWER]);
        if (array_key_exists($powerVal[0], $originalArray[0])){
            $columnArray = array_column($originalArray, $powerVal[0]);
            foreach ($columnArray as $key => $str){
                $int = (int)$str;
                $originalArray[$key][$powerVal[0]] = pow($int, (int)$powerVal[1]);
            }
        }
    }
    return $originalArray;
}