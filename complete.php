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
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$random=generateRandomString();

if( $_POST ){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<h2 style='color:white'>Thanks for ordering us</h2>";
    $query=$_SESSION['qty_array'];
    $id=$_SESSION['cart'];


for ($i=0; $i < count($query); $i++){
    $quantityz= current($query); //quantity
    $idz=current($id);  //id of item

    $quaa="select title,price from items where id='$idz'";
    $result = mysqli_query($con,$quaa);
    while ($row = $result -> fetch_row()) {
        $title=$row[0];
        $price=$row[1]*$quantityz;
    }
    $sss="insert into orders (orderid,name,Orderz,phone,address,quantity,price,cart) values ('$random','$name','$title','$phone','$address','$quantityz','$price','1')";
    $result1 = mysqli_query($con,$sss);

    next($query);
    next($id);
}

 
}