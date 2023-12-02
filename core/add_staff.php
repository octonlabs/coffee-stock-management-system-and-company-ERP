<?php

if (isset($_POST['add_staff'])) {
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


$gt_cust = mysqli_query($con,"SELECT * FROM staffinformation WHERE staffname='$staffname'");
$customer = mysqli_num_rows($gt_cust);
$cust_status = $customer;

if ($cust_status>0) {
	// code...
	$error="Staff Already Exists";
} else {
	// code...


//upload staff image
$file_name = $_FILES['staffimage']['name'];
	$new_file_name=$staffname.'-'.md5(rand(10,10000)).'-'.(basename($_FILES['staffimage']['name']));
	$migrate_file = $_FILES['staffimage']['tmp_name'];
	$directory = 'uploads/staffimages/';
	$destination = $directory.$new_file_name;
	//echo$destination;
	$upload = move_uploaded_file($migrate_file, $destination);
	if ($upload) {


//upload staff CV
$file = $_FILES['staffcv']['name'];
	$new_file=$staffname.'-'.md5(rand(10,10000)).'-'.(basename($_FILES['staffcv']['name']));
	$migrate = $_FILES['staffcv']['tmp_name'];
	$director = 'uploads/staffcvs/';
	$destinatio = $director.$new_file;
	$uploads = move_uploaded_file($migrate, $destinatio);
	$staff_code=rand(1001,100000);
	if ($uploads) {
		// code...

//save staffinformation
		$query = mysqli_query($con,"INSERT INTO staffinformation(staffname,staffposition,staffallowances,staffsalary,staffimage,staffcv,otherinfo,staff_status,staff_code) VALUES('$staffname','$staffposition','$staffallowances','$staffsalary','$new_file_name','$new_file','$otherinfo','$staff_status','$staff_code')");
		if ($query) {
			// code...
			$message="New Staff Information Added Successfully";
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