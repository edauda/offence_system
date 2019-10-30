
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
            <li class="breadcrumb-item active">Statistics</li>
          </ul>
        </div>
      </div>
  <section class="charts">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Statistics</h1>
          </header>
          <div class="row">
            <div class="col-lg-8">
              <div class="card line-chart-example">
                <div class="card-header d-flex align-items-center">
                  <h4>Monthly Report</h4>
                </div>
                <div class="card-body">
                <canvas id="myChart" class="col-lg-12"></canvas>
                <div class="form-group">
                  
                
                 
                </div>
                </div>
              </div>
            </div>
          
       
      
         
          </div>
        </div>
      </section>
      <script src="js/Chart.js"></script>
      <script src="js/utils.js"></script>
      <script>
	var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June','July','August','September','October','November','December'],
        datasets: [{
            label: '',
            data: [120, 19, 35, 50, 100, 73,125,180,250,306,0,0],
            backgroundColor: [
                'rgba(75, 192, 192, 0.7)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255,0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255,0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255,1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255,1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});


	</script>


      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
           
            <div class="col-sm-6 text-right">
              <p>Designed by Andrex || Copyright &copy 2019</p>
            
            </div>
          </div>
        </div>
      </footer>
