<?php
/****************************************************
*													*
*					DOCUMENT INFO 					*
*													*
*	This is the main index for the Roam Project,	*
*	also know as the homepage. This file does the 	*
*	following things:								*
*	A) Including all the neccessary files to be 	*
*		used on all pages site-wide.				*
*	B) Opening the proper HTML Body declarations 	*
*	C) Importing style sheets 						*
*	D) Handling the correct meta data 				*
*	E) Opening the proper container divs 			*
*													*
*													*
*				END OF DOCUMENT INFO 				*
*													*
****************************************************/

/*	Include all the neccesary files to be used on 	*
*	every webpage									*/

/*	Opening the proper HTML Body declarations 		*/ ?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php
		// Error reporting for development purposes
		error_reporting('E_ALL');
		/*	Handling the correct metadata and Importing 	*
		*	stylesheets.									*/ ?>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<title>Roam</title>
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/Open%20Sans/stylesheet.css">
		<link rel="stylesheet" href="css/main.css">
	</head>
	<body>
		<div id="container">
				<div class="content">
					<p>This is the main Header content.</p>
