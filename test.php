
<?php
require_once('includes/config.inc.php');
require_once ('classes/MSUtility.php');

require_once DB;
			$db_obj = new DataBO();
            $db_conn = $db_obj->get_conn();
            
          $q = "SELECT report_date FROM report";
          $r = $db_conn->query($q);

          while ($row=$r->fetch()){
              $n_date = $row['report_date'];
              list($y,$m,$d) = explode('-',$n_date);
                $data[] = $m;
             

            

          }
          
      
          foreach($data as $value){
              echo $value."\n";
             
          }
          print(count($data));
   
         