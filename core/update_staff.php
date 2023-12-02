<?php

if (isset($_POST['update_staff'])) {
	// code...
if ($_SESSION['admin']=='1') {
              


       
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managestaff']=='1'))) {
  // authorized to operate
  

$staffname=mysqli_real_escape_string($con,$_POST['staffname']);
$staff_status=mysqli_real_escape_string($con,$_POST['staff_status']);
$staffposition=mysqli_real_escape_string($con,$_POST['staffposition']);
$staffallowances=mysqli_real_escape_string($con,$_POST['staffallowances']);
$staffsalary=mysqli_real_escape_string($con,$_POST['staffsalary']);
$otherinfo=mysqli_real_escape_string($con,$_POST['otherinfo']);
$staff_id=mysqli_real_escape_string($con,$_POST['staff_id']);

if (!empty($_FILES['staffimage']['tmp_name'])) {
	// code...
	$file_name = $_FILES['staffimage']['name'];
	$new_file_name=$staffname.'-'.md5(rand(10,10000)).'-'.(basename($_FILES['staffimage']['name']));
	$migrate_file = $_FILES['staffimage']['tmp_name'];
	$directory = 'uploads/staffimages/';
	$destination = $directory.$new_file_name;
	//echo$destination;
	$upload = move_uploaded_file($migrate_file, $destination);

} else {
	// code...
	$new_file_name=mysqli_real_escape_string($con,$_POST['staffimageold']);
	$upload="myname";
}



//upload staff image

	if ($upload) {

if (!empty($_FILES['staffcv']['tmp_name'])) {
	// code...
	//upload staff CV
$file = $_FILES['staffcv']['name'];
	$new_file=$staffname.'-'.md5(rand(10,10000)).'-'.(basename($_FILES['staffcv']['name']));
	$migrate = $_FILES['staffcv']['tmp_name'];
	$director = 'uploads/staffcvs/';
	$destinatio = $director.$new_file;
	$uploads = move_uploaded_file($migrate, $destinatio);
	
} else {
	// code...
	$new_file=mysqli_real_escape_string($con,$_POST['staffcvold']);
	$uploads="myname";
}
//echo$staff_id;


	if ($uploads) {
		// code...
$staff_code=rand(1001,100000);
//save staffinformation
		$query = mysqli_query($con,"UPDATE staffinformation  SET staffname='$staffname',staffposition='$staffposition',staffallowances='$staffallowances',staffsalary='$staffsalary',staffimage='$new_file_name',staffcv='$new_file',otherinfo='$otherinfo',staff_status='$staff_status',staff_code='$staff_code' WHERE id='$staff_id'");
		if ($query) {
			// code...
			$message="Staff Information Updated Successfully";
		}
		else
		{
			$error="Database Uplink Failure!";
		}


	}
	else
{
	$error="CV Upload Failed!";
}



}
else
{
	$error="Image Upload Failed!";
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