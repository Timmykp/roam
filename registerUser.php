<?php
include 'headerprelogin.php';

if(isset($_POST['submit'])){
	//Do this if user pressed submit button
	
	//$i = $i + $i;
	//$i += $i;
	//"string" = "string " + "String"; //stringString
	//"string" .= "String"; //stringString
	
	//Validate form field
	
	$error = "";
	if($_POST['password'] != $_POST['repassword']){
		$error .= "Oops! The two entered passwords don`t match!<br>";
	}
	if(strlen($_POST['fName']) > 120){
		$error .= "Oops! First name is too long! Your name may not be longer than 120 characters.<br>";
	}
	if(strlen($_POST['fName']) < 2){
		$error .= "Oops! Your first name may not consist of 0 or only 1 character.<br>";
	}
	if(strlen($_POST['lName']) > 120){
		$error .= "Oops! Your last name is too long! Your name may not be longer than 120 characters.<br>";
	}
	if(strlen($_POST['lName']) < 2){
		$error .= "Oops! Your last name may not consist of 0 or only 1 character.<br>";
	}
	if(strlen($_POST['password']) > 30) {
		$error .= "Oops! Your password may not be longer than 30 characters.<br>";
	}
	if(strlen($_POST['password']) < 6) {
		$error .= "Oops! Your password must be longer than 6 characters.<br>";
	}
	if(preg_match('/[^0-9A-Za-z]/',$_POST['fName'])){
		$error .= "Oops! Your first name contains unknown characters.<br>";
	}
	if(preg_match('/[^0-9A-Za-z]/',$_POST['lName'])){
		$error .= "Oops! Your last name contains unknown characters.<br>";
	}
	if(preg_match('/[^0-9A-Za-z]/',$_POST['password'])){
		$error .= "Oops! Your password contains unknown characters.<br>";
	}
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$error .= "Oops! Your email contains unknown characters, or is an empty field.<br>";
	}
	if(empty($_POST['birthdate'])){
		$error .= "Oops! You need to enter a date of birth<br>";
	}
	if(!isset($_POST['gender'])){
		$error .= "Oops! You have to select a gender.<br>";
	}
	if(!isset($_POST['terms'])){
		$error .= "Oops! You have to agree with the terms of use.<br>";
	}
	switch($_POST['country']){
		case 'nothing':
		$error .= "Oops! Please select a nationality.";
	}
	
	
	if($error == ""){
		$hash = hashPassword($_POST['password']);
		registerAccount($_POST['fName'], $_POST['lName'], $hash, $_POST['email'], $_POST['birthdate'], $_POST['gender'], $_POST['country'], "");
	} else {
		//Show Form
		echo "<center> $error </center>";
		include 'register.php';
	}
} else {
	//Show form
	include 'register.php';
}
?>