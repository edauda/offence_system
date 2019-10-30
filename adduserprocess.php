<?php


require_once('includes/config.inc.php');
require_once ('classes/MSUtility.php');

if (isset($_POST['submitted'])){

	$fname = MSUtility::filterPostString('fname');
	$lname = MSUtility::filterPostString('lname');
	$email = MSUtility::validateEmail('email');
	$phone_no = MSUtility::filterPostString('phone_no');
	$rank = MSUtility::filterPostString('rank');
	$username = MSUtility::filterPostString('username');
	$password = MSUtility::filterPostString('password');
	$staff_id_no = MSUtility::filterPostString('staff_id_no');

	$errors = array();

		require_once DB;
		$db_obj = new DataBO();
        $db_conn = $db_obj->get_conn();

        if($db_conn){
        	//check if a user with the username already exist
        	$sql1 = "SELECT * FROM user WHERE user_name='$username'";

        	// run the Query
             $stmt = $db_conn->query($sql1);
             //die(var_dump($db_obj));
             if($stmt){ // if the Query ran successfully
                 
                 if($stmt->rowCount() == 1){ // if the user exists
                     // redirect the user to register.php with an 557=4Zhk error message
                     $errors[] = "This username is unavailable";
                 }// End of IF
                 
             }// End of Query

             if(empty($error)){
             	try{
             		$sql = "INSERT INTO staff(staff_fname,staff_lname,staff_phone_no,staff_id_no,staff_email,staff_rank) VALUES('$fname','$lname','$phone_no','$staff_id_no','$email','$rank')";
             		$stmt2 = $db_conn->query($sql);
				//echo "<label class='label label-info col-md-5'> The User ". $username. " has been successfully added</label>";

             		if($stmt2){
             			//if query ran successfully
             			$user_id = $db_conn->lastinsertid();
             			$user_insert = "INSERT INTO user(user_profile_id,user_name,user_password,user_status,user_level) VALUES('$user_id','$username',sha1('$password'),1,2)";
             			$user_result = $db_conn->query($user_insert);
             		}
             	}
             	catch(PDOException $e){
             		$db_conn->rollback();
             			$url = "adduser.php?error= A System error occured while trying to create the account&el=2";
             	}
             }
        }
	
} //end if check for valid files
?>