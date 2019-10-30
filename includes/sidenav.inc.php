 <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <?php 
            
            session_name('offencesystem');
            session_start();
            session_regenerate_id(TRUE);

            require_once('includes/config.inc.php');
            require_once ('classes/MSUtility.php');

            require_once DB;
            $db_obj = new DataBO();
            $db_conn = $db_obj->get_conn();
            $id = $_SESSION['id'];

            if(isset($_SESSION['user'])){
              $sql ="SELECT staff_fname,staff_lname,staff_rank FROM staff WHERE staff_id='$id'";
              $stmt = $db_conn->query($sql);
             // die(var_dump($stmt));

                if($stmt->rowCount()==1){
                  $row = $stmt->fetch();
                  $fullname = $row['staff_fname'].' '.$row['staff_lname'];
                  $rank = $row['staff_rank'];
                }
            }
            else{
              //if the person tries to access a page without login redirect the person to login
              MSUtility::redirect('index.php');
            }

          ?>
          <div class="sidenav-header-inner text-center"><img src="img/avatar.jpg" alt="person" class="img-fluid rounded-circle">
            <h2 class="h4"><?php echo $fullname;  ?></h2><span> <?php echo $rank;  ?></span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="home.php" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="home.php"> <i class="icon-home"></i>Home </a></li>
           
            <li><a href="report.php"> <i class="fa fa-bar-chart"></i>Statistics</a></li>
            <li><a href="viewoffenders.php"> <i class="icon-grid"></i>View List of Offenders</a></li>
            
            <?php
             require_once DB;
             $db_obj = new DataBO();
             $db_conn = $db_obj->get_conn();

              if(isset($_SESSION['user'])){
                $user = $_SESSION['user'];
                $level_query = "SELECT user_level FROM user WHERE user_name='$user'";
                $level_result = $db_conn->query($level_query);

                while($rows=$level_result->fetch()){
                    $user_level = $rows['user_level'];

                      if($user_level == 1){
                        echo "<li><a href='adduser.php' > <i class='icon-interface-windows'> </i>Add Admin</a></li>";
                      }

                }
              }
            ?>

            <li><a href="offence.php"> <i class="icon-interface-windows"></i>Add Offender</a></li>
            <li class=""><a href="logout.php"> <i class="icon-form"></i>Logout</a></li>
          </ul>
        </div>
      
      </div>
    </nav>