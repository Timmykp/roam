<?php
/****************************************************
*					DOCUMENT INFO 					*
*													*
*	This is the main index for the Roam Project,	*
*	also know as the homepage. This file does the 	*
*	following things:								*
*													*
*													*
*													*
*				END OF DOCUMENT INFO 				*
*													*
****************************************************/


function getDocumentTitle(){
	//Request the full URL for the current displayed page
	$currentURI = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	//Returns either a) the base of the URI path, skipping the .php suffix
	//						b) Home if the current URI is the root folder
	//						 (because index.php is loaded but omitted when the user visits the root)
	return 		(basename($currentURI, ".php") == "roam.localhost") || 				//Returned when loading root on local project
				(basename($currentURI, ".php") == "roambackpacking.com") ||			//Returned when loading root on webserver
				(basename($currentURI, ".php") == "index")							//Returned when loading root/index.php
						? "Home" : basename($currentURI, ".php");
}
?>