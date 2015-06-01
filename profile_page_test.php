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


/*	Main document functionality						*/
?>

<?php

function Checkid(){
	$servername = "localhost";
	$username = "root";
	$dbname = "roam";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Create connection
	// Check connection
	if(!$conn) { 
		die("connection failed: " . mysqli_connect_error());
	} 
	echo "connected succesfully";
} 

Checkid();

/*function getName() { 
	$qry = "SELECT * FROM account WHERE klant_ID=1";
	$result = mysqli_query($conn, $qry) or die(mysql_error());

	if (mysqli_num_rows($result) == 1) {
		// output data of each row
		$row = mysqli_fetch_assoc($result);
		return $row["klant_voornaam"] . "<br>";
	} else {  
		return "0 results";
	} 
}*/
function getName() {
	$sql= "SELECT * FROM klant WHERE klant_ID=1";
	if ($result=mysqli_query($conn,$sql)){
	  // Fetch one and one row	
	  while ($row=mysqli_fetch_assoc($result))
		{
		return $row['klant_voornnaam'];
		}
	  mysqli_free_result($result);
	}
}
?>

<div id="profile_page">
	<div id="top">
		<img src="img/pieter.jpg" class="pieter" alt="Profile Picture">
		<img src="img/world_map.jpg" class="world_map" alt="Visited countries">
		<h3><?php echo getName(); ?></h3>
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
include 'footer.php';
?>