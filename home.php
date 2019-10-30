<?php

include_once('includes/index-header.inc.php'); 
require_once('includes/config.inc.php');
require_once ('classes/MSUtility.php');
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
            
          </ul>
        </div>
      </div>
      <section class="forms mt-4">
        <div class="container-fluid">
      
          <div class="row">
           
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                <h3>Welcome to your dashboard</h3>
                </div>
                <div class="card-body">
                  <h4>
                    <p>
                          You currently don't have any message.
                    </p>
                  </h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
     <?php include_once('includes/index-footer.inc.php'); ?>