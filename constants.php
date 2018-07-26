<?php
/**
 * Created by PhpStorm.
 * User: adamveres
 * Date: 21.07.2018
 * Time: 17:22
 */

const SHORT_OPTS = "";

const LONG_OPTS = ["select:", "from:", "help:", "output:", "output-file:",
    "sort-column:", "sort-mode:", "sort-direction:", "multi-sort:",
    "multi-sort-dir:", "unique:", "where:", "aggregate-sum:", "aggregate-product:",
    "aggregate-list:", "aggregate-list-glue:", "uppercase-column:", "lowercase-column:",
    "titlecase-column:", "power-values:", "map-function:", "map-function-column:",
    "column-sort:"
    ];

const HELP = 'help';
const SELECT = 'select';
const FROM = 'from';
const OUTPUT = 'output';
const OUTPUT_FILE = 'output-file';
const SORT_COL = 'sort-column';
const SORT_MODE = 'sort-mode';
const SORT_DIRECTION = 'sort-direction';
const MULTI_SORT = 'multi-sort';
const MULTI_SORT_DIR = 'multi-sort-dir';
const UNIQUE = 'unique';
const WHERE = 'where';
const SUM = 'aggregate-sum';
const AGGREGATE_PRODUCT = 'aggregate-product';
const AGGREGATE_LIST = 'aggregate-list';
const AGGREGATE_LIST_GLUE = 'aggregate-list-glue';
const UPPER = 'uppercase-column';
const LOWER = 'lowercase-column';
const TITLECASE = 'titlecase-column';
const POWER = 'power-values';
const MAP_FUNCT = 'map-function';
const MAP_FUNCT_COL = 'map-function-column';
const COL_SORT = 'column-sort';

const FILE_PATTERN = '/^.+\.csv$/';
const HELP_STRING =
"        --help : Display help. Also, KILLS the app. Ain't that ironic?
        --select col1,col2 : Select wich columns should be displayed
        --from file.csv : Give the file that contains the data that should be processed
        --output csv|screen : Choose the type of output you'd like
        --ouput-file file.csv : The name of the output file (IF 'csv' was chosen earlier)
        --sort-column col : Choose a column that should be sorted 
        --sort-mode natural|alpha|numeric : Choose the sort mode for the chosen column
        --sort-direction asc|desc : Choose the sort direction for the chosen column
        --multi-sort col1,col2,... : Like sorts? Why stop at one?
        --multi-sort-dir asc,desc,...
        --unique col : Removes all the duplicates from a column
        --where \"col(<>(aka. NOT|!==)|<|>|=)val\" : Removes all the specified values in
			the specified columns 
        --aggregate-sum col : Glues a new column to the end of the first line of the
			data array with the SUM of the column, removing all other rows
        --aggregate-product col : Glues a new column to the end of the first line of the
			data array with the PRODUCT of the column, removing all other rows
        --aggregate-list column : Glues a new column to the end of the first line of the
			data array with the CONTENT of the column GLUED together into one
			long-ass string, removing all other rows
        --aggregate-list-glue : Specifies the \"glue\" for the earlier mentioned process
	--uppercase-column col : Convert all chars in the column to LOWERCASE
	--lowercase-column col : Convert all chars in the column to UPPERCASE
	--titlecase-column col : Convert all chars in the column to TITLECASE
	--power-values \"col pow\" : Raises all values in the column to the power specified
	--map-function functionName : Specify the name of the function found in the file
			with the same name(.php) that will be applied over all elements
			of the desired column defined below
	--map-function-column col : Specify the column on which the earlier mentioned func-
			tion will be applied
	--column-sort asc|desc : Sorts the order of columns\n";