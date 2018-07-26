<?php
/**
 * Created by PhpStorm.
 * User: adamveres
 * Date: 21.07.2018
 * Time: 17:18
 */

/**
 * The function that gets the user given data
 * @return array
 */

function getInput() {
    return getopt(SHORT_OPTS, LONG_OPTS);
}