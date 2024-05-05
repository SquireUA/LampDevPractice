<?php
  $host = "localhost";
  $user = "root";
  $password = "";
  $dbname = "Rakan";
  $con = mysqli_connect($host, $user, $password, $dbname);
  if(mysqli_connect_errno($con))
  { 
    echo "<h1>Failed to connect to MySQL: " . mysqli_connect_error() ."</h1>";
  }
  session_start();
  $donate = $_POST['range'];
  $pj = $_POST['pj'];
  $email=$_SESSION["email"];
  $result = mysqli_query($con,"SELECT pricecollected  FROM `projects` WHERE ID='$pj'");
  while($row = mysqli_fetch_array($result)){
    $newprice = (int)$row['pricecollected'] + $donate;
    $sql = "UPDATE `projects` SET `pricecollected` = '$newprice' WHERE ID = '$pj'";
    if(!mysqli_query($con, $sql)){
      $_SESSION["wrongdonate"] = 1;
      header('Location:/project.php?pj='. $pj);
      die();
    }
  }
  $result = mysqli_query($con,"SELECT purse  FROM `accaunt` WHERE `Email` LIKE '$email'");
  while($row = mysqli_fetch_array($result)){
    $newpurse = (int)$row['purse'] - (int)$donate;
    echo "<h1>$newpurse</h1>";
    $sql = "UPDATE `accaunt` SET `purse` = '$newpurse' WHERE `accaunt`.`Email` = '$email'";
    if(!mysqli_query($con, $sql)){
      $_SESSION["wrongdonate"] = 1;
      header('Location:/project.php?pj='. $pj);
      die();
    }
  }
  header('Location:/project.php?pj='. $pj);
  die();
?>