<?php
session_start();
ob_start();
require ("db.php");
function generateRandomString($length = 10) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

if( $_POST ){

  $random=generateRandomString();
  $name=$_POST['name'];
  $order=$_POST['order'];
  $phone=$_POST['phone'];
  $address=$_POST['address'];
  
   $sql="insert into orders (orderid,name,Orderz,phone,address) values ('$random','$name','$order','$phone','$address')";
   $result = mysqli_query($con,$sql);
  
   echo "<table>";
   echo "<tr></td><td><h2 style='color:white'>Order Placed</h2></td></tr>";
   echo "<tr><td><h4 style='color:white'>Name</h4></td><td><h4 style='color:black'>$name</h4></td></tr>";
   echo "<tr><td><h4 style='color:white'>order</h4></td><td><h4 style='color:black'>$order</h4></td></tr>";
   echo "<tr><td><h4 style='color:white'>phone</h4></td><td><h4 style='color:black'>$phone</h4></td></tr>";
   echo "<tr><td><h4 style='color:white'>address</h4></td><td><h4 style='color:black'>$address</h4></td></tr>";
   echo "<tr><td><a href='index.php' style='color:white'>Go back</a></td></tr>";
   echo "<tr><td></table>";

}
    ?>

   
    