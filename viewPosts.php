<?php
require_once 'header.php';

echo "<h2>Your recent posts</h2>";
$options = array('klant_ID' => $_SESSION['id']);

$resultsArray = getMultipleValuesFromDatabase('posts', '*', $options); //Retrieve all rows from posts where klant_ID matches the id of the logged in user

//Iterate through the multidimensional array, displaying the correct fields for each iteration
for($i = 0; $i<sizeOf($resultsArray); $i++){
 	echo "<div class='post-entry'>";
 		echo "<h3>" . $resultsArray[$i]['post_titel'] . "</h3>";
 		echo "<p><em>Story date: </em>" . $resultsArray[$i]['post_datum'] . "</p>";
 		echo "<p><em>Published on: </em>" . $resultsArray[$i]['post_creatie_tijd'] . "</p>";
 		echo "<p><em>Is this post publicly visible? </em>" . $resultsArray[$i]['post_is_public'] . "</p>";
 		echo "<p>" . $resultsArray[$i]['post_inhoud'] . "</p>";
 	echo "</div>";
 }

require_once 'footer.php';
?>