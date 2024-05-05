<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Rakan</title>
	<link rel="stylesheet" type="text/css" href="style/index.css">
	<link rel="icon" type="image/png" href="image/icon.png">
	<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
	<script type="text/javascript" src="scripts/create.js"></script>
</head>
<body>

	<div class="top-block">
    <a  href="reglog.php"> <img class="log-reg" src="image/log.png" width="60px" height="60px" /></a>
    <a class="exit" href="exit.php"><img src="image/exit.png" width="70px" height="70px" /></a>
    <a class="ima" href="index.php"><img src="image/icon.png" width ="60px" height="70px"></a>
    <p>Rakan</p>
  </div>

	<div class="log-page">
		<div class="form">
			<form class="log-form" action="createinsert.php" method="post" name="create" onsubmit="return Create();">
				<input type="text" maxlength="100" placeholder="Name" name="createname">
				<input type="number" placeholder="Price" name="createprice">
				<input class="description" type="text" placeholder="Discription" name="createdescription">
				<button>Create</button>
			</form>

		</div>
	</div>
</body>
</html>

<?php
  session_start();
  $check1 = $_SESSION["wrongcreate"];
  $_SESSION["wrongdonate"] = 0;
  if($check1 == 1){
  	?>
  	<script type = "text/javascript">
  	  alert("Problems with creating project");
  	</script>
  	<?php
  }   
?>