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
*/
function registerAccount($fName, $lName, $hashedPassword, $email, $birthdate, $gender, $country, $facebookID){
	$db = new databaseHandler();
	$status = "active";
	$currentDate = date('Y-m-d');
	if($facebookID == "") {
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
	echo "<br>" . $query ."<br>";

	$mysqli = $db->getMysqli();
	//If query was succesfull
	if($mysqli->query($query)===TRUE) {
		echo "<script>window.alert('User account created');</script>";
	} else {
		echo "Something went wrong... " . $mysqli->error;
	}

	//Get customer ID based on email


	//Create user profile


	$db->close();
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