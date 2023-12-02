<?php


if (isset($_POST['update_customer'])) {
	// code...
if ($_SESSION['admin']=='1') {



if (($_SESSION['authority']=='superadmin') || (($_SESSION['managecustomers']=='1'))) {
  // authorized to operate

$customername=mysqli_real_escape_string($con,$_POST['customername']);
$customerphone=mysqli_real_escape_string($con,$_POST['customerphone']);
$customerlocation=mysqli_real_escape_string($con,$_POST['customerlocation']);
$customertype=mysqli_real_escape_string($con,$_POST['customertype']);
$briefinfo=mysqli_real_escape_string($con,$_POST['briefinfo']);
$customer_status=mysqli_real_escape_string($con,$_POST['customer_status']);
$customer_id=mysqli_real_escape_string($con,$_POST['customer_id']);



$save_supplier = mysqli_query($con,"UPDATE customers SET customername='$customername',customerphone='$customerphone',customerlocation='$customerlocation',customertype='$customertype',briefinfo='$briefinfo',customer_status='$customer_status' WHERE id='$customer_id'");

if($save_supplier)
{
	$message="Customer Information Updated";
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