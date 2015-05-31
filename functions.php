<?php
/****************************************************
*					DOCUMENT INFO 					*
*													*
*	This is the functions file for the Roam 		*
*	Project. Functions that are executed more then 	*
*	once should be added to this file. This way can *
*	adhere to the DRY principles (Don't Repeat 		*
*	Yourself). Functions have been documented using *
*	JavaDoc standard. The format is as follows: 	*
*													*
	/*												*
*	* Short function explanation					*
*	* @param VariableType explanation				*
*	* @return VariableType	explanation				*
*	*\/												*
*													*
*				END OF DOCUMENT INFO 				*
*													*
****************************************************/

/* 	
*	Function to dynamically get the title of the document based on the current URI
*	@param none
*	@return String the document title based on the URI
*/
function getDocumentTitle(){
	//Request the full URL for the current displayed page
	$currentURI = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$base 		= basename($currentURI, ".php");

	//Returns either a) the base of the URI path, skipping the .php suffix
	//						b) Home if the current URI is the root folder
	//						 (because index.php is loaded but omitted when the user visits the root)
	return 		($base == "roam.localhost") || 				//Returned when loading root on local project
				($base == "roambackpacking.com") ||			//Returned when loading root on webserver
				($base == "index")							//Returned when loading root/index.php
						? "Home" : $base;
}

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
 	echo "'$query";
 	
 	$res = $mysqli->query($query); 				//Execute query and save resultset
 	$resultsArray = $res->fetch_assoc(); 		//Fetch results from the resultset and store as associative array.
 												//This assumes only a single result is retrieved, hence the function name
 	$value = $resultsArray["$column"];			//Get the value that was requested for the column, as sepcified by the function parameters


 	 $db->close_db();							//Close the database connection of the object
 	 return $value;								//Return the value from the function

  }

/* 
* Function to see if certain value exists in 'table.column'
* @param String Table 	- The table to be queried
* @param String Column 	- The column to be queried
* @param String value 	- The value that should be checked
* @return Boolean 		- True if the value exists, false if it doesn't
*/
function existsInDatabase($table, $column, $value) {
	$db = new databaseHandler();

	$mysqli = $db->getMysqli();
	$query = "SELECT * FROM " . $table . " WHERE " . $column ." = '" . $value ."'";

	if ($result = $mysqli->query($query)) {
	} else {
		echo $mysqli->error;
	}
	
	$db->close_db();
	return ($result->num_rows > 0);
}

/*
* This function will create a default profile for a new user.
* This function is used during account registration, so that the new
* user will also get a row in the profiel database table.
* @param String email 	- The email associated with the account that needs a profile added
* @return Boolean 		- Returns wether the query was executed succesfully or not
*/
function createProfile($email){

	$db = new databaseHandler();
	$mysqli = $db->getMysqli();

	$options = array('klant_email' => $email);

	//Get the klant_id associated with the email.
	$id = getSingleValueFromDatabase("account", "klant_ID", $options);

	$query = 	"INSERT INTO profiel(klant_ID, klant_bio) 
					VALUES (	'".$id."', 
								'To add a Biography about yourself, edit this field on your profile page!')";

	return ($mysqli->query($query)===TRUE); 		//returns wether or not the query succeeded

}

/*
* Function to register an account
* @param String fName 			- The first name of the user
* @param String lName 			- The last name of the user
* @param String hashedPassword 	- The hash of the entered password
* @param String email 			- The email of the user, used for login
* @param String birthdate 		- The birthday of the user, following mysql database format: Y-m-d
* @param String gender 			- The gender of the user
* @param String country 		- The nationality of the user
* @param String facebookID 		- The facebookID of the user. Used when registering a user that logged in through Facebook
* 								  for the first time.
* @return Array 				- This returns an associative array with two fields:
* 								  'result' => Boolean wether or not the task succeeded
* 								  'message' => An added message. Is handy when the function fails at some point.
*/
function registerAccount($fName, $lName, $hashedPassword, $email, $birthdate, $gender, $country, $facebookID){

	$db = new databaseHandler(); 	//Create new database object

	$mysqli = $db->getMysqli();

	//Clean input to prevent SQL injection
	$fName 			= $mysqli->real_escape_string($fName);
	$lName 			= $mysqli->real_escape_string($lName);
	$hashedPassword = $mysqli->real_escape_string($hashedPassword);
	$email 			= $mysqli->real_escape_string($email);
	$birthdate		= $mysqli->real_escape_string($birthdate);
	$gender 		= $mysqli->real_escape_string($gender);
	$country 		= $mysqli->real_escape_string($country);
	
	//Check if the email already exists. If it does, no need in registering.
	if(!existsInDatabase("account", "klant_email", $email)) {
		
		$status = "active";				//Default status for new account is active
		$currentDate = date('Y-m-d');	//The current registration date of the user
		if($facebookID == "") {			//If facebookID parameter is empty string, assume the user was created on the registration page
			$facebookID = "NULL";
		}

		$query = 	"INSERT INTO account(klant_voornaam, klant_achternaam, klant_wachtwoord, klant_email, klant_geboortedatum,
										klant_geslacht, klant_nationaliteit, facebook_ID, klant_registratie_datum, klant_status) 
					VALUES (	'".$fName."', 
								'".$lName."',
								'".$hashedPassword."', 
								'".$email."',
								'".$birthdate."',
								'".$gender."',
								'".$country."',
								'".$facebookID."',
								'".$currentDate."',
								'".$status."')";

		//If query was succesfull
		if($mysqli->query($query)===TRUE) {
			$db->close_db();
			if(createProfile($email)){
				return array('result' => true, 'message' => 'User account and profile added');
			} else {
				return array('result' => false, 'message' => 'User account was created, but the profile could not be created');
			}
		} else {
			$db->close_db();
			return array('result' => false, 'message' => $mysqli->error);
		}
	} else {
		$db->close_db();
		return array('result' => false, 'message' => 'User email already in use');
	}
	

	$db->close_db();
	 return array('result' => false, 'message' => 'registerUser Function ended unexpectedly');
}

/*
*	Function to hash any password using the Eskblowfish algorithm
*	@param String strPlainText 	- The password to be hashed
*	@return String 		 		- The hash of the password
*/
function hashPassword($strPlainText) {
 
  if (CRYPT_SHA512 != 1) {
    throw new Exception('Hashing mechanism not supported.');
  }
 
  return crypt($strPlainText, '$6$rounds=50000$iopgcjquyrtfslpt$');
 
}


/*
* Function that validates a password against a hash
* @param String strPlainText 	- The password to be checked against the hash
* @param String strHash 	 	- The hash that the password is checked against.
* @return Boolean 				- The result of the validation.
* Example: You could check an entered password against the hash in the database.
* This will determine if the user entered a correct password for the user.
*/
function validatePassword($strPlainText, $strHash){
  if (CRYPT_SHA512 != 1) {
    throw new Exception('Hashing mechanism not supported.');
  }
 
  //Returns if the given password and hashes match
  return (crypt($strPlainText, $strHash) == $strHash) ? true : false;
 }
?>