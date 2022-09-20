<!DOCTYPE html>
<html>	

	<link rel="stylesheet" href="style.css">

	<! --- Fonts --->
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=swap" rel="stylesheet">

	<title>Post Process Page</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>

<div class="content"> 

	<?php
	// Initialize variables passed from poststatusform
	$statuscode = $_POST['statuscode'];
	$statustext = $_POST['statustext'];
	$sharetype = $_POST['sharetype'];
	$dateposted = $_POST['dateposted'];
	$permissiontype = $_POST['permissiontype'];

		//Datasbase connection
		$sql_host = "cmslamp14.aut.ac.nz";
		$sql_user = "wtv2194";
		$sql_password = "Chilli1pep";
		$sql_database = "wtv2194";
		$conn = mysqli_connect($sql_host, $sql_user, $sql_password, $sql_database);
		
		//Checks status code is correct format
		$statuscodeformat = '/^S\d{4}$/';
		
		if (!preg_match($statuscodeformat, $statuscode)){
			echo "Status code is wrong format. Status failed to be posted.";
		} else {
			//Checks that status code is unique
			$statuscode = mysqli_escape_string($conn, $_POST["statuscode"]);
			$query = "SELECT COUNT(*) AS total FROM statustest3 WHERE statuscode LIKE '{$statuscode}'";
			
			$queryresult = mysqli_query($conn, $query);
			$checkresult = mysqli_fetch_assoc($queryresult);
			
			if ( $checkresult['total'] > 0 ) {
				mysqli_free_result($queryresult);
				echo "Status code is used, status failed to be posted. <br>Please use an unused status code.";
			} else {
				mysqli_free_result($queryresult);
		
			//Checks if table exists in databse	
			$tableexists = mysql_query($conn,"SELECT 1 FROM statustest3");
			if($tableexists !== FALSE) {
				//Adds form input into database table
				$addtotable = "INSERT INTO statustest3(statuscode,
				statustext,
				sharetype,
				dateposted,
				permissiontype) 
				VALUES ('$statuscode',
				'$statustext',
				'$sharetype',
				'$dateposted',
				'$permissiontype');";
				
				$queryresult = mysqli_query($conn,$addtotable);
				echo "Status successfully posted";
			  
			} else {
				//Creates table in database if it does not exist
				$createtable = "CREATE TABLE statustest3(
				statuscode VARCHAR(5), 
				statustext VARCHAR(200), 
				sharetype VARCHAR(7),
				dateposted DATE NOT NULL,		
				permissiontype VARCHAR(15),
				PRIMARY KEY(statuscode))";
				
				echo("This table doesn't exist");
			   //Adds form input into database table
			   $addtonewtable = "INSERT INTO statustest3(statuscode,
			   statustext,
			   sharetype,
			   dateposted,
			   permissiontype)
			   VALUES ('$statuscode',
			   '$statustext',
			   '$sharetype',
			   '$dateposted',
			   '$permissiontype');";
			   $result = mysqli_query($conn,$addtonewtable);
			}
			}
		}
	?>

	<div>
		<br>
		<a href="index.html">Return to the Homepage</a>
	</div>

</div> 

</body>
</html>