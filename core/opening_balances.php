<?php

if (isset($_POST['update_year'])) {
	// code...
if ($_SESSION['admin']=='1') {
	if (($_SESSION['authority']=='superadmin') || (($_SESSION['accessreports']=='1'))) {
  // authorized to operate
$coffeegrade=mysqli_real_escape_string($con,$_POST['coffeegrade']);
	$alertlevel=mysqli_real_escape_string($con,$_POST['alertlevel']);

 



$new_grade = mysqli_query($con,"UPDATE opening_balances SET coffeegrade='$coffeegrade',alertlevel='$alertlevel'");

if ($new_grade) {
	// code...
	$message="Entry Updated Successfully";
}
else
{
	$error="Database Uplink Failure!";
}

 
}
else
{
	$error="Access Denied!";
}



}
else
{

//not logged in
	echo "<script>window.location='logout.php'</script>";

}


}



?>