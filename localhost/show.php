<?php
    function show($answer, $name, $id){
  	    $host="localhost"; //Add your SQL Server host here
        $user="root"; //SQL Username
        $pass=""; //SQL Password
        $dbname="Rakan"; //SQL Database Name
        $con=mysqli_connect($host,$user,$pass,$dbname);
        if (mysqli_connect_errno($con))
        {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $result = mysqli_query($con,"SELECT ID,Name,Massege,datatime,Answer FROM GuestBook WHERE idofproject = $id");
        while($row = mysqli_fetch_array($result))
        { 
            if($row['Answer'] == $answer || $row['Answer'] == $answer){
                ?>
                <div class="comment">
                  <button class="answer" onclick="Answer(<?php echo $row['ID']?>)"></button>
                  <?php
                  if($answer != null){
                  ?>
                    <img class="ans" src="image/answer2.png" width="90px" height="90px">
                    <?php
                  }
                  ?>
                  <img class="ava" src="image/log.png" height="50px" width="50px">
                  <p class="name"><?php echo $row['Name']; ?></p>
                  <p class="time"><?php echo $row['datatime']; ?><?php 
                  if($answer != null){
                  	echo (' to: ');
                  	echo $name; 
                  } ?></p>
                  <p class="mess"><?php echo $row['Massege']; ?></p>
                </div>
                <?php
                show($row['ID'], $row['Name'], $id);  
            } 
        } 
        mysqli_close($con);
    }
    function showpjlist(){
        $host="localhost"; //Add your SQL Server host here
        $user="root"; //SQL Username
        $pass=""; //SQL Password
        $dbname="Rakan"; //SQL Database Name
        $con=mysqli_connect($host,$user,$pass,$dbname);
        if (mysqli_connect_errno($con))
        {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $result = mysqli_query($con,"SELECT ID, nameofproject, bywho, priceneed, pricecollected, description FROM projects");
        while($row = mysqli_fetch_array($result))
        { ?>
            <div class = "comment">
                <a href = "project.php?pj=<?php echo $row['ID']?>"><p class="name"><?php echo $row['nameofproject']; ?></p></a>
                <p class="time">by: <?php echo $row['bywho']; ?></p>
                <p class="collprice">Collected <?php echo $row['pricecollected'];?> / <?php echo $row['priceneed'];?></p>
            </div>
        <?php
        } 
        mysqli_close($con);
    }  
    function showpj($pj){
        $host="localhost"; //Add your SQL Server host here
        $user="root"; //SQL Username
        $pass=""; //SQL Password
        $dbname="Rakan"; //SQL Database Name
        $email = $_SESSION["email"];
        $con=mysqli_connect($host,$user,$pass,$dbname);
        if (mysqli_connect_errno($con))
        {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $result = mysqli_query($con,"SELECT ID, nameofproject, bywho, priceneed, pricecollected, description FROM projects WHERE ID = '$pj'");
        while($row = mysqli_fetch_array($result))
        { ?>
            <div class = "project">
                <p class="name" align="center"><?php echo $row['nameofproject']; ?></p>
                <p class="time" align="center">by: <?php echo $row['bywho']; ?></p>
                <h2>Description:</h2>
                <p class="description"><?php echo $row['description']; ?></p>
                <p class="collprice">Collected <?php echo $row['pricecollected'];?> / <?php echo $row['priceneed'];?></p>
                <form class="form_donate" action="donate.php" method="post" name="donate">         
                    <input type="range" name="range" value = "0" min="0" max="<?php 
                    $result = mysqli_query($con,"SELECT purse FROM accaunt WHERE Email = '$email'");
                    while($row = mysqli_fetch_array($result))
                    { 
                        echo($row['purse']);
                        $purse = $row['purse'];
                    }?>" oninput="this.nextElementSibling.value = this.value"> 
                    <output>0</output>
                    <br>
                    <input class="hide" type="text" name="pj" value="<?php echo $pj;?>">
                    <button class="donate">Donate</button>
                </form>
            </div>
        <?php
        } 
        mysqli_close($con);
    }  
?>