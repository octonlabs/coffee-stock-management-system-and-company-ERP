<?php



if (isset($_POST['update_supplier'])) {
	// code...

if ($_SESSION['admin']=='1') {

if (($_SESSION['authority']=='superadmin') || (($_SESSION['managesuppliers']=='1'))) {
  // authorized to operate

$suppliername=mysqli_real_escape_string($con,$_POST['suppliername']);
$supplierphone=mysqli_real_escape_string($con,$_POST['supplierphone']);
$supplierlocation=mysqli_real_escape_string($con,$_POST['supplierlocation']);
$suppliertype=mysqli_real_escape_string($con,$_POST['suppliertype']);
$briefinfo=mysqli_real_escape_string($con,$_POST['briefinfo']);
$supplier_status=mysqli_real_escape_string($con,$_POST['supplier_status']);
$supplierid=mysqli_real_escape_string($con,$_POST['supplierid']);



$save_supplier = mysqli_query($con,"UPDATE suppliers SET suppliername='$suppliername',supplierphone='$supplierphone',supplierlocation='$supplierlocation',suppliertype='$suppliertype',briefinfo='$briefinfo',supplier_status='$supplier_status' WHERE id='$supplierid'");

if($save_supplier)
{
	$message="Supplier Information Updated";
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