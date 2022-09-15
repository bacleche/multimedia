<?php
$conn=mysqli_connect("localhost","root","","lic2a") or die(mysql_error());
$num_etud=$_GET['id'];
mysqli_query($conn,"DELETE FROM etudiants WHERE num_etud=$num_etud") or die(mysql_error());
header("location:espace.php");
 ?>