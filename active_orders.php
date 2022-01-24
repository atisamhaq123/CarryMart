<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
</head>
<table class="fl-table" style="margin-top:3%">
<thead><tr><th>Serial</th><th>OrderID</th>
        <th>Name</th>
        <th>Order</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Order-time</th></tr></thead>

<?php
session_start();
ob_start();
require ("db.php");
if( $_POST ){
    $query = "SELECT * FROM orders GROUP BY orderid order by time desc";
    $result = mysqli_query($con,$query);
        while ($row = $result -> fetch_row()) {
            $serial=$row[0];
            $orderID=$row[1];
            $name=$row[2];
            $Orderz=$row[3];
            $phone=$row[4];
            $address=$row[5];
            $time=$row[7];
            echo "<tr id='$orderID-tr'><td id='$orderID-ss' class='serial'>$serial</td><td id='$orderID-id' class='idd'>$orderID</td><td id='$orderID-na' class='name'>$name</td><td id='$orderID-ord' class='orders'>$Orderz</td><td id='$orderID-ph' class='phone'>$phone</td><td id='$orderID-ad' class='address'>$address</td><td id='$orderID-ti' class='time'>$time</td><td><form  action='delete.php'><input type='submit' id='$orderID' class='button' value='Delete'></form></td></tr>";
        }
}
    ?>
</table>

<script>
$(".serial").click(function (){const text=$(this).attr('id');$orderID =text.split("-")[0]; fun($orderID)});
$(".idd").click(function (){const text=$(this).attr('id');$orderID =text.split("-")[0]; fun($orderID)});
$(".name").click(function (){const text=$(this).attr('id');$orderID =text.split("-")[0]; fun($orderID)});
$(".orders").click(function (){const text=$(this).attr('id');$orderID =text.split("-")[0]; fun($orderID)});
$(".phone").click(function (){const text=$(this).attr('id');$orderID =text.split("-")[0]; fun($orderID)});
$(".address").click(function (){const text=$(this).attr('id');$orderID =text.split("-")[0]; fun($orderID)});
$(".time").click(function (){const text=$(this).attr('id');$orderID =text.split("-")[0]; fun($orderID)});

function fun($oID){
    $id=$("#"+$oID+"-id").text();
    $name=$("#"+$oID+"-na").text();
    $orders=$("#"+$oID+"-ord").text();
    $phone=$("#"+$oID+"-ph").text();
    $address=$("#"+$oID+"-ad").text();
    $time=$("#"+$oID+"-ti").text();
    alert($id);
    $.post("order_details.php",{
   id: $id,
   name: $name,
   orders: $orders,
   phone: $phone,
   address: $address,
   time: $time,
   previous:0
 },
 function(data,status){
    $(".table-wrapper").html(data);
 });
}

$(document).ready(function(){
    $('.button').click(function(){
   $orderID=$(this).attr('id');
   });

   //
    $("form").on("submit", function(event){
        alert($orderID);

       $namee=$("#"+$orderID+"-na").text();
       $orderss=$("#"+$orderID+"-ord").text();
       $phonee=$("#"+$orderID+"-ph").text();
       $addresss=$("#"+$orderID+"-ad").text();
       $timee=$("#"+$orderID+"-ti").text();

          event.preventDefault();
        var formValues= $(this).serialize()+"&orderID="+$orderID+"&name="+$namee+"&orders="+$orderss+"&phone="+$phonee+"&address="+$addresss+"&time="+$timee;
        var actionUrl = $(this).attr("action");
        $.post(actionUrl, formValues, function(data){
            // Display the returned data in browser
            $('').html(data);
            $("#"+$orderID+"-tr").remove();
        });});});
</script>






    </html>
   
    