<?php

require_once('includes/config.inc.php');
require_once ('classes/MSUtility.php');

if(isset($_POST['submitted'])){
	$fname = MSUtility::filterPostString('fname');
	$lname = MSUtility::filterPostString('lname');
	$title = MSUtility::filterPostString('title');
	$phone_no = MSUtility::filterPostString('phone_no');
	$plate_no = MSUtility::filterPostString('plate_no');
	$address = MSUtility::filterPostString('address');
	$offence_cat = MSUtility::filterPostString('offence_category');
	$offence_type = MSUtility::filterPostString('offence_name');
	$staff_id = MSUtility::filterPostString('staff_id');
	$comment = MSUtility::filterPostString('comment');
	
	$errors = array();
	//die(var_dump($plate_no));
		if($fname && $lname && $title && $phone_no && $plate_no && $address && $offence_cat && $staff_id && $comment){
			
			//require the database connection
			require_once DB;
			$db_obj = new DataBO();
    		$db_conn = $db_obj->get_conn();

				if($db_conn)
				{
				//if the database connection was successful
				$plate_no_query = "SELECT offender_plate_no FROM offender WHERE offender_plate_no='$plate_no'";
				$plate_no_result = $db_conn->query($plate_no_query);
					if($plate_no_result){
						//if query ran successfully
						
					if($plate_no_result->rowCount()==1){
						//if the plate_no already exist in the database
						$errors[] = "The Offender already exist in the System Database";
						}
					}//end query
				//	die(var_dump($errors));
			//	if(empty($errors)){
				
					//if there are no errors
			//		try{
						$insert_query ="INSERT INTO offender(offender_fname,offender_lname,offender_phone_no,offender_address,offender_plate_no,offender_title) VALUES('$fname','$lname','$phone_no','$address','$plate_no','$title')";
						$insert_result = $db_conn->query($insert_query);
					
							if($insert_result){
							//if query ran successfull
							
							$offender_id = $db_conn->lastinsertid();
							
								$report_insert = "INSERT INTO report(report_date,report_staff_id,report_comment,report_offender_id,report_offence_category_id,report_offence_type) VALUES(now(),'$staff_id','$comment','$offender_id','$offence_cat','$offence_type')";
								$result = $db_conn->query($report_insert);
						}
					//}
				//	catch(PDOException $ex){
					//	$db_conn->rollback();
             		//	$url = "offence.php?error= A System error occured while trying to add the offender & el=2";
					//}
			//	}
    	
   			 	}//if database connection was successful
		}
	
}// end if isset method