<?php
	//start output buffering to prevent header already sent error
	ob_start();
	session_name('offencesystem');
	session_start();
	session_regenerate_id(true);

require_once('includes/config.inc.php');
require_once ('classes/MSUtility.php');

if(isset($_POST['submitted'])){
	//if all the fields are valid
	$user_name = MSUtility::filterPostString('username');
	$pass = MSUtility::filterPostString('password');
//	die(var_dump($user_name,$pass));
	if($user_name && $pass){
		require_once DB;
		$db_obj = new DataBO() ;
		$db_conn = $db_obj->get_conn();

		//if the database connection was successful
		if($db_conn){
			//check if the supplied username and password corresponds 
			//to the value in the database
			$sql = "SELECT user_id, user_name, user_password FROM user WHERE user_name='$user_name' AND user_password= SHA1('$pass') AND user_status=1";
			$stmt = $db_conn->query($sql);

			if($stmt){
					//if query ran successfully
					//check if the user exist
					if($stmt->rowCount()==1){
						$row = $stmt->fetch();
						$user_id = $row['user_id'];
						$user_name = $row['user_name'];

						//store the username and userid in session
						$_SESSION['user'] = $user_name;
						$_SESSION['id'] = $user_id;
						//echo $_SESSION['user'];
						//die();
						//echo "The User Exist! " . $user_name; 

						//check the type of user i.e if it is admin or normal user
						$sql2 =  "SELECT user_name, user_level FROM user WHERE user_name='$user_name'";
						$query2 = $db_conn->query($sql2);
				//	die(var_dump($query2));
              		 while ($u_row=$query2->fetch()) {
              		 	$user_type = $u_row['user_level'];
                         

                          if($user_type==1 || $user_type==2){
                          	 	//echo "Yea! you are an admin </br>"; 
                               // echo "Welcome ". $user_name;
                          		$url = "home.php";
                          		MSUtility::redirect($url);

                          }//end if user_type

                            else{
                            	echo "Invalid Login details. Try Again!";
                            	$url = "index.php";
                            	MSUtility::redirect($url);
                           		 }// if of if else if condition

              			 }//end while statement
						} //end if check for existing user
					else{
						echo "Sorry the User " . $user_name . " does not Exist!";
						$url = "index.php";
                         MSUtility::redirect($url);
					}
					
				} //end if $stmt
				exit();
		}// end if database connection

	}//end if username and password are supplied
}

?>