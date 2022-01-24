<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
</head>

<?php
session_start();
ob_start();
require ("db.php");
if( $_POST ){
  $oid=$_POST['orderID'];
  $name=$_POST['name'];
  $order=$_POST['orders'];
  $phone=$_POST['phone'];
  $address=$_POST['address'];
  $time=$_POST['time'];

  $sqql="select * from orders where orderid='$oid'";
  $result = mysqli_query($con,$sqql);
  while ($row = $result -> fetch_row()) {
    $name=$row[2];
    $order=$row[3];
    $phone=$row[4];
    $address=$row[5];
    $quantity=$row[6];
    $time=$row[7];
    $price=$row[8];
    $cart=$row[9];

  $sqlinsert="insert into previous_orders(orderid,name,Orderz,phone,address,time,price,cart) values ('$oid','$name','$order','$phone','$address','$time','$price','$cart')";
  mysqli_query($con,$sqlinsert);}

  $sql="Delete from orders where orderid='$oid'";
  $result = mysqli_query($con,$sql);

  }?>
<script>
  if (<?php echo $result?>==true){
      $("#<?php echo $oid?>-tr").remove();
  }
</script>
   
    