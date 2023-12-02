<?php

if (isset($_POST['login'])) {
	// code...

$email =mysqli_real_escape_string($con,$_POST['email']);
$password =mysqli_real_escape_string($con,$_POST['password']);

if($email=='user')
{
	$veri_user = mysqli_query($con,"SELECT *FROM staffinformation  WHERE staff_code='$password' && staff_status='active'");
	$verify_login = mysqli_num_rows($veri_user);
if($verify_login>0)
{

	$_SESSION['user_id']=$password;
	$_SESSION['admin']='1';
	$_SESSION['authority']='user';
echo "<script>window.location='dashboard.php'</script>";
}
else
{
	$error="Access Denied!";
}
}
else
{

//check email
$chk_email=mysqli_query($con,"SELECT * FROM admin_users WHERE email='$email'");
$ct_emails=mysqli_num_rows($chk_email);

if ($ct_emails>0) {
	// code...
	$row=mysqli_fetch_array($chk_email);
	$passkey=htmlentities($row['password']);
	$id=htmlentities($row['id']);
	if (password_verify($password, $passkey)) {
		// code...
		$_SESSION['authority']='superadmin';
		$_SESSION['admin']=$id;
		echo "<script>window.location='dashboard.php'</script>";
	}
	else
	{
		$error="Invalid Password !";
	}


}
else
{

	//email doesn't exist
	$error="Invalid User Name!";
}


}


}



?>