<!DOCTYPE html>
<html>	

<head>
	<link rel="stylesheet" href="style.css">

	<! --- Fonts --->
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=swap" rel="stylesheet">

	<title>Post Status Page</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>

	<body>
		<div class="content">
		<h2>Post New Status</h2>
	
		<form action = "poststatusprocess.php" method = "POST" > 
		
			<div>
				<label>Status Code (required):</label>
				<input type="text" name ="statuscode" placeholder="e.g. S0000" autocomplete="off" required> 
				<br><br>
				<label>Status (required):</label>
				<input type="text" name ="statustext" placeholder="Today I..." autocomplete="off" required> 
				<br><br>
				<label>Share:</label>
				<input type="radio" name ="sharetype" value ="public"> Public
				<input type="radio" name ="sharetype" value ="friends"> Friends
				<input type="radio" name ="sharetype" value ="me"> Only Me
				<br><br>
				<label>Date:</label>
				<input type="date"  name="dateposted" value="<?php echo date("Y-m-d") ?>">
				<br><br>
				<label>Permission Type:</label>
				<input type="checkbox" name="permissiontype" value="like "> Allow Like
				<input type="checkbox" name="permissiontype" value="comment "> Allow Comment
				<input type="checkbox" name="permissiontype" value="share "> Allow Share
				<br><br>
			</div>
			
			<div>
				<input type="reset">
				<input type="submit" name="submit" value="Post" />
			</div>

		</form>
		
		<br>
		<a href="index.html">Return to Homepage</a></div>
		
	</body>
</div>

</html>