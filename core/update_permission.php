<?php

if (isset($_POST['update_permission'])) {
	// code...
if ($_SESSION['admin']=='1') {
       
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managestaff']=='1'))) {
  // authorized to operate
  

$managesupplies=mysqli_real_escape_string($con,$_POST['managesupplies']);
$managesuppliers=mysqli_real_escape_string($con,$_POST['managesuppliers']);
$manageproducts=mysqli_real_escape_string($con,$_POST['manageproducts']);
$managecustomers=mysqli_real_escape_string($con,$_POST['managecustomers']);
$manageparchment=mysqli_real_escape_string($con,$_POST['manageparchment']);
$processparchment=mysqli_real_escape_string($con,$_POST['processparchment']);
$managegreenbeans=mysqli_real_escape_string($con,$_POST['managegreenbeans']);
$processgreenbeans=mysqli_real_escape_string($con,$_POST['processgreenbeans']);
$managesales=mysqli_real_escape_string($con,$_POST['managesales']);
$manageexpenses=mysqli_real_escape_string($con,$_POST['manageexpenses']);
$managestaff=mysqli_real_escape_string($con,$_POST['managestaff']);
$accessreports=mysqli_real_escape_string($con,$_POST['accessreports']);
$staffcode=mysqli_real_escape_string($con,$_POST['staffcode']);




$update_staff_permissions = mysqli_query($con,"UPDATE staffinformation SET managesupplies='$managesupplies', managesuppliers='$managesuppliers',manageproducts='$manageproducts',managecustomers='$managecustomers',manageparchment='$manageparchment',processparchment='$processparchment',managegreenbeans='$managegreenbeans',processgreenbeans='$processgreenbeans',managesales='$managesales',manageexpenses='$manageexpenses',managestaff='$managestaff',accessreports='$accessreports' WHERE id='$staffcode'");
if($update_staff_permissions)
{
	$message="Staff Permissions Updated Successfully";
}
else
{
	$error="Database Uplink Failure!";
}




}
else
{
	$error="Access Denied";
}




}

else
{

//not logged in
	echo "<script>window.location='logout.php'</script>";

}

}

?>