<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


<div style='text-align:right;background-color:red'>
<a href="quickOrder.php" style='color:white;font-size:20px;padding:20px'>Quick Order</a>
<a href="logout.php" style='color:white;font-size:20px;padding:20px'>logout</a>
</div>
</head>

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

<?php
require ("db.php");
	//initialize cart if not set or is unset
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
	}

	//unset qunatity
	unset($_SESSION['qty_array']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tayyiba Cash & Carry</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	
</head>
<body>
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
	      <a class="navbar-brand" href="#"></a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      	<li><div>
<form method='post' class='Searchform' >
<input type="text" placeholder="Search.." name="searchdata" id='searchField' style='height:30px'>
<button type="submit" id='searchBtn' style='height:30px'>Search</button> </form></div></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<li><a href="view_cart.php"><span class="badge"><?php echo count($_SESSION['cart']); ?></span> Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<span class="animate-charcter" style="float:center"> Tayyiba Cash & CARRY</span>
	<?php
		//info message
		if(isset($_SESSION['message'])){
			?>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-6">
					<div class="alert alert-info text-center">
						<?php echo $_SESSION['message']; ?>
					</div>
				</div>
			</div>
			<?php
			unset($_SESSION['message']);
		}
		//end info message
		//fetch our products	
		//connectio

		$sql = "SELECT * FROM items";
       
        $query = mysqli_query($con,$sql);
		$inc = 4;
		while($row = $query->fetch_assoc()){
            $id=$row['id'];
            $title=$row['title'];
            $price=$row['price'];
            //$description=$row[3];
            $image=$row['image'];
			$description=$row['description'];
            
			$inc = ($inc == 4) ? 1 : $inc + 1; 
			if($inc == 1) echo "<div class='row text-center'>";  
			?>
			<div class="col-sm-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row product_image">
							<img src="<?php echo 'images/'.$image ?>">
						</div>
						<div class="row product_name">
							<h4><?php echo $title; ?></h4>
						</div>
						<div class="row product_name">
							<h5><?php echo $description; ?></h5>
						</div>
						<div class="row product_footer">
							<p class="pull-left"><b><?php echo "<b style='color:red'>".$price."</b><i> pkr</i>"; ?></b></p>
							<span class="pull-right"><a href="add_cart.php?id=<?php echo $id; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Cart</a></span>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		if($inc == 1) echo "<div></div><div></div><div></div></div>"; 
		if($inc == 2) echo "<div></div><div></div></div>"; 
		if($inc == 3) echo "<div></div></div>";
		
		//end product row 


?>






























<script>
 $('.Searchform').submit(function(e){    
    e.preventDefault(); // Prevent Default Submission
    $.ajax({
    url: 'search.php',
    type: 'POST',
    data: $(this).serialize(), // it will serialize the form data
    dataType: 'html'
    })
    .done(function(data){   
        //changing button color 
        $(".container").html(data);
    })
    .fail(function(){
    alert('Ajax Submit Failed ...'); 
    });
    });


</script>

<style>

		.product_image{
			color:greenyellow; 
			height: 170px;
		}
		.product_name{
			height:80px; 
			padding-left:20px; 
			padding-right:20px;
		}
		.product_footer{
			padding-left:20px; 
			padding-right:20px;
		}
	
body{
    background-color:white;

}
img{
    width:50%;
    height:150px;
}
.col-sm-3, .panel-body{
    overflow: hidden;
}

.animate-charcter{
   text-transform: uppercase;
  background-image: linear-gradient(
    -225deg,
    #231557 0%,
    #44107a 29%,
    #ff1361 67%,
    #fff800 100%
  );
  background-size: auto auto;
  background-clip: border-box;
  background-size: 200% auto;
  color: #fff;
  background-clip: text;

  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: textclip 2s linear infinite;
  display: inline-block;
      font-size: 400%;
}

@keyframes textclip {
  to {
    background-position: 200% center;
  }
}

</style>