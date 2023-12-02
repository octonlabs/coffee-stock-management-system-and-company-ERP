<?php



if (isset($_POST['update_sale'])) {
	// code...
if ($_SESSION['admin']=='1') {

if (($_SESSION['authority']=='superadmin') || ( ($_SESSION['managesales']=='1'))) {
  // authorized to operate


$customer=mysqli_real_escape_string($con,$_POST['customer']);
$receiptnumber=mysqli_real_escape_string($con,$_POST['receiptnumber']);
$productname=mysqli_real_escape_string($con,$_POST['productname']);
$handler=mysqli_real_escape_string($con,$_POST['handler']);
$quantity=mysqli_real_escape_string($con,$_POST['quantity']);
$unitprice=mysqli_real_escape_string($con,$_POST['unitprice']);
$otherinfo=mysqli_real_escape_string($con,$_POST['otherinfo']);
$amount=mysqli_real_escape_string($con,$_POST['amount']);
//$status=mysqli_real_escape_string($con,$_POST['status']);
$total_p = $quantity*$unitprice;
if($amount >= $total_p)
{
	$status = "paid";
}
elseif($amount=="0")
{
$status = "unpaid";
}
else
{
$status ="partial";
}

 


$save_supplier = mysqli_query($con,"UPDATE sales SET customer='$customer',receiptnumber='$receiptnumber',productname='$productname',handler='$handler',otherinfo='$otherinfo',quantity='$quantity',unitprice='$unitprice',status='$status',amount='$amount' WHERE receiptnumber='$receiptnumber'");

if($save_supplier)
{
	$message="Sale Update Complete.";
}
else
{
	$error="Database Uplink Failure!";
}


 }
 else
 {
 	$error="Access Denied !";
 }



}
else
{

//not logged in
	echo "<script>window.location='logout.php'</script>";

}


}




?>