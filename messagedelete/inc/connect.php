<?php 
error_reporting(E_ALL); ini_set('display_errors',1);



mysqli_connect("0.0.0.0:8889","root","root") or die("couldn't connect 2 DB");

$linkcon=mysqli_connect("0.0.0.0:8889","root","root");

$dbselect= mysqli_select_db($linkcon,"messagedelete") or die("couldn't select DB");

 ?>