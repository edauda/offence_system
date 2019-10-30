<?php
require_once('includes/config.inc.php');
require_once ('classes/MSUtility.php');

require_once DB;
$db_obj = new DataBO() ;
$db_conn = $db_obj->get_conn();

$sql= "SELECT qty FROM report";
$stmt = $db_conn->query($sql);

$data = array();
foreach ($stmt as $row) {
	$data[] = $row;
}
echo json_encode($data);
?>