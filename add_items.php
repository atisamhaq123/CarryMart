<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link rel="stylesheet" href="style1.css">
<title>Add items</title>
</head>

<?php
session_start();
ob_start();
require ("db.php");?>

<body>
<img src='logo.png ' style='height:30%;width:26%; margin-top:0%;  margin-left: auto; margin-right: auto;display: block;'>
<div class="login-box">
    <form id='myform' enctype="multipart/form-data">
        
        <div class="user-box">
        
            <input type="text" id='name' name="title" placeholder="title" required>
            </div>   
            <div class="user-box">
       
            <input type="number" id='order' name="price" placeholder="price" required>
            </div>
            <div class="user-box">
         
            <input type="text" id='description' name="description" placeholder="description"> 
            <input type="file" name="imagee" value=""/>
            </div>
            <div class="user-box">
               

</div>
        <span></span><span></span><span></span><span></span><input type="submit" class='.btn' value='Add Now' style='color:black'>
        
</form>

<div id='output'></div>
<script>
    $(document).ready(function(e){
    // Submit form data via Ajax
    $("form").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'addItemNow.php',
            data: new FormData(this),
            dataType: 'html',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){},
            success: function(response){
                $("#output").html("<h2 style='color:white'>"+response+"</h2>");
            }
        });
    });
  
});
</script>