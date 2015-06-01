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
  
//-------------------------------------------------------------Changing account and profile data------------------------------------
  
function changeProfilePicture($fotoUrl) { 
	
	if (changeSingleValueFromDatabase('profiel', 'klant_foto_url', $fotoUrl, array('klant_ID' => $_SESSION['id']))==TRUE) {
	echo "Changed profile picture<br>";
	} else { 
	echo "Something went wrong. Please try again";
	} 
}   

function changeProfileBio($klantBio) { 
	
	if (changeSingleValueFromDatabase('profiel', 'klant_bio', $klantBio, array('klant_ID' => $_SESSION['id']))==TRUE) { 
	echo "Changed biography<br>";
	} else { 
	echo "Something went wrong. Please try again";
	} 
} 

function changeAccountFirstName($klantVoornaam) { 
	
	if (changeSingleValueFromDatabase('account', 'klant_voornaam', $klantVoornaam, array('klant_ID' => $_SESSION['id']))==TRUE) { 
	echo "Changed first name<br>";
	} else { 
	echo "Something went wrong. Please try again";
	} 
}

function changeAccountLastName($klantAchternaam) { 

	if (changeSingleValueFromDatabase('account', 'klant_achternaam', $klantAchternaam, array('klant_ID' => $_SESSION['id']))==TRUE) { ;
	echo "Changed last name<br>";
	} else { 
	echo "Something went wrong. Please try again";
	} 
}

function changeAccountEmail($klantEmail) { 

	if (changeSingleValueFromDatabase('account', 'klant_email', $klantEmail, array('klant_ID' => $_SESSION['id']))==TRUE) { ;
	echo "Changed last name<br>";
	} else { 
	echo "Something went wrong. Please try again";
	} 
}

/*
NOG NIET IN GEBRUIK!!
function changeAccountNationality($klantNationaliteit) { 

	if (changeSingleValueFromDatabase('account', 'klant_nationaliteit', $klantNationaliteit, array('klant_ID' => $_SESSION['id']))==TRUE) { ;
	echo "Profiel aangepast";
	} else { 
	echo "Something went wrong. Please try again";
	} 
}
*/

function changeAccountDateOfBirth($klantGeboortedatum) { 
	
	if (changeSingleValueFromDatabase('account', 'klant_geboortedatum', $klantGeboortedatum, array('klant_ID' => $_SESSION['id']))==TRUE) { ;
	echo "Changed date of birth<br>";
	} else { 
	echo "Something went wrong. Please try again";
	} 
}

function changeAccountSex($klantGeslacht) { 

	if (changeSingleValueFromDatabase('account', 'klant_geslacht', $klantGeslacht, array('klant_ID' => $_SESSION['id']))==TRUE) { ;
	echo "Changed Sex<br>";
	} else { 
	echo "Something went wrong. Please try again";
	} 
}

//--------------------------- If not empty, calling the function. (handigere manier?) (geslacht is nooit empty) (wil verhaal in biography houden als value) -----------------


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

if (!$_POST['klant_email']=="") { 
	$klantAchternaam = $_POST['klant_email'];
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