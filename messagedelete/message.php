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


	<body style="background: #F0F0F0;">

		<? $link= substr($_SERVER['REQUEST_URI'],13) ?>

		<?php $sql = "SELECT message, email, deleted_at, created_at,picpath,howlong FROM messages WHERE link='$link'"; 
  		$result = mysqli_query($linkcon, $sql);
  		$message=mysqli_fetch_array($result,MYSQLI_ASSOC);

  		

  		if($message['howlong']==1){

  		if($message['deleted_at']!== NULL){
  			$okaytoread=0;
  			echo("<div style='padding-top:50px; margin-top:50px' class='alert alert-secondary' role='alert'>
  sorry, this Message already expired </div>"); }

  			else{

  		

  		$sql1="UPDATE messages SET deleted_at = now() WHERE link='$link'";
  		
  		

		$okaytoread=1;	
  		}
  		}


  		

  		if($message['howlong']==2){
  			//10 minutes

  			

  			if(strtotime(date('Y-m-d H:i:s')) - strtotime($message['created_at']) > 600  ){
  			echo("<div style='padding-top:50px; margin-top:50px' class='alert alert-secondary' role='alert'>
  sorry, this Message already expired after 10 minutes </div>"); ; $okaytoread=0;}
  			else{
  				$okaytoread=1;	

  		$sql2="UPDATE messages SET reat = +1 WHERE link='$link'";
  		
  		
			
  		}
  		}


  		if($message['howlong']==3){
  			//2 hours 72000


  			if(strtotime(date('Y-m-d H:i:s')) - strtotime($message['created_at']) > 7200  ){
  			echo("<div style='padding-top:50px; margin-top:50px' class='alert alert-secondary' role='alert'>
  sorry, this Message already expired after 2 hours </div>"); ; $okaytoread=0;}
  			else{
  				$okaytoread=1;	

  		$sql2="UPDATE messages SET reat = +1 WHERE link='$link'";
  		
			
  		}
  		}

  		if($message['howlong']==4){
  			//24 hours 86400


  			if(strtotime(date('Y-m-d H:i:s')) - strtotime($message['created_at']) > 86400  ){
  			echo("<div style='padding-top:50px; margin-top:50px' class='alert alert-secondary' role='alert'>
  sorry, this Message already expired after 24 hours </div>"); ; $okaytoread=0;}
  			else{
  				$okaytoread=1;	

  		$sql2="UPDATE messages SET reat = +1 WHERE link='$link'";
  	
			
  		}
  		}





  		?>


<?php if($okaytoread==1) { ?>
<div class="row" style="margin-top: 3rem;">
	<div class="col-md-4"> <a href="../index.php">New Message</a></div>
	<div class="col-md-4">

<div class="card" style="width: 18rem; background-color:grey; color:white">
	<?php if(	$message['picpath']!==""){ ?>
  <img class="card-img-top" src="../img/<?php echo ($message['picpath']) ?>" alt="Card image cap"><?php }?>
  <div class="card-body">
 
    <p class="card-text"> </p>
     <div class="container" style="  clear: both;
  position: relative;">
  
  <div class="message-body">
    <p><?php echo $message['message']; ?></p>
  </div>
</div>
  <?php echo date('m/d/Y', $_SERVER['REQUEST_TIME']); ?>
  <p><?php echo ($message['email']) ?></p>
 
  </div>
</div>
</div>

<div class="col-md-4"></div>




</div>




<?php } ?>





 