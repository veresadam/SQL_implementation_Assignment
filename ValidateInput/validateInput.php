<?php
/**
 * Created by PhpStorm.
 * User: adamveres
 * Date: 21.07.2018
 * Time: 18:15
 */

/**
 * Validates all the recieved data which uses pre-defined values (such as
 * asc/desc, etc...)
 * Constructs an array of error messages that will later be converted into
 * a string
 * If the string is not empty, then the applicaton will exit, informing the
 * user about the errors in their input
 * @param array $input
 * @return string
 */
function validateInput(array $input) : string {
    $errorArray = [];
    if (!isset($input[FROM])){
        $errorArray[] = "A --from file MUST be declared\n";
    } else {
        if (checkFileFormat($input[FROM]) !== 1) {
            $errorArray[] = "The --from file's extention must be '.csv'\n";
        }
        if (!file_exists($input[FROM])){
            $errorArray[] = "The provided file does not exist :(\n";
        }
    }
    if (isset($input[HELP])){
        die(HELP_STRING);
    }
    if (!isset($input[OUTPUT])){
        $input[OUTPUT] = 'screen';
    }
    if ($input[OUTPUT] === 'csv')
        $fileName = $input[OUTPUT_FILE];
    else {
        $fileName = '';
    }
    $errorArray[] = checkOutput($input[OUTPUT], $fileName);
    if (isset($input[SORT_COL])) {
        if (isset($input[SORT_DIRECTION]) && isset($input[SORT_MODE])) {
            $errorArray[] = checkSortOpt($input[SORT_DIRECTION], $input[SORT_MODE]);
        } elseif (isset($input[SORT_DIRECTION])) {
            $errorArray[] = checkSortOpt($input[SORT_DIRECTION]);
        }
    }
    if (isset($input[MULTI_SORT_DIR])) {
        $errorArray[] = checkSortOpt($input[MULTI_SORT_DIR]);
    }
    if (isset($input[WHERE])) {
        $errorArray[] = checkWhere($input[WHERE]);
    }
    if (isset($input[COL_SORT])) {
        $errorArray[] = checkSortOpt($input[COL_SORT]);
    }
    $errorArray = array_filter($errorArray);
    return implode("\n", $errorArray);
}

/**
 * Checks for '.csv' extension
 *
 * @param string $file
 * @return int
 */
function checkFileFormat(string $file) : int{
    return preg_match(FILE_PATTERN, $file);
}

/**
 * Checks if the '--output' has a valid input, and in case of 'csv'
 * chacks for the twin parameter 'output-file' that should contain
 * a file with the '.csv' extension
 *
 * @param string $output
 * @param mixed ...$filename
 *
 * @return string
 */
function checkOutput(string $output, ...$filename) : string {
    if ($output === 'screen'){
        return "";
    } elseif ($output === 'csv') {
        if (empty($filename[0])){
            return "If the 'csv' output option is chosen, you must name the output file, terminated with '.csv'\n";
        } elseif (checkFileFormat($filename[0]) === 1){
            return "";
        } elseif (checkFileFormat($filename[0]) !== 1) {
            return "The output file's extention must be '.csv'\n";
        }
    } else {
        return "The output flag must contain either 'screen' or 'csv' or can be ommited\n";
    }
}

/**
 * For the sake of reusability the $mode ($input['sort-mode']) is
 * optional, so that the multi-sort function can also use this funct.
 * Checks if the input data is valid, and notifies the user if not
 * @param string $directions
 * @param mixed ...$mode
 * @return string
 */
function checkSortOpt(string $directions, ...$mode) : string {
    if (isset($mode[0])){
        if ($mode[0] !== 'natural' && $mode[0] !== 'alpha' && $mode[0] !== 'numeric'){
            return "The 'sort-mode' flag must use the values 'natural|alpha|numeric'\n";
        }
    }
    $directions = explode(',', $directions);
    foreach ($directions as $direction) {
        if ($direction !== 'asc' && $direction !== 'desc') {
            return "The '(multi-)sort-direction' flag must use the values 'asc|desc'\n";
        }
    }
    return '';
}

/**
 * Checks if the '--where' input's values are separated by the valid
 * separators (<>,<,>,=)
 * @param string $where
 * @return string
 */
function checkWhere(string $where): string {
    if (preg_match('/^(\w+)(=|<|>|<>)(\w+)$/', $where) === 0) {
        return "Your filter must be of the format \"col(<>|<|>|=)val\"!\n";
    }
    return '';
}



// aggregate-list(-glue) to work together






