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
  $oId=$_POST['id'];
  $name=$_POST['name'];
  $phone=$_POST['phone'];
  $address=$_POST['address'];
  $time=$_POST['time'];

  
  $isPrevious=$_POST['previous'];

  echo "<div id='top'><h3 style='color:black;text-align:center'>Order details</h3><h5 style='float:right'>Tayyiba Cash & Carry</h5><div class='line'></div><br><span>Name:   </span><span>$name</span><br><span>Phone:  </span><span>$phone</span><br><span>Address:  </span><span>$address</span></div>";
  echo "<table style='text-align:center;background-color:white'>
  <tr><th>Item number</th><th>Title</th><th>Quantity</th><th>SubTotal</th><tr>";

  
  $total=0;
  $index=0;
  if ($isPrevious==0){
    $query = "SELECT Orderz,quantity,price,cart FROM orders where orderid='$oId'";
  }
  else{
    $query = "SELECT Orderz,quantity,price,cart FROM previous_orders where orderid='$oId'";
}
    $result = mysqli_query($con,$query);
        while ($row = $result -> fetch_row()) {
          $index+=1;
            $title=$row[0];
            $quantity=$row[1];
            $price=$row[2];
            $cart=$row[3];
            $total=$total+$price;
          if ($cart==1){
          echo "<tr><td>$index</td><td>$title</td><td>$quantity</td><td>$price</td></tr>";
        }
      else{
        echo "<tr><td>$index</td><td>$title</td><td></td><td></td><tr>";
      }}
      if ($cart==1){
        echo "<tr id='total'><td></td><td></td><td>Total</td><td><b>$total<b></td></tr>";
      }
      else{
        echo "<tr id='total'><td></td><td></td><td>Total</td><td><b><b></td></tr>";
      }     
}



    ?>
<table>
</div>

<style>
table, th, td {
  border: 1px solid black;
  text-align: center;
  height:40px;
}
#total{
  
  background-color: greenyellow;
}
table{
  width: 50%;
  margin-left: auto;
  margin-right: auto;
  overflow: hidden;
}
#top {
  margin-left: auto;
  margin-right: auto;
  overflow: hidden;
  width:50%;
  background-color: white;

}
span{
  font-size: 20px;
}
.line{
width: 112px;
height: 47px;
border-bottom: 1px solid black;
position: absolute;
}
</style>

   
    