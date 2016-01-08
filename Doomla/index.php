<?php
	include "common/sql.php";
	   	 	// checking if page index exists
	if(isset($_GET['page'])) {
			// Setting the PageName variable
	    $pageName = $_GET['page'];
	}
	else {
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

	function getInfo($info){
		// Defining the Globals variables to Local variables
		GLOBAL $pageName;
		GLOBAL $db;
		$sql = "SELECT * FROM `pagecontent` WHERE '$pageName' = page";
		$result = $db->query($sql);
		$rows = $result->fetch_assoc();
		return $rows;
	}
	
	function getMenu(){

	}

	$rows = getInfo("page");
	include "common/sidemenu.php";
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
	<div class="text">
		<?=$rows['content']?>
	</div>
	<div class="sidemenu">
		<h1>Doomla</h1><hr>
	</div>
</body>
</html>