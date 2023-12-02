<?php
include('connection.php');
if (isset($_GET['products_by_consumption'])) {

//by expenditure
  $gt_supplies = mysqli_query($con,"SELECT * FROM products ORDER BY RAND()");
  

  while ($row= mysqli_fetch_array($gt_supplies)) {
    // code...
$id =htmlentities($row['id']);
$gt_expense = mysqli_query($con,"SELECT SUM(quantity) as amounts FROM sales WHERE productname='$id'");
$expense=mysqli_fetch_array($gt_expense);


$item_name=htmlentities($row['itemsupply']);
$item_status=htmlentities($row['status']);
$item_cost =htmlentities($expense['amounts']);
$unitmeasurement=htmlentities($row['unitmeasurement']);


$body =   array("label"=>$item_name, 
  "symbol" => "". $item_name ." (" .$unitmeasurement  .")",
  "y"=>$item_cost);
  
  
$data[] = $body;
  }
echo json_encode($data);
  // code...


 


}


?>