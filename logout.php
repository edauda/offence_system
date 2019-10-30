<?php
// Change session Name
session_name('offencesystem');
session_start();
//session_regenerate_id();

// require the Configuration file -config.inc.php
require_once 'includes/config.inc.php';
require_once 'classes/MSUtility.php';

// If no Session variable exist Redirect the user
if(!isset($_SESSION['user'])){
          
     //redirect the user to the login page to login
    $url = "index.php";
    MSUtility::redirect($url);  
}

else{
    //destroy all the session
    $_SESSION['user'] = array(); //empty the session
    session_destroy();
    setcookie(session_name('offencesystem'),'',time()-300); // destroy the cookie  $url = "login.php";
     $url = "index.php";
    MSUtility::redirect($url);  

}// End of IF
