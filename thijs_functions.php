<?php
/*
*	Function to retrieve a single value from the database, based on the given parameters.
* 	@param String table 		- The table of the database where the value is needed
* 	@param String column 		- The column of the table where the value is needed
* 	@param Array options 		- Specification of the WHERE clause in the SQL statement, entered as an associative array
* 	@return String value 		- The retrieved value from the database
* 	Example: getSingleValueFromDatabase('account', 'klant_email', array('klant_ID' => '5')) will result in the following query:
* 		SELECT klant_email FROM account WHERE klant_ID = '5' AND '' = ''
* 	and will return the requested klant_email, or NULL if it doesn't exist.
*  	NOTE: This function does not handle errors well (yet)
*/
 function getSingleValueFromDatabase($table, $column, $options) {
 	 $db = new databaseHandler();	//Instantiation of new DB object


 	 $mysqli = $db->getMysqli();		//Request the myslqli object from the object

 	 $query = "SELECT ". $column ." FROM ". $table ." WHERE ";	 //Add all the options from the options array to the where clause.
 	 while($arrayPosition = current($options)) {
	 	$query .= key($options) . " = '". $arrayPosition . "' AND ";
 		next($options);
 	 }

 	 $query .= "'' = ''"; 						//Solves neccesity to count options array for appending AND
 	
 	$res = $mysqli->query($query); 				//Execute query and save resultset
 	$resultsArray = $res->fetch_assoc(); 		//Fetch results from the resultset and store as associative array.
 												//This assumes only a single result is retrieved, hence the function name
 	$value = $resultsArray["$column"];			//Get the value that was requested for the column, as sepcified by the function parameters


 	 $db->close_db();							//Close the database connection of the object
 	 return $value;								//Return the value from the function

  }
  
  function changeSingleValueFromDatabase($table, $column, $newValue, $options) {
 	 $db = new databaseHandler();	//Instantiation of new DB object


 	 $mysqli = $db->getMysqli();		//Request the myslqli object from the object
	 
	 //UPDATE profiel SET foto_url ='nieuweURL' WHERE klant_ID = '5' AND '' = ''

 	 $query = "UPDATE ". $table ." SET ". $column ." = '" . $newValue ."' WHERE ";	 //Add all the options from the options array to the where clause.
 	 while($arrayPosition = current($options)) {
	 	$query .= key($options) . " = '". $arrayPosition . "' AND ";
 		next($options);
 	 }

 	 $query .= "'' = ''"; 						//Solves neccesity to count options array for appending AND
 	
 	return ($mysqli->query($query)===TRUE); 		//returns wether or not the query succeeded					//Return the value from the function

  }
?>