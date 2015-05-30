<?php
/****************************************************
*					DOCUMENT INFO 					*
*													*
*	This is the profile page for the Roam Project,	*
*	also known as the homepage. This file does the 	*
*	following things:								*
*	A) Import the header file 						*
*	B) Show profile									*
*	?) Import the footer 							*
*													*
*													*
*				END OF DOCUMENT INFO 				*
*													*
****************************************************/

/*	Importing of the site-wide header 				*/
include 'header.php';


/*	Main document functionality						*/ ?>
<div id="profile_page">
	<div id="top">
		<img src="img/pieter.jpg" class="pieter" alt="Profile Picture">
		<img src="img/world_map.jpg" class="world_map" alt="Visited countries">
		<h3>Pieter de graaf</h3>
		<p>
			The Netherlands <br>
			11-09-1992 <br>
			Sex: Male 
		</p>
	</div>
	<div id="bottom">
		<div id="current_location">
			<h3>Current location: Rome, Italy</h3>
			<img src="img/rome.png" class="rome" alt="current location">
		</div>
		<h3>About me</h3>
		<p>I am Pieter de Graaf, a travelling student. Look at my current location and contact me if you are nearby!</p>
	</div>
</div>
<?php
/*	Importing of the site-wide footer 				*/
include 'footer.php'

?>