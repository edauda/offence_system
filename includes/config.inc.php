<?php #script config.inc.php
//This is my database configuration script
/* author: Emmanuel Dauda
*  Date:  28 September 2019
*/
//Errors are emailed here
$contact_email = 'edauda34@gmail.com';

//Determine whether we are working on a local server or on a LIVE server
if(stristr($_SERVER['HTTP_HOST'], 'local') || (substr($_SERVER['HTTP_HOST'],0,7) == '192.168')){
	$local = TRUE;  //It is a local server
}
else{
	$local = FALSE; //It is a LIVE server
} //end of if conditional statement

//Determine the location of files and URL of the website
//Allow Development on different server
//Define The full path of the site while on localhost or system

//Always debug while running on local server
$debug = TRUE;

//the Base_URI defines the absolute path to the application on the local server
define('BASE_URI','C:\xampp\htdocs\offence_system');
   // The BASE_URL defines the path to the site via the 
    // localhost server
define('BASE_URL','http://localhost/offence_system/');

//The DB constant defines the absolute path to the 
//database configuration file
define('DB','C:\xampp\htdocs\offence_system\includes\mysql.inc.php');

//assuming debugging is off
if(!isset($debug)){
	$debug = FALSE;
}

#**********************************#
#******** ERROR MANAGEMENT ********#

// Create the error handler.
// This is my custom error handling function
// Name: my_error_handler(....)
// Purpose: The purpose of this function is to
//          1. display error if the $debug variable 
//          is set to TRUE which is always TRUE 
//          while in localhost. 
//          Or when set to TRUE deliberately.
//          2. But to email all errors to 
//          $contact_email variable when the 
//          $debug variable is set to FALSE.
//          or running remotely on the 
//          production server 
// 
// * $e_number stores the status/level of the 
//   error that occured
// * $e_message stores the error message 
// * $e_file stores the name of the php script 
// * where the error occured
// * $e_line stores the line number where the
//   error occured
// * $e_vars stores the value of the variables
//   when the error occured.

function my_error_handler($e_number,$e_line,$e_file,$e_vars,$e_message){
	global $debug, $contact_email;

	//Build the error message
	$message = "An error occurred in script '$e_file' on line $e_line: \n<br />$e_message\n<br />";

	//add the date and time
	$message .= "Date/Time: " .date('n-j-Y: H:i:s'). "\n <br/>";

	//append $e_vars to the message
	$message .= "<pre>" .print_r($e_vars,1). "</pre> \n<br/>";

	//show the error if $debug is set to True
	if($debug){
		  echo "<p class='error'> $message </p>";
	}
	else{
        
        // Instead Log the error since $debug is set to FALSE:
        // How? by emailing it
        error_log($message, 1, $contact_email); // Send error message as an email to $contact_email
        
        // Only print an error message if the error 
        // isn't a notice or strict.
        if(($e_number != E_NOTICE) && ($e_number < 2048)){
            echo '<p class="error">A system error occurred. We apologize for the inconvenience.</p>';
        }
        
    } // End of $debug IF
    
}// End function my_error_handler

//use error handler
set_error_handler('my_error_handler');
?>