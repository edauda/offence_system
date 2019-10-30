<?php

/* 
 * Script 1.0 : mysql.inc.php
 * Aim: This Script contains classes 
 *      neccessary for accessing 
 *      mysql database.
 */


/**
 * Author: Dauda Emmanuel
 * Class Name: DataBO
 * Aim: To Create Database Connection
 *      Using OOP 
 * 
 * Class Fields or Attributes are
 * - $host : stores the host name or address
 * - $dbname: stores the database name
 * - $username: stores the database username
 * - $password: stores the database password
 * 
 * Defaults:
 *    All class attributes or fields are already
 *    set in the constructor
 *    but can be manipulated as explained 
 *    below.
 * 
 * Possible Manipulations:
 *      -You can set the host, database name,
 *       password, username via their set methods
 *     
 */

class DataBO {
	private $host;		//stores the database host
	private $dbname;	//stores the database name
	private $password;	//stores the database password
	private $username;	//stores the database username
	private $db_conn; 	//stores the database connection object

	/*class constructor
 	*  calls the set method to set 
    *  the class fields
     * i.e 
     * sets the host, username, password 
     * and dbname.
     * and then returns a database 
     * connection object
    */
public function __construct(){
	//set the host name
	$this->set_host("localhost");

	//set the database name
	$this->set_dbname("offence_system");

	//set the server username
	$this->set_username("root");

	//set the database password
	$this->set_password("");

	//call the setup_conn() to set the database connection
	$this->setup_conn();


} //End of Class method __constructor

//method set_host to set or initialize the host
public function set_host($host){
	$this->host = $host;
}

	//nethod set_dbname to set the database name
public function set_dbname($dbname){
		$this->dbname = $dbname;
	}
//method to set the database username
public function set_username($username){
	$this->username = $username;
}

//method to set the database password
public function set_password($password)
{
	$this->password = $password;
}

//private method get_host() to retrieve the database hose
private function get_host(){
	 return $this->host;
	
}

//private method to get database name
private function get_dbname(){
	return $this->dbname;
}

//private function to get username
private function get_username(){
	return $this->username;
}

//private function to get password
private function get_password(){
	return $this->password;
}
//method to set the database connection object
public function setup_conn(){
$host = self::get_host();
$dbname = self::get_dbname();
$username = self:: get_username();
$password = self:: get_password();

//connecting to the database
try{
	$this->db_conn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
}
catch (PDOException $e){ //connection unsuccessful
	$this->db_conn = FALSE;
}

} //end setup_conn() function

 /*
      * Method get_conn()
      *  - returns the active connection object
      *    stored in the field variable $db_conn
      * - This methods expects that set_conn
      *   would be called first. And it is 
      *   always called first in the constructor 
      */
public function get_conn(){
	return $this->db_conn;
} //end get_conn()

  /*
      * Static Method setup_and_get_conn(..)
      *  - accepts/takes three parameters
      *   * host, database name, username and
      *   * password
      */
  public function setup_and_get_conn(){
  	return new PDO("mysql:host=$host;dbname=$dbname");
  }// end setup_and_get_conn()
  
} //End of class DataBO