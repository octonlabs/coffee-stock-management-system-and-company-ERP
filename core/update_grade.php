<?php

if (isset($_POST['update_grade'])) {
	// code...
if ($_SESSION['admin']=='1') {

	if (($_SESSION['authority']=='superadmin') || (($_SESSION['managegreenbeans']=='1'))) {
  // authorized to operate


$coffeegrade=mysqli_real_escape_string($con,$_POST['coffeegrade']);
	$alertlevel=mysqli_real_escape_string($con,$_POST['alertlevel']);
	$grade_id=mysqli_real_escape_string($con,$_POST['grade_id']);

if(!(empty($coffeegrade)) && !(empty($alertlevel)))
{


$new_grade = mysqli_query($con,"UPDATE coffee_grades SET coffeegrade='$alertlevel',alertlevel='$coffeegrade' WHERE id='$grade_id'");

if ($new_grade) {
	// code...
	$message="Grade Data Updated";
}
else
{
	$error="Database Uplink Failure!";
}

}
else
{
	$error="You Can't Submit Empty Data";
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