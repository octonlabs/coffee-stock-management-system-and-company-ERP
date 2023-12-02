<?php


if (isset($_GET['activate-staff'])) {
	// code...


if ($_SESSION['admin']=='1') {


       
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managestaff']=='1'))) {
  // authorized to operate
  

$user_id = preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['activate-staff']));
$gt_cust = mysqli_query($con,"SELECT * FROM staffinformation WHERE id='$user_id'");
$customer = mysqli_fetch_array($gt_cust);
$cust_status = htmlentities($customer['staff_status']);

if ($cust_status=='active') {
	// code...
} else {
	// code...

$update_user = mysqli_query($con,"UPDATE staffinformation SET staff_status='active' WHERE id='$user_id'");
if ($update_user) {
	// code...
	$message = "Staff Activated Successfully";
}
else
{
	$error = "Database Uplink Failure!";
}

}

}
else
{
	$error="Access Denied!";
}

}
else
{

		echo "<script>window.location='logout.php'</script>";
}
}



?>