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
  $name = $_POST['createname'];
  $price = $_POST['createprice'];
  $bywho = $_SESSION["name"];
  $email = $_SESSION["email"];
  $description = $_POST['createdescription'];
  $pricetax = ($price / 100) * 10; 
  $sql = "INSERT INTO projects(nameofproject, bywho, priceneed, pricecollected, description) VALUES('$name', '$bywho', '$price','$pricetax','$description')";
  if(!mysqli_query($con, $sql))
  {
    $_SESSION["wrongcreate"] = 1;
    header('Location:/create.php');
    die();
  }else{
    $result = mysqli_query($con,"SELECT purse  FROM `accaunt` WHERE `Email` LIKE '$email'");
    while($row = mysqli_fetch_array($result))
    {
      $newpurse = ((int)$row['purse'] - (int)$pricetax);
      if($newpurse < 0){
        $_SESSION["wrongcreate"] = 1;
        header('Location:/create.php');
        die();
      }else{
        $sql = "UPDATE `accaunt` SET `purse` = '$newpurse' WHERE `accaunt`.`Email` = '$email'";
        if(!mysqli_query($con, $sql)){
          $_SESSION["wrongcreate"] = 1;
          header('Location:/create.php');
          die();
        }
      }
    }
    header('Location:/index.php');
    mysqli_close($con);
    die();
  }
?>