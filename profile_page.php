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
	<div id="profile_header">
		<img src="img/background_header.jpg" class="header_picture" alt="Profile Picture"> 
	</div>
	<div id="profile_content">
		<div id="profile_top">
			<img src="<?php echo (getSingleValueFromDatabase('profiel', 'klant_foto_url', array('klant_ID' => $_SESSION['id'] ))) ?>" class="profile_picture" alt="Profile Picture"> 
			<h3><?php echo $_SESSION['fName'] . " " . $_SESSION['lName']?></h3>
			<p class="user_information">
				<?php echo ucfirst(getSingleValueFromDatabase('account', 'klant_nationaliteit', array('klant_ID' => $_SESSION['id'] ))) ?>
				<?php echo getSingleValueFromDatabase('account', 'klant_geboortedatum', array('klant_ID' => $_SESSION['id'] )) ?>
				Sex: <?php echo getSingleValueFromDatabase('account', 'klant_geslacht', array('klant_ID' => $_SESSION['id'] )) ?>
			</p>
			<a href="edit_profile_page.php"><button type="button" class="edit_profile_button" >change profile</button></a>
		</div>
		<div id="profile_bottom">
			<div id="current_location">
				<h3>Current location: Rome, Italy</h3>
				<img src="img/rome.png" class="rome" alt="current location"><br>
				<img src="img/world_map.jpg" class="world_map" alt="Visited countries">
			</div>
			<h3>About me</h3>
			<p><?php echo getSingleValueFromDatabase('profiel', 'klant_bio', array('klant_ID' => $_SESSION['id'] )) ?></p>
		</div>
	</div>
</div>
<?php
/*	Importing of the site-wide footer 				*/
include 'footer.php'

?>