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
    $id=$_POST["id"];
  $sql="Delete from items where id='$id'";
  $result = mysqli_query($con,$sql);
}
    ?>


<script>

$(".btnDel").click(function(){
    $id=$(this).attr("id");
    alert($id);
});</script>
    