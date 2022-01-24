<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>



<?php 
require ("db.php");
if( $_POST ){
    $data = $_POST['searchdata'];
    if ($data!=''){
    $sql= "select * from items where title like '%$data%'";

    $result = mysqli_query($con,$sql);
    while ($row = $result -> fetch_row()) {
        $id=$row[0];
        $title=$row[1];
        $price=$row[2];
        $description=$row[3];
        $image=$row[4];
        echo "<div class='col-md-4'><div class='thumbnail' style='height:300px' id='$id-div'> <img  src='images/$image' alt='image'>
          <div class='caption'><p style='text-align:center;'><b>$title</b></p><p style='text-align:center;color:#04B745;'><b>$price</b> <i style='color:red'>pkr</i><br><p>$description<p></p>
            <p style='text-align:center;color:#04B745;'>
            <input type='submit' id ='$id' class='btnDel' value='Delete'></p></div></div>
</div>";
       

}}}



?>
<script>

$(".btnDel").click(function(){
        $id=$(this).attr("id");
        $.post("deleteItem.php",{ id:$id},
        function(data,status){
            $("#"+$id+"-div").remove();
    });

    });

</script>