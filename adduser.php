<?php

  include_once('adduserprocess.php');
 include_once('includes/index-header.inc.php'); 
 $page='adduser';
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
            <li class="breadcrumb-item active">Add Admin </li>
          </ul>
        </div>
      </div>
      <section class="forms mt-4">
        <div class="container-fluid">
      
          <div class="row">
           
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Add New Admin</h4>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" method="POST" action="adduser.php" name="adduser">
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">First Name</label>
                      <div class="col-sm-8">
                        <input type="text" name="fname" class="form-control">
                      </div>
                      
                    </div>
                <div class="line"></div>
                  <div class="form-group row">
                     <label class="col-sm-2 form-control-label">Last Name</label>
                      <div class="col-sm-8">
                        <input type="text" name="lname" class="form-control">
                      </div>
                  </div>
                  <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Email Address</label>
                      <div class="col-sm-8">
                        <input type="text" name="email" class="form-control">
                      </div>


                    </div>
                     <div class="line"></div>
                    <div class="form-group row">
                      
                         <label class="col-sm-2 form-control-label">Phone Number</label>
                      <div class="col-sm-8">
                        <input type="text" name="phone_no" class="form-control">
                      </div>
                    </div>
                     <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Username</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="username">
                      </div>
                    </div>
                   <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Password</label>
                      <div class="col-sm-8">
                        <input type="password" name="password" class="form-control">
                      </div>
                    </div>
                     <div class="line"></div>
                     
                     <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Rank</label>
                      <div class="col-sm-8">
                        <input type="text" name="rank" class="form-control">
                      </div>
                    </div>
                     <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Staff ID No.</label>
                      <div class="col-sm-8">
                        <input type="text" name="staff_id_no" class="form-control">
                      </div>
                    </div>
                 <div class="line"></div>
           
                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-2">
                        <button type="submit" class="btn btn-secondary" name="cancel">Cancel</button>
                        <input type="hidden" name="submitted" value="True">
                        <button type="submit" class="btn btn-primary" name="submit">Save Changes</button>
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