<?php


if (isset($_GET['reset-staff'])) {
	// code...


if ($_SESSION['admin']=='1') {


              


       
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managestaff']=='1'))) {
  // authorized to operate
  

$user_id = preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['reset-staff']));
$new_id = rand(1001,100000);

$update_user = mysqli_query($con,"UPDATE staffinformation SET staff_code='$new_id' WHERE id='$user_id'");
if ($update_user) {
	// code...
	$message = "Staff Code Reset Complete";
}
else
{
	$error = "Database Uplink Failure!";
}

} 
else
{
	$error="Access Denied !";
}

}
else
{

		echo "<script>window.location='logout.php'</script>";
}

}



?>