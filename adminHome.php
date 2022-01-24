<?php
session_start();
ob_start();
require ('db.php');
if(!isset($_SESSION["username"])){
header("Location: admin.php");
exit(); 
}
?>

<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<style>
    .topnav {
  overflow: hidden;
  background-color: #333;
  margin-left: 2%;
  margin-right: 2%;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 15px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.active {
  background-color: #04AA6D;
  color: white;
}
</style>
<div class="topnav" id='topnavv'>
  <a class="a active" href="javascript:active()"  style="margin-left:3%">Active Orders</a>
  <a href="javascript:prev()" class="a">Previous Order</a>
  <a href="javascript:addItems()" class="a">Add items</a>
  <a href="javascript:viewItems()" class="a">View items</a>
  <a href="logout.php" style="margin-left:52%;background-color:red">logout</a></b>
</div>
<script>
    var header = document.getElementById("topnavv");
var btns = header.getElementsByClassName("a");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}

function prev(){
       $.post("previous_order.php",{ demo:"call"},
    function(data,status){
      $(".table-wrapper").html(data);
    });
   }
   function active(){
       $.post("active_orders.php",{ demo:"call"},
    function(data,status){
      $(".table-wrapper").html(data);
    });
   }
   function addItems(){
    $.post("add_items.php",{ demo:"call"},
    function(data,status){
      $(".table-wrapper").html(data);
    });
}
    function viewItems(){
    $.post("viewItems.php",{ demo:"call"},
    function(data,status){
      $(".table-wrapper").html(data);
    });
       
}

</script>

<div class="table-wrapper">
<table class="fl-table" style="margin-top:3%">
<thead><tr>
        <th>Serial</th>
        <th>OrderID</th>
        <th>Name</th>
        <th>Order</th>
        <th>Phone</th>
        <th>Address</th>
        <th>time</th></tr></thead>
<?php
	//Checking is user existing in the database or not
    $query = "SELECT * FROM `orders` GROUP BY orderid order by time desc";
    $result = mysqli_query($con,$query);
        while ($row = $result -> fetch_row()) {
            $serial=$row[0];
            $orderID=$row[1];
            $name=$row[2];
            $Orderz=$row[3];
            $phone=$row[4];
            $address=$row[5];
            $time=$row[7];
            echo "<tr id='$orderID-tr'><td id='$orderID-ss' class='serial'>$serial</td><td id='$orderID-id' class='idd'>$orderID</td><td id='$orderID-na' class='name'>$name</td><td id='$orderID-ord' class='orders'>$Orderz</td><td id='$orderID-ph' class='phone'>$phone</td><td id='$orderID-ad' class='address'>$address</td><td id='$orderID-ti' class='time'>$time</td><td><form  action='delete.php'><input type='submit' id='$orderID' class='button' value='Delete'></form></td>";
        }

    
?></table>
</div>

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
            $(".output").html(data);
        });});});

</script>



<style>
*{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;
    background: rgba( 71, 147, 227, 1);
}
h2{
    text-align: center;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: white;
    padding: 30px 0;
}

/* Table Styles */

.table-wrapper{
    margin: 10px 70px 70px;
    box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
}
tr:hover {
          background-color: #4FC3A1;
        }

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 100%;
    max-width: 100%;
    white-space: nowrap;
    background-color: white;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 12px;
}

.fl-table thead th {
    color: #ffffff;
    background: #4FC3A1;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}
.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

.fl-table thead th:nth-child(odd):hover {
    color: #ffffff;
    background-color: #4FC3A1;
}

.fl-table tr:nth-child(even):hover {
    background-color: #4FC3A1;
}


/* Responsive */

@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
        
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: center;
    }
}
    </style>
</body>
</html>