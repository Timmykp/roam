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
		<h3><?php echo $_SESSION['fName'] . " " . $_SESSION['lName']?></h3>
		<p class="user_information">
			<?php echo ucfirst(getSingleValueFromDatabase('account', 'klant_nationaliteit', array('klant_ID' => $_SESSION['id'] ))) ?><br>
			<?php echo getSingleValueFromDatabase('account', 'klant_geboortedatum', array('klant_ID' => $_SESSION['id'] )) ?><br>
			Sex: <?php echo getSingleValueFromDatabase('account', 'klant_geslacht', array('klant_ID' => $_SESSION['id'] )) ?><br>
		</p>
	</div>
	<div id="bottom">
		<div id="current_location">
			<h3>Current location: Rome, Italy</h3>
			<img src="img/rome.png" class="rome" alt="current location">
		</div>
		<h3>About me</h3>
		<p><?php echo getSingleValueFromDatabase('profiel', 'klant_bio', array('klant_ID' => $_SESSION['id'] )) ?></p>
	</div>
</div>
<?php
/*	Importing of the site-wide footer 				*/
include 'footer.php'

?>