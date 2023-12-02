<?php



if (isset($_POST['update_parchment'])) {
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
$parch_id=mysqli_real_escape_string($con,$_POST['parch_id']);

$gt_parch = mysqli_query($con,"SELECT * FROM parchment WHERE id='$parch_id'");
$parch = mysqli_fetch_array($gt_parch);
$remaining = htmlentities($parch['remaining']);

if($quantity<$remaining)
{
	$error="New Quantity Can Not Be Less Than Available Stock";
}
else
{

$save_supplier = mysqli_query($con,"UPDATE parchment SET supplier='$supplier',quantity='$quantity',unitprice='$unitprice',batchnumber='$batchnumber',handler='$handler',otherinfo='$otherinfo',remaining='$quantity' WHERE id='$parch_id' ");

if($save_supplier)
{
	$message=" Parchment Data Updated";
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