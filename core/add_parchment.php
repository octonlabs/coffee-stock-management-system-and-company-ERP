<?php



if (isset($_POST['add_parchment'])) {
	// code...
if ($_SESSION['admin']=='1') {


if (($_SESSION['authority']=='superadmin') || (($_SESSION['manageparchment']=='1'))) {
  // authorized to operate

$supplier=mysqli_real_escape_string($con,$_POST['supplier']);
$quantity=mysqli_real_escape_string($con,$_POST['quantity']);
$unitprice=mysqli_real_escape_string($con,$_POST['unitprice']);
$batchnumber=mysqli_real_escape_string($con,$_POST['batchnumber']);
$handler=mysqli_real_escape_string($con,$_POST['handler']);
$otherinfo=mysqli_real_escape_string($con,$_POST['otherinfo']);


$gt_cust = mysqli_query($con,"SELECT * FROM parchment WHERE batchnumber='$batchnumber'");
$customer = mysqli_num_rows($gt_cust);
$cust_status = $customer;

if ($cust_status>0) {
	// code...
	$error="Batch Number Already Exists";
} else {
	// code...

$save_supplier = mysqli_query($con,"INSERT INTO parchment(supplier,quantity,unitprice,batchnumber,handler,otherinfo,purchase_status,remaining) VALUES('$supplier','$quantity','$unitprice','$batchnumber','$handler','$otherinfo','active','$quantity')");

if($save_supplier)
{
	$message="New Parchment Stock Saved";
}
else
{
	$error="Database Uplink Failure!";
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

//not logged in
	echo "<script>window.location='logout.php'</script>";

}


}




?>