<?php




if (isset($_GET['fire-user'])) {
	// code...

       

  
if ($_SESSION['admin']=='1') {

if (($_SESSION['authority']=='superadmin') || (($_SESSION['managestaff']=='1'))) {
  // authorized to operate
$user_id = preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['fire-user']));
$new_code = rand(1001,100000);
$gt_cust = mysqli_query($con,"SELECT * FROM staffinformation WHERE id='$user_id'");
$customer = mysqli_fetch_array($gt_cust);
$cust_status = htmlentities($customer['staff_status']);

if ($cust_status=='fired') {
	// code...
} else {
	// code...
$update_user = mysqli_query($con,"UPDATE staffinformation SET staff_status='fired', staff_code='$new_code' WHERE id='$user_id'");
if ($update_user) {
	// code...
	$message = "Staff Fired Successfully";
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