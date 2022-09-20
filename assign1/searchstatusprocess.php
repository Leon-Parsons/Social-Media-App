<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="style.css">
	<! --- Fonts --->
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=swap" rel="stylesheet">

	<title>Search Status Process Page</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<body>
    <div class="content">
	<h2>Status Information</h2> 

	<?PHP
		//Database connection
		$sql_host = "cmslamp14.aut.ac.nz";
		$sql_user = "wtv2194";
		$sql_password = "Chilli1pep";
		$sql_database = "wtv2194";
		
		$conn = mysqli_connect($sql_host, $sql_user, $sql_password, $sql_database);
		
		
		//Search post functionality
		$userinput = $_GET['userinput'];

		if (strlen($userinput) !== 0){  
					// Queries the database with user input
					$query = "SELECT * FROM statustest3 WHERE statustext LIKE '%$userinput%'";
					$queryresult = mysqli_query($conn,$query);
					
					if ($queryresult)
					{
						echo "There is no status posts matching your search.";
					} else {
					}
					
					if ($queryresult !== FALSE) {
						while($row = mysqli_fetch_assoc($queryresult)) {
							echo "<br>Status: ". $row["statustext"],
								 "<br>Status code: ". $row["statuscode"],
								 "<br>Shared to: ". $row["sharetype"],
								 "<br>Date: ". $row["dateposted"],
								 "<br>Permissions: ". $row["permissiontype"],
								 "<br>",
								 "<br>";
						}	
					} else {
						echo "There is no status posts matching your search.";
					}
		} else {
			echo "No text was entered."; 
		}
	?>
	
	<br>
	<br>
	<a href="searchstatusform.html">Search for another status</a>
	<br>
	<br>
	<a href="index.html">Return to the Homepage</a>

	</div>

</body>
</html>
