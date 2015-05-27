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

//	Start the session. Required for Facebook Authentication saving
//	Note: Session must be started before any content is received.
session_start();

error_reporting('E_ALL');

//	Include all the neccesary files to be used on every webpage


/*	Opening the proper HTML Body declarations 		*/ ?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php
		/*	Handling the correct metadata and Importing 	*
		*	stylesheets.									*/ ?>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<title>Roam - Generated</title>
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/main.css">
	</head>
	<body>
		<div id="container">
			<div id="content">
				<p>This is the main Header content.</p>
