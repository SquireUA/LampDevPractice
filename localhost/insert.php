<?php
  $host="localhost"; //Add your SQL Server host here
  $user="root"; //SQL Username
  $pass=""; //SQL Password
  $dbname="Rakan"; //SQL Database Name
  $con=mysqli_connect($host,$user,$pass,$dbname);
  if (mysqli_connect_errno($con))
  {
    echo "<h1>Failed to connect to MySQL: " . mysqli_connect_error() ."</h1>";
  }
  session_start();
  $message = $_POST['mess'];
  $name = $_SESSION["name"];
  $email = $_SESSION["email"];
  $answer = $_POST["idanswer"];
  $idofproject = $_POST["idofproject"];
  $sql="INSERT INTO GuestBook(Name,Email,idofproject,Massege,Answer) VALUES('$name','$email','$idofproject','$message','$answer')";
  if (!mysqli_query($con,$sql))
  {
    die('Error: ' . mysqli_error($con));
  }
  header('Location:/project.php?pj=' . $idofproject);
  mysqli_close($con);
  die();
?>