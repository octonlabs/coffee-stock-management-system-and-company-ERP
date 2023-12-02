<?php
include('connection.php');
if (isset($_GET['grades-enlist'])) {

//by expenditure
  $gt_supplies = mysqli_query($con,"SELECT * FROM coffee_grades ORDER BY RAND()");
  

  while ($row= mysqli_fetch_array($gt_supplies)) {
    // code...
$id =htmlentities($row['id']);
$gt_expense = mysqli_query($con,"SELECT SUM(remaining) as amounts FROM green_beans WHERE coffeegrade='$id'");
$expense=mysqli_fetch_array($gt_expense);



$item_name=htmlspecialchars_decode($row['coffeegrade']);
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