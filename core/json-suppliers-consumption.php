<?php
include('connection.php');
if (isset($_GET['suppliers_by_consumption'])) {

//by expenditure
  $gt_supplies = mysqli_query($con,"SELECT * FROM suppliers ORDER BY RAND()");
  

  while ($row= mysqli_fetch_array($gt_supplies)) {
    // code...
$id =htmlentities($row['id']);
$gt_expense = mysqli_query($con,"SELECT COUNT(quantity) as amounts FROM expenses WHERE customer='$id'");
$expense=mysqli_fetch_array($gt_expense);



$item_name=htmlentities($row['suppliername']);
$item_status=htmlentities($row['supplier_status']);
$item_cost =htmlentities($expense['amounts']);

 

$body =   array("label"=>$item_name, 
  "symbol" => "". $item_name."",
  "y"=>$item_cost);
  
  
$data[] = $body;
  }
echo json_encode($data);
  // code...


 


}


?>