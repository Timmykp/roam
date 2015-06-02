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
<div id="edit_profile_page">
	<form action='thijs_functions.php' method='post'>
		<div id="account">
			<h2>Account information</h2>
			<p>Change first name</p>
			<input type='text' name='klant_voornaam' placeholder='First name' size="30"><br>
			<p>Change last name</p>
			<input type='text' name='klant_voornaam' placeholder='First name' size="30"><br>
			<p>Change email</p>
			<input type='text' name='klant_email' placeholder='E-mail' size="30">
			<p>Change nationality, NOG NIET IN GEBRUIK!!</p>
			<input type='text' name='klant_nationaliteit' placeholder='Nationality' size="30"> <!-- Is er een handigere manier om een land te kiezen dan al die opties in het registratieformulier? -->
			<p>Change date of birth</p>
			<input type='date' name='klant_geboortedatum' placeholder='Date of birth (YYYY-MM-DD)' size="30">
			<p>Change Sex</p>
			<select name='klant_geslacht' id='country'>
				<option value="male">Male</option>
				<option value="female">Female</option>
			</select>
			</div>
			<div id="profile">
			<h2>Profile information</h2>
			<p>Change profile picture</p>
			<input type='text' name='profiel_foto' placeholder='URL of your profile picture' size="30"><br>
			<p>Change your biography</p>
			<textarea type='text' name='klant_bio' value='<?php echo getSingleValueFromDatabase('profiel', 'klant_bio', array('klant_ID' => $_SESSION['id'] )) ?>' rows="7" cols="30"></textarea><br>
			<input type='submit' name='submit' value='change'>
		</div>
	</form>
</div>
<?php
/*	Importing of the site-wide footer 				*/
include 'footer.php'

?>