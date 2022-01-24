<html>
<head>
  <title>Tayibba CASH & CARRY</title>
  <link rel="stylesheet" href="style1.css">
  
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
</head>

<body>
<?php 
session_start();
ob_start();

$query=$_SESSION['qty_array'];
$id=$_SESSION['cart'];


?>
<img src='logo.png ' style='height:39%;width:35%; margin-top:0%;  margin-left: auto; margin-right: auto;display: block'>
<div class="login-box" style='overflow:hidden;height:350px'>
<span style='margin-left:30%;margin-right:auto'>Add details</span>
    <form id='myform' action="complete.php">
        
        <div class="user-box">
        
            <input type="text" id='1name' name="name" placeholder="name" required>
            </div>   
    
            <div class="user-box">
         
            <input type="number" id='phone' name="phone" placeholder="phone" required> 
            </div>
            <div class="user-box">
        
            <input type="text" id='address' name="address" placeholder="address" required>

</div>
        <span></span><span></span><span></span><span></span><input type="submit" value='DONE' style='color:black'>
        
    </form>

</body>

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
</html>
<div class='alpha' style='color:red' hidden></div>

