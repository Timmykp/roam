<?php
 /*	Importing of the site-wide header 				*/
include 'header.php';
  
  
function changeSingleValueFromDatabase($table, $column, $newValue, $options) {
 	 $db = new databaseHandler();	//Instantiation of new DB object


 	 $mysqli = $db->getMysqli();		//Request the myslqli object from the object
	 
	 //Example:
	 //UPDATE profiel SET foto_url ='nieuweURL' WHERE klant_ID = '5' AND '' = ''

 	 $query = "UPDATE ". $table ." SET ". $column ."='" . $newValue ."' WHERE ";	 //Add all the options from the options array to the where clause.
 	 while($arrayPosition = current($options)) {
	 	$query .= key($options) . " = '". $arrayPosition . "' AND ";
 		next($options);
 	 }

 	 $query .= "'' = ''"; 						//Solves neccesity to count options array for appending AND
 	
 	return ($mysqli->query($query)===TRUE); 		//returns wether or not the query succeeded					//Return the value from the function
	
}
  
function changeProfilePicture($fotoUrl) { 

	$table = 'profiel';
	$column = 'klant_foto_url';	
	$newValue = $fotoUrl;
	$options = array('klant_ID' => $_SESSION['id']);
	
	if (changeSingleValueFromDatabase($table, $column, $newValue, $options)==TRUE) { ;
	echo "Changed profile picture<br>";
	} else { 
	echo "Something went wrong. Please try again";
	} 
}   

function changeProfileBio($klantBio) { 

	$table = 'profiel';
	$column = 'klant_bio';	
	$newValue = $klantBio;
	$options = array('klant_ID' => $_SESSION['id']);
	
	if (changeSingleValueFromDatabase($table, $column, $newValue, $options)==TRUE) { ;
	echo "Changed biography<br>";
	} else { 
	echo "Something went wrong. Please try again";
	} 
} 

function changeAccountFirstName($klantVoornaam) { 

	$table = 'account';
	$column = 'klant_voornaam';	
	$newValue = $klantVoornaam;
	$options = array('klant_ID' => $_SESSION['id']);
	
	if (changeSingleValueFromDatabase($table, $column, $newValue, $options)==TRUE) { ;
	echo "Changed first name<br>";
	} else { 
	echo "Something went wrong. Please try again";
	} 
}

function changeAccountLastName($klantAchternaam) { 

	$table = 'account';
	$column = 'klant_achternaam';	
	$newValue = $klantAchternaam;
	$options = array('klant_ID' => $_SESSION['id']);
	
	if (changeSingleValueFromDatabase($table, $column, $newValue, $options)==TRUE) { ;
	echo "Changed last name<br>";
	} else { 
	echo "Something went wrong. Please try again";
	} 
}

/*
NOG NIET IN GEBRUIK!!
function changeAccountNationality($klantNationaliteit) { 

	$table = 'account';
	$column = 'klant_nationaliteit';	
	$newValue = $klantNationaliteit;
	$options = array('klant_ID' => $_SESSION['id']);
	
	if (changeSingleValueFromDatabase($table, $column, $newValue, $options)==TRUE) { ;
	echo "Profiel aangepast";
	} else { 
	echo "Something went wrong. Please try again";
	} 
}
*/

function changeAccountDateOfBirth($klantGeboortedatum) { 

	$table = 'account';
	$column = 'klant_geboortedatum';	
	$newValue = $klantGeboortedatum;
	$options = array('klant_ID' => $_SESSION['id']);
	
	if (changeSingleValueFromDatabase($table, $column, $newValue, $options)==TRUE) { ;
	echo "Changed date of birth<br>";
	} else { 
	echo "Something went wrong. Please try again";
	} 
}

function changeAccountSex($klantGeslacht) { 

	$table = 'account';
	$column = 'klant_geslacht';	
	$newValue = $klantGeslacht;
	$options = array('klant_ID' => $_SESSION['id']);
	
	if (changeSingleValueFromDatabase($table, $column, $newValue, $options)==TRUE) { ;
	echo "Changed Sex<br>";
	} else { 
	echo "Something went wrong. Please try again";
	} 
}

if (!$_POST['profiel_foto']=="") { 
	$fotoUrl = $_POST['profiel_foto'];
	changeProfilePicture($fotoUrl);
} 

if (!$_POST['klant_bio']=="") { 
	$klantBio = $_POST['klant_bio'];
	changeProfileBio($klantBio);
} 

if (!$_POST['klant_voornaam']=="") { 
	$_SESSION['fName'] = $_POST['klant_voornaam'];
	$klantVoornaam = $_POST['klant_voornaam'];
	changeAccountFirstName($klantVoornaam);
} 

if (!$_POST['klant_achternaam']=="") { 
	$_SESSION['lName'] = $_POST['klant_achternaam'];
	$klantAchternaam = $_POST['klant_achternaam'];
	changeAccountLastName($klantAchternaam);
} 
/*
NOG NIET IN GEBRUIK!!
if (!$_POST['klant_nationaliteit']=="") { 
	$klantNationaliteit = $_POST['klant_nationaliteit'];
	changeAcountNationality($klantNationaliteit);
} 
*/
if (!$_POST['klant_geboortedatum']=="") { 
	$klantGeboortedatum = $_POST['klant_geboortedatum'];
	changeAccountDateOfBirth($klantGeboortedatum);
} 

if (!$_POST['klant_geslacht']=="") { 
	$klantGeslacht = $_POST['klant_geslacht'];
	changeAccountSex($klantGeslacht);
} 

?>