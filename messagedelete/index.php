<?php

include("./inc/connect.php");

//echo nl2br(print_r($_SESSION,true));
  ?>



<!DOCTYPE html>
<html>
<head>
	<title>delete the messages</title>

	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>

	 <link href="css/style.css" rel="stylesheet">


</head>


	<body>

    <div class="row">

      <div class="col-md-2">

   <!--  <div class="sidenav">
    
  <a href="#about">NEW MESSAGE</a>
  <a href="#services">Services</a>
  <a href="#clients">Clients</a>
  <a href="#contact">Contact</a>
  <?php echo date('Y-m-d H:i:s') ?>

</div> -->

</div>

<div class="col-md-6" style='padding-top:35px';>

<div class="main">
  <h2> vergisses </h2>

  <?php $a="http://www.whatagreat.world/deletemessage/message.php/6eaf9b4ca7fa1ea697db67461d1b6544" ;

  echo(substr($a,54))?>

  <?php
// define variables and set to empty values
$messageErr =  $howlongErr =  "";
$message =  $howlong =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["message"])) {
    $messageErr = "Message is required";
  } else {
    $message = test_input($_POST["message"]);
  }
  
  if (empty($_POST["howlong"])) {
    $howlongErr = "Please choose how long it will be visible";
  } else {
    $howlong = test_input($_POST["howlong"]);
  }
    
 }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>



<?php $link=md5(uniqid(rand(), true)) ?>

 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">


  <div class="form-group">
    
    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
  	<span class="error">* <?php echo $messageErr;?></span>
  <textarea rows="8" type="text" name="message" id="message" class="md-textarea form-control" rows="3" placeholder=".....write your deletable message here" style=" margin-top: 10px;
  margin-left: 50px;
  width: 500px;
  height: 150px;
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.07);
  border-color: -moz-use-text-color #FFFFFF #FFFFFF -moz-use-text-color;
  border-image: none;
  border-radius: 6px 6px 6px 6px;
  border-style: none solid solid none;
  border-width: medium 1px 1px medium;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.12) inset;
  color: #555555;
  font-size: 1em;
  line-height: 1.4em;
  padding: 5px 8px;
  transition: background-color 0.2s ease 0s;"></textarea>
 
</div>
<!--Textarea with icon prefix-->
<div class="form-group">
<div class="upload-btn-wrapper">
  <button class="btn">Upload a Pic</button>
  <input  id="pic" name="pic" id="fileToUpload" type="file" name="myfile" />
</div>
</div>

  

    <div class="form-group">
    <label for="howlong">How long shall it be available?</label> <span class="error">* <?php echo $howlongErr;?></span>
    <select class="form-control" name='howlong' id="exampleFormControlSelect1">
      <option value="1" > Until first view </option>
      <option value="2"> 10 minutes</option>
      <option value="3"> 2 hours</option>
      <option value="4" > 24 hours</option>
      <option value="5">keep it open and answerable (email needed)</option>
    </select>

  

</div>

 <div class="md-form">
 
  <input  type="email" name="email"  class="md-textarea form-control"  placeholder="if you want emailadress">
 
</div> 

<input type="hidden" name="link" value="<?php echo $link ?>" >

<input type="hidden" name="created_at" value="<?php echo(time()) ?>" >
<hr>
<div class="form-group">
  <input type="submit" class="btn btn-default" name="submit" Value="Send">
</div>
  </form>

  <?php 

  if(isset($_POST['submit'])){


  $message=$_POST['message'];
  $howlong=$_POST['howlong'];
  $email=$_POST['email'];
  $link=$_POST['link'];
 ;
 



if(empty($_FILES['pic'])){
	$picpath=0;}


else{
$target_dir = "img/";
$picpath1 = $target_dir . basename($_FILES["pic"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($picpath1,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

 $check = getimagesize($_FILES["pic"]["tmp_name"]);
 if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        $picpath=basename($_FILES["pic"]["name"]);

    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }


	if ($_FILES["pic"]["size"] > 500000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}	
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

	if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["pic"]["tmp_name"], $picpath1)) {
        echo "The file ". basename( $_FILES["pic"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
	
	}


		











  $sql = "INSERT INTO messages (message, picpath, howlong, email, link, created_at) VALUES ('$message','$picpath','$howlong', '$email','$link', now())";


 

 if (mysqli_query($linkcon, $sql)) {
    echo "New record created successfully"; echo $picpath; echo "http://0.0.0.0:8000/"; echo($link);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($linkcon);
}

mysqli_close($linkcon);

}
   


 ?>




 </div>
 </div>




<div class="col-md-2" style="padding-top:35px;"> 

  
   </div>

</div>

<div class="link" style="background-color:tomato">  

  <?php if(isset($_POST['link'])){

   $sharablelink="localhost:8000/message.php/".$_POST['link'];}
   else{
   $sharablelink="";}

  if($sharablelink!==""){
  echo ("<p><a href='");echo $sharablelink; echo("'>");echo($sharablelink);echo("</a></p><p><a href='whatsapp://send?text=The text to share!'' data-action=''>Share via Whatsapp</a>'");}
   ?> </div>

   <div class="footer">footer</div>








     
</body>




</html>