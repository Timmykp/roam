<?php
/****************************************************
*					DOCUMENT INFO 					*
*													*
*	This is the main index for the Roam Project,	*
*	also known as the homepage. This file does the 	*
*	following things:								*
*	A) Import the header file 						*
*	B) Main body content shizzle					*
*	?) Import the footer 							*
*													*
*													*
*				END OF DOCUMENT INFO 				*
*													*
****************************************************/

/*	Importing of the site-wide header 				*/
include 'header.php';

/*	Main document functionality						*/
echo "<p>Welcome, " . $_SESSION['fName'] . " " . $_SESSION['lName'] ."!</p>";
echo "<p><a href='logout.php'>Click this link to logout.</a></p>";


/*	Importing of the site-wide footer 				*/
include 'footer.php'

?>