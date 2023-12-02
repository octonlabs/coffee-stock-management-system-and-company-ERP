<?php




if (isset($_GET['delete-coffee-grade'])) {
	// code...

if ($_SESSION['admin']=='1') {

if (($_SESSION['authority']=='superadmin') || (($_SESSION['managegreenbeans']=='1'))) {
  // authorized to operate

$user_id = preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['delete-coffee-grade']));
$gt_cust = mysqli_query($con,"SELECT * FROM green_beans WHERE coffeegrade='$user_id'");
$customer = mysqli_num_rows($gt_cust);
$cust_status = $customer;

if ($cust_status>0) {
	// code...
	$error = "There Is A Green Bean Stock Using This Grade";
} else {
	// code...


$update_user = mysqli_query($con,"DELETE  FROM coffee_grades WHERE id='$user_id'");
if ($update_user) {
	// code...
	$message = "Grade Deleted Successfully";
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