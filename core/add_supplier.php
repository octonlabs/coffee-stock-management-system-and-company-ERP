<?php



if (isset($_POST['add_supplier'])) {
	// code...

if ($_SESSION['admin']=='1') {

if (($_SESSION['authority']=='superadmin') || (($_SESSION['managesuppliers']=='1'))) {
  // authorized to operate

$suppliername=mysqli_real_escape_string($con,$_POST['suppliername']);
$supplierphone=mysqli_real_escape_string($con,$_POST['supplierphone']);
$supplierlocation=mysqli_real_escape_string($con,$_POST['supplierlocation']);
$suppliertype=mysqli_real_escape_string($con,$_POST['suppliertype']);
$briefinfo=mysqli_real_escape_string($con,$_POST['briefinfo']);


$gt_cust = mysqli_query($con,"SELECT * FROM suppliers WHERE supplierphone='$supplierphone'");
$customer = mysqli_num_rows($gt_cust);
$cust_status = $customer;

if ($cust_status>0) {
	// code...
	$error="Supplier Already Exists";
} else {
	// code...

$save_supplier = mysqli_query($con,"INSERT INTO suppliers(suppliername,supplierphone,supplierlocation,suppliertype,briefinfo,supplier_status) VALUES('$suppliername','$supplierphone','$supplierlocation','$suppliertype','$briefinfo','active')");

if($save_supplier)
{
	$message="New Supplier Saved";
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