<?php
	include "common/sql.php";
	   	 	// checking if page index exists
	if(isset($_GET['page'])) {
			// Setting the PageName variable
	    $pageName = $_GET['page'];
	}
	else{
			// Setting the PageName variable to home
	    $pageName = "home";
			// Redirecting to page given
		header("Location: ?page="  . $pageName);
	}
		// Create connection
	$db = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);

		// Check connection
	if ($db->connect_error) {
	    die("Connection failed: " . $db->connect_error);
	}

	$sql = "SELECT * FROM `pagecontent` WHERE page = '$pageName'";
	$result = $db->query($sql);
	$rows = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?=$rows['title']?></title>
	<link rel="stylesheet" href="common/style.css">
</head>
<body>
	<?=$rows['content']?>
</body>
</html>
<?php
	$pageloaded = true;
?>