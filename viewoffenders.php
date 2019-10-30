<?php
require_once('includes/config.inc.php');
require_once ('classes/MSUtility.php');
include_once('includes/index-header.inc.php');
 ?>
<body>
   <?php include_once('includes/sidenav.inc.php'); ?>
    <div class="page">
      <!-- navbar-->
 		
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">View Offenders </li>
          </ul>
        </div>
      </div>

      <section>
        <div class="container-fluid">
          <!-- Page Header-->
       
           <header></header>
            <div class="row">
            <div class="col-lg-12">
            <form name="search-form" action="viewoffenders.php" method="POST">
              
           	  <div class="col-lg-4">
           			 <label class="col-sm-12 form-control-label">Enter Offender's Plate Number</label>
                      <div class="col-sm-12">
                        <input type="text" name="search" class="form-control">

                      </div>
                      <div class="form-group">
                      	<div class="col-sm-12 mt-2">
                      		 <button type="submit" class="btn btn-md btn-success" name="btn-search">Search</button>
                      	</div>
                      </div>

           	 </div>
           	 <div class="col-lg-12 mt-4">
              <div class="card">
                <div class="card-header">
                  <h4>Search Result</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Full Name</th>
                          <th>Plate Number</th>
                          <th>Phone Number</th>
                          <th>Offence</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         require_once DB;
                         $db_obj = new DataBO();
                         $db_conn=$db_obj->get_conn();

                        if(isset($_POST['btn-search'])){
                         

                          $search_term = MSUtility::filterpostString('search');
                          if($search_term == ''){
                            echo "The Search Field can not be Empty!";
                           // exit();
                            //  MSUtility::redirect('viewoffenders.php');

                          }
                          else{
                                $search_query = "SELECT offender.offender_fname as fname, offender.offender_lname as lname,offender.offender_phone_no as phone_no,offender.offender_plate_no as plate_no,report.report_comment as offence,offender_title as title FROM offender INNER JOIN report ON offender_id=report.report_offender_id WHERE offender.offender_plate_no LIKE '%$search_term%'";

                                $search_result = $db_conn->query($search_query);

                                while( $row = $search_result->fetch()){
                                  $full_name = $row['fname'].' '.$row['lname'];
                                  $title = $row['title'];
                                  $plateno = $row['plate_no'];
                                  $phoneno = $row['phone_no'];
                                  $offence_name = $row['offence'];

                                  echo"<tr><td>$title</td>
                                  <td>$full_name</td>
                                  <td>$plateno</td>
                                  <td>$phoneno</td>
                                  <td>$offence_name</td>
                                  </tr>
                                  ";
                                }// end while loop
                          }

                        }
                        ?>
                    
                     
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
            </form>
            </div>
           </div>

          <div class="row">
        
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h3>Complete List of Offenders</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Full Name</th>
                          <th>Phone Number</th>
                          <th>Plate Number</th>
                          <th>Date of Offence</th>
                          <th>Offence</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                         require_once DB;
                         $db_obj = new DataBO();
                         $db_conn=$db_obj->get_conn();
                         
                         if($db_conn){
                         
                           //if database connection was successful
                           $table_query = "SELECT offender.offender_fname as fname, offender.offender_lname as lname,offender.offender_phone_no as phone_no,offender.offender_plate_no as plate_no,report.report_date as report_date,report.report_comment as comment FROM offender INNER JOIN report ON offender_id=report.report_offender_id";

                           //die(var_dump($table_query));

                           $table_result = $db_conn->query($table_query);
                              if($table_result){
                                //if the query ran successfully
                                $counter = 1;
                                  while($row=$table_result->fetch()){
                                    $fullname = $row['fname'].' '.$row['lname'];
                                    $phone_no = $row['phone_no'];
                                    $plate_no = $row['plate_no'];
                                    $report_date = $row['report_date'];
                                    $comment = $row['comment'];
  
                                    echo"<tr><td>$counter</td>
                                    <td>$fullname</td>
                                    <td>$phone_no</td>
                                    <td>$plate_no</td>
                                    <td>$report_date</td>
                                    <td>$comment</td>
                                    </tr>";
                                    $counter++;
                                  }//end while
                                  

                              }
                         }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
           
            
          </div>
        </div>
      </section>
      <?php include_once('includes/index-footer.inc.php'); ?>