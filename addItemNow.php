<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
</head>
<?php 
require ("db.php");
$uploadDir = 'images/';
$response['message']='Error';
$fileName='';
// If form is submitted 
if(isset($_POST['title']) || isset($_POST['price']) || isset($_POST['imagee'])){ 
            $uploadedFile = ''; 

            $title=$_POST['title'];
            $price=$_POST['price'];
            $description=$_POST['description'];
            $fileName = basename($_FILES["imagee"]["name"]);


            if(!empty($_FILES["imagee"]["name"])){ 
                 
                // File path config 
                $fileName = basename($_FILES["imagee"]["name"]); 
                $targetFilePath = $uploadDir . $fileName; 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                 
                // Allow certain file formats 
                $allowTypes = array('jpg', 'png', 'jpeg'); 
                if(in_array($fileType, $allowTypes)){
                    $uploadStatus = 0; 
                    // Upload file to the server 
                    if(move_uploaded_file($_FILES["imagee"]["tmp_name"], $targetFilePath)){ 
                        $uploadStatus = 1;
                        $uploadedFile = $fileName; 
                    }else{ 
                        $uploadStatus = 0; 
                        $response['message'] = 'Sorry, there was an error uploading your file.'; 
                    } 
                }else{ 
                    $uploadStatus = 0; 
                    $response['message'] = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.'; 
                } 
            
             
            if($uploadStatus == 1){ 
                $response['message']='item added successfully';
            } 
            //insert data into database
            $query = "INSERT INTO items(title,price,description,image) values ('$title','$price','$description','$fileName')";
            $result = mysqli_query($con,$query);    
        }
        else{
            $query = "INSERT INTO items(title,price,description) values ('$title','$price','$description')";
            $result = mysqli_query($con,$query);  
            $response['message']='item added successfully'; 
        }
 
    }
echo $response['message'];
?>
