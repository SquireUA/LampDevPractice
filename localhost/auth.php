<?php

      $host="localhost"; //Add your SQL Server host here
      $user="root"; //SQL Username
      $password=""; //SQL Password
      $dbname="Rakan"; //SQL Database Name
      $con=mysqli_connect($host,$user,$password,$dbname);
      $email = $_POST['logemail'];
      $pass = $_POST['logpass'];
      if (mysqli_connect_errno($con))
      {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      session_start();
      $result = mysqli_query($con,"SELECT Name,Email,Password,purse  FROM accaunt");
      while($row = mysqli_fetch_array($result)){
      	if($row['Email'] == $email && $row['Password'] == $pass){
            $_SESSION["email"] = $email;
            $_SESSION["name"] = $row['Name'];
            header('Location:/index.php');
            die();
      	}
      }
      header('Location:/reglog.php');
      $_SESSION["wronglog"] = 1;
      mysqli_close($con);
      die();


?>