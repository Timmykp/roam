<?php
/****************************************************
*													*
*					DOCUMENT INFO 					*
*													*
*	This is a document used in testing facebook		*
*	authentication. This file handles all the 		*
*	connection details through the Facebook API 	*
*													*
*													*
*				END OF DOCUMENT INFO 				*
*													*
****************************************************/
include 'header.php';

//Import required stuff from the Facebook SDK
require 'facebook-sdk/autoload.php';

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphSessionInfo;

// Requested permissions for the app - optional.
$permissions = array(
    'email',
    'user_location',
    'user_birthday'
);

FacebookSession::setDefaultApplication('1436086966711181', '1a92c736d9a886bbbc93bee4e8e3d818');

$helper = new FacebookRedirectLoginHelper( "http://roam.localhost/fbaccess.php" );
 
// Authorize the user.
try {
    if ( isset( $_SESSION['access_token'] ) ) {
        // Check if an access token has already been set.
        $session = new FacebookSession( $_SESSION['access_token'] );
    } else {
        // Get access token from the code parameter in the URL.
        $session = $helper->getSessionFromRedirect();
    }
} catch( FacebookRequestException $ex ) {
 
    // When Facebook returns an error.
    print_r( $ex );
} catch( \Exception $ex ) {
 
    // When validation fails or other local issues.
    print_r( $ex );
}
if ( isset( $session ) ) {
 
    // Retrieve & store the access token in a session.
    $_SESSION['access_token'] = $session->getToken();
 
    $logoutURL = $helper->getLogoutUrl( $session, 'http://roam.localhost/logout.php' );


 
    // Logged in
    echo '<p>Successfully logged in! <a href="' . $logoutURL . '">Logout</a></p>';
} else {
 
    // Generate the login URL for Facebook authentication.
    $loginUrl = $helper->getLoginUrl();
    echo '<p><a href="' . $loginUrl . '">Login</a></p>';
}


// Retrieve User’s Profile Information
$request = ( new FacebookRequest( $session, 'GET', '/me' ) )->execute();
 
// Get response as an array
$user = $request->getGraphObject()->asArray();

echo "<h1>Account Info</h1><br>";
echo "<p><b>Voornaam: </b>" . $user['first_name'] . "</p>";
echo "<p><b>Achternaam: </b>" . $user['last_name'] . "</p>";
echo "<p><b>Geslacht: </b>" . $user['gender'] . "</p>";
echo "<p><b>Profiel URL: </b><a href='" . $user['link'] . "'>link</a></p>";

// Get User’s Profile Picture
$request = ( new FacebookRequest( $session, 'GET', '/me/picture?type=large&redirect=false' ) )->execute();
 
// Get response as an array
$picture = $request->getGraphObject()->asArray();
 
echo "<p><img src='" . $picture['url'] . "'></p>";