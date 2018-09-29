<!DOCTYPE html>
<html>
<head>
	<style>
	.error{color:#FF0000;}
</style>
</head>
<body>
	<?php
	$name=$email=$comment=$gender=$nameErr=$emailErr=$genderErr="";
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		if(empty($_POST["name"]))
			{$nameErr="name required!";}
		else{$name=test_input($_POST["name"]);
		if(!preg_match("/^[a-zA-Z ]*$/",$name))
			{$nameErr="Letters and Blank ONLY!";
				$name="";}
				}	
		if(empty($_POST["email"])){
			$emailErr="email required!";}else
			{$email=test_input($_POST["email"]);
				if(!preg_match("/([\w-]+\@[\w\-]+\.[\w\-]+)/",$email)){
					$emailErr="Wrong email Address!";
					$email="";
				}
			}	
			if(empty($_POST["gender"])){
				$genderErr="gender required!";}else{$gender=test_input($_POST["gender"]);}	
				if(empty($_POST["comment"]))
					{$commentErr="";}else{$comment=test_input($_POST["comment"]);}	
			}



			function test_input($data){
				$data=trim($data);
				$data=stripslashes($data);
				$data=htmlspecialchars($data);
				return $data;
			}

			?>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				Name:<input type="text" name="name">
				<span class="error">*<?php echo $nameErr;?></span><br>
				Email:<input type="text" name="email">
				<span class="error">*<?php echo $emailErr;?></span><br>
				Comment:<textarea name="comment" rows="5" cols="40"></textarea><br>
				Gender:
				<input type="radio" name="gender" value="Female">Female 
				<input type="radio" name="gender" value="Male">Male 
				<span class="error">*<?php echo $genderErr;?></span><br>
				<input type="submit" name="submit" value="submit">
			</form>
			<?php
			echo $name;
			echo "<br>";
			echo $email;
			echo "<br>";
			echo $comment;
			echo "<br>";
			echo $gender;

			?>
</body>
</html>

