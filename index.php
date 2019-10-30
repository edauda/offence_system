<?php
include_once('loginprocess.php');
include_once('includes/header.inc.php'); ?>
  <body>
 
    <div class="login-page">
      <div class="container">
    <!--  <img src="img/frsc-logo.jpg" width="300px" height="250px">-->
        <div class="form-outer text-center d-flex align-items-center">
    
          <div class="form-inner">
         
            <div class="logo text-uppercase"><strong class="text-primary">Administrator Login</strong></div>
           
            <form method="POST" class="text-left form-validate" name="login" action="index.php">
              <div class="form-group-material">
                <input id="login-username" type="text" name="username" required data-msg="Please enter your username" class="input-material">
                <label for="login-username" class="label-material">Username</label>
              </div>
              <div class="form-group-material">
                <input id="login-password" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                <label for="login-password" class="label-material">Password</label>
              </div>
              <div class="col-lg-10">
              <input type="hidden" name="submitted" value="True">
              <button type="submit" name="submit" class="btn btn-success">Login</button>
              </div>
               
              </div>
            </form>
          </div>
          <div class="copyrights text-center">
            <p>Designed by Andrex || Copyright &copy 2019 </p>
         
          </div>
        </div>
      </div>
    </div>
    <?php include_once('includes/footer.inc.php'); ?>