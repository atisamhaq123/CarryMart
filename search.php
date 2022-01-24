<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

<?php 
session_start();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();

}?>
<div class="container">
<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Tayyiba Cash & Carry</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      	<!-- left nav here -->
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<li><a href="view_cart.php"><span class="badge"><?php echo count($_SESSION['cart']); ?></span> Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
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
        echo "
        <div class='col-sm-3'>
				<div class='panel panel-default'>
					<div class='panel-body'>
						<div class='row product_image'>
							<img src='images/$image'>
						</div>
						<div class='row product_name'>
							<h4>".$title."</h4>
						</div>
						<div class='row product_footer'>
							<p class='pull-left'><b><b style='color:red'>".$price."</b><i> pkr</i></b></p>
							<span class='pull-right'><a href='add_cart.php?id=$id' class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-plus'></span> Cart</a></span>
						</div>
					</div>
				</div>
			</div>";
    
}}}
?>
</div>
<script>




</script>
<style>
body{
    background-color:rgb(200,120,100);

}
img{
    width: 100%;
    height:170px;
}
.col-sm-3, .panel-body{
    overflow: hidden;
}
.product_image{
	
    padding-left:20px; 
	padding-right:20px;
}
.product_name{
	height:80px; 
	padding-left:20px; 
	padding-right:20px;
}
.product_footer{
	padding-left:20px; 
	padding-right:20px;
    margin-right: 30px;
}

</style>