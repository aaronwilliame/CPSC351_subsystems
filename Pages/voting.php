<?php
// sessions -- always use when making a new page!
session_start();
// If the user is not logged in redirect to the login page
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
// DB conection
include "../Backend/db_connect.php"; 

// Get user info from DB
$stmt = $conn->prepare('SELECT password, email FROM faculty WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Voting Page</title>
        <link href="../Styles/style.css" rel="stylesheet">
	</head>
	<body class="loggedin">
        <!--NAV BAR HERE-->
		<nav class="navtop">
			<div>
				<h1>UFOC</h1>
                <a href="home.php"><i class="fas fa-user-circle"></i>Home</li>
				<a href="reports.php"><i class="fas fa-user-circle"></i>Reports</a>
				<a href="nominates.php"><i class="fas fa-sign-out-alt"></i>Nominate</a>
		        <a href="voting.php"><i class="fas fa-user-circle"></i>Voting</li>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Voting</h2>
			<p>This is the voting page, <?=$_SESSION['name']?>!</p>
		</div>
	</body>
</html>
