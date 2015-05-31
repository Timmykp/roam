<?php
require_once 'header.php';


//You can test some cases in this file.

//Execute registerAccount function and save results
$returned = registerAccount("Jochem", "Smit", "bla", "anve_nomuree@hotmail.com", "2015-05-03", "male", "Nederland", "");

if($returned['result'] == false) {
	//Something went wrong while executing the function
	 echo "Failed! Attached message: " . $returned['message'] . "<br>";
}
else {
	//Function was executed succesfully
	echo "Success! Attached message: " . $returned['message'] . "<br>";
}

require_once 'footer.php';
?>
