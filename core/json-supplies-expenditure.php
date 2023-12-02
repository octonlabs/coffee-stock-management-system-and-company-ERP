<?php
include('connection.php');
if (isset($_GET['supplies_by_expenditure'])) {

//by expenditure
  $gt_supplies = mysqli_query($con,"SELECT * FROM supplies ORDER BY RAND()");
  

  while ($row= mysqli_fetch_array($gt_supplies)) {
    // code...
$id =htmlentities($row['id']);
$gt_expense = mysqli_query($con,"SELECT SUM(amount) as amounts FROM expenses WHERE productname='$id'");
$expense=mysqli_fetch_array($gt_expense);


$item_name=htmlentities($row['itemsupply']);
$item_status=htmlentities($row['status']);
$item_cost =htmlentities($expense['amounts']);



$body =   array("label"=>$item_name, 
  "symbol" => "".$item_name." (".$item_status.")",
  "y"=>$item_cost);
  
  
$data[] = $body;
  }
echo json_encode($data);
	// code...


 


}


?>