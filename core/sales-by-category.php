<?php
include('connection.php');
if (isset($_GET['sales-by-category'])) {

//by expenditure
  $gt_supplies = mysqli_query($con,"SELECT * FROM products ORDER BY RAND()");
  

  while ($row= mysqli_fetch_array($gt_supplies)) {
    // code...
$id =htmlentities($row['id']);
$gt_expense = mysqli_query($con,"SELECT SUM(amount) as amounts FROM sales WHERE productname='$id'");
$expense=mysqli_fetch_array($gt_expense);

$item_name=htmlspecialchars_decode($row['itemsupply']);
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