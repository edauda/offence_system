<?php
 include_once('addoffenceprocess.php');
 include_once('includes/index-header.inc.php'); 
	$page='offence';
?>
  <body>
   <?php include_once('includes/sidenav.inc.php'); ?>
    <div class="page">
      <!-- navbar-->
 		
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active">Add Offender      </li>
          </ul>
        </div>
      </div>
      <section class="forms mt-4">
        <div class="container-fluid">
      
          <div class="row">
           
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Add Offender</h4>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" method="POST" action="offence.php" name="offence">
                  	 <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Title</label>
                      <div class="col-sm-4">
                         <select name="title" class="form-control">
                          <option>Select a Title...</option>
                          <option value="Mr">Mr</option>
                          <option value="Mrs">Mrs</option>
                          <option value="Dr.">Dr.</option>
                          <option value="Prof.">Prof.</option>
                        </select>
                      </div>
                      
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">First Name</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="fname">
                      </div>
                       <label class="col-sm-2 form-control-label">Last Name</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="lname">
                      </div>
                    </div>
               
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Plate Number</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="plate_no">
                      </div>

                      	 <label class="col-sm-2 form-control-label">Phone Number</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="phone_no">
                      </div>

                    </div>
                   <!-- 
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Report Date</label>
                      <div class="col-sm-10">
                        <input type="text" placeholder="DD/MM/YYYY" class="form-control" name="report_date">
                      </div>
                    </div>
                  -->
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Address</label>
                      <div class="col-sm-10">
                        <textarea rows="4" class="form-control" name="address"></textarea>
                      </div>
                    </div>
                     <div class="line"></div>
                       <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Offence Category</label>
                      <div class="col-sm-10 mb-3">
                        <select name="offence_category" class="form-control">
                        <option>Select a Category...</option>
                        <?php
                        	require_once DB;
						            	$db_obj = new DataBO();
    					          	$db_conn = $db_obj->get_conn();
                       
                            $query1 = "SELECT offence_category FROM offence_category";
    						          	$query_result1 = $db_conn->query($query1);

    						          		if($query_result1){
    								          	while($row=$query_result1->fetch()){
    										          $offence_category = $row['offence_category'];
    										          echo "<option> $offence_category </option>";
    									      }//end while loop
    								    }// end if query ran successfully
    						
                        	?>
                         
                        </select>
                      </div>

                      </div>
                       <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Offence Name</label>
                      <div class="col-sm-10 mb-3">
                        <select class="form-control" name="offence_name">
                        	<option>Select an Offence...</option>
                        	<?php
                        	require_once DB;
							$db_obj = new DataBO();
                $db_conn = $db_obj->get_conn();
                $query2 = "SELECT offence_type FROM offence_type";
    						// die(var_dump($db_obj));
    							$query_result2 = $db_conn->query($query2);

    								if($query_result2){
    									while($row=$query_result2->fetch()){
    										$offence = $row['offence_type'];
    										echo "<option> $offence </option>";
    									}//end while loop
    								}// end if query ran successfully
    						
                        	?>
                        </select>
                      </div>
                      
                      </div>
                     <div class="line"></div>
                     <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Officer's Staff ID</label>
                       <div class="col-sm-4">
                          <input type="text" name="staff_id" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 form-control-label">Officer's Comment</label>
                       <div class="col-sm-10">
                          <textarea rows="5" class="form-control" name="comment"></textarea>
                      </div>
                    </div>
                    <div class="line"></div>
                    
         

             
         
           
                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-2">
                        <button type="submit" class="btn btn-secondary" name="cancel">Cancel</button>
                        <input type="hidden" name="submitted" value="True">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
     <?php include_once('includes/index-footer.inc.php'); ?>