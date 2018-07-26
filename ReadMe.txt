My SQL (Not really)

Welcome to my take on the implementation of SQL's SELECT function (sort of), plus some
data processing options that are supposed to help the user find data from a .csv file.

The Project:

The application gets a file.csv from the user that contains the desired data placed in
columns, separated by commas, and also gets the options chosen by the user for sorting/
processing the file's contents, and proceedes to apply the desired changes on said con-
tent. Afterwards, the finalised data is given back to the user, either on the screen,
or in file format, if so desired.

Commands:

The file is executable with: ./sql.php | php sql.php

The usable flags are:

        --help : display help
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
        --where "col(<>(aka. NOT|!==)|<|>|=)val" : Removes all the specified values in
			the specified columns 
        --aggregate-sum col : Glues a new column to the end of the first line of the
			data array with the SUM of the column, removing all other rows
        --aggregate-product col : Glues a new column to the end of the first line of the
			data array with the PRODUCT of the column, removing all other rows
        --aggregate-list column : Glues a new column to the end of the first line of the
			data array with the CONTENT of the column GLUED together into one
			long-ass string, removing all other rows
        --aggregate-list-glue : Specifies the "glue" for the earlier mentioned process
	--uppercase-column col : Convert all chars in the column to LOWERCASE
	--lowercase-column col : Convert all chars in the column to UPPERCASE
	--titlecase-column col : Convert all chars in the column to TITLECASE
	--power-values "col pow" : Raises all values in the column to the power specified
	--map-function functionName : Specify the name of the function found in the file
			with the same name(.php) that will be applied over all elements
			of the desired column defined below
	--map-function-column col : Specify the column on which the earlier mentioned func-
			tion will be applied
	--column-sort asc|desc : Sorts the order of columns

Further Development:

Some validation cases are still missing for an elevated user experiences. Without these,
bugs might occure at certain input sequences.

Special thanks to:
	Sergiu Abrudean
	Iulian Iancu
	Georgiana Marian
	Rares Moldovan
	Andor Sarig
	Andra Barsoianu
	Calin Bolea
	Dan Homorodean
	Calin Pristavu


