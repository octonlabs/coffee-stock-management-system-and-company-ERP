<?php






if ($_SESSION['admin']=='1') {

if($_SESSION['authority']=='user')
{
	$identity = $_SESSION['user_id'];

$gt_info = mysqli_query($con,"SELECT * FROM staffinformation WHERE staff_code='$identity'");
$intel = mysqli_fetch_array($gt_info);

$_SESSION['managesupplies'] = htmlentities($intel['managesupplies']);
$_SESSION['managesuppliers'] = htmlentities($intel['managesuppliers']);
$_SESSION['manageproducts'] = htmlentities($intel['manageproducts']);
$_SESSION['managecustomers'] = htmlentities($intel['managecustomers']);
$_SESSION['manageparchment'] = htmlentities($intel['manageparchment']);
$_SESSION['processparchment'] = htmlentities($intel['processparchment']);
$_SESSION['managegreenbeans'] = htmlentities($intel['managegreenbeans']);
$_SESSION['processgreenbeans'] = htmlentities($intel['processgreenbeans']);
$_SESSION['manageexpenses'] = htmlentities($intel['manageexpenses']);
$_SESSION['managesales'] = htmlentities($intel['managesales']);
$_SESSION['managestaff'] = htmlentities($intel['managestaff']);
$_SESSION['accessreports'] = htmlentities($intel['accessreports']);


}



}

 


?>