<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }

if(isset($_SESSION["username"])){
    if ($_SESSION["username"]=='adminshop7'){
    header("Location: adminHome.php");
    exit(); }}

?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
$(document).ready(function(){
    $("form").on("submit", function(event){
        event.preventDefault();
 
        var formValues= $(this).serialize();
        var actionUrl = $(this).attr("action");
 
        $.post(actionUrl, formValues, function(data){
            // Display the returned data in browser
            $(".login-box").html(data);
        });
    });
});
</script>



<head>
  <title>Tayibba CASH & CARRY</title>
  <link rel="stylesheet" href="style1.css">
</head>
<body>
  
<div class="container">
    <div class="panel">
      <div class="panel-inner">
        <div class="panel-front">
          <p>S</p>
        </div>
        <div class="panel-back">
          <p>S</p>
        </div>
      </div>
    </div>
    <div class="panel">
      <div class="panel-inner">
        <div class="panel-front">
          <p>H</p>
        </div>
        <div class="panel-back">
          <p>H</p>
        </div>

      </div>
    </div>
    <div class="panel">
      <div class="panel-inner">
        <div class="panel-front">
          <p>O</p>
        </div>
        <div class="panel-back">
          <p>O</p>
        </div>
      </div>
    </div>
    <div class="panel">
      <div class="panel-inner">
        <div class="panel-front">
          <p>P</p>
        </div>
        <div class="panel-back">
          <p>P</p>
        </div>

      </div>
    </div>
  </div>
  <img src='logo.png ' style='height:34%;width:30%; margin-top:0%;  margin-left: auto; margin-right: auto;display: flex;'>
<div class="login-box">
    <form id='myform' action="orderForm.php">
        <div class="user-box">
        
            <input type="text" id='1name' name="name" placeholder="name" required>
            </div>   
            
            <div class="user-box">
       
            <input type="text" id='order' name="order" placeholder="order here" required>
            </div>
            <div class="user-box">
         
            <input type="number" id='phone' name="phone" placeholder="phone" required> 
            </div>
            <div class="user-box">
        
            <input type="text" id='address' name="address" placeholder="address" required>

</div>
        <span></span><span></span><span></span><span></span><input type="submit" value='DONE' style='color:black'>
        
    </form>

    <div id="result"></div>
</div>




 



</html>
</body>


</html>