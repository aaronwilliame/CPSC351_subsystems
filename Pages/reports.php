<?php
// sessions -- always use when making a new page!
session_start();
// If the user is not logged in redirect to the login page
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../index.php');
	exit;
}
// DB conection
include "../Backend/db_connect.php"; 

// Get user info from DB
$stmt = $conn->prepare('SELECT idMeetings, meetingDate, attendance, com_id, id FROM meetings, faculty WHERE id = ?' );
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($idMeetings, $meetingDate, $attendance, $com_id, $id);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="../Styles/style.css" rel="stylesheet">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>UFOC</h1>
                <a href="home.php"><i class="fas fa-user-circle"></i>Home</li>
				<a href="account.php"><i class="fas fa-user-circle"></i>Account</a>
				<a href="reports.php"><i class="fas fa-user-circle"></i>Reports</li>
				<a href="nominates.php"><i class="fas fa-sign-out-alt"></i>Nominate</a>
		        <a href="voting.php"><i class="fas fa-user-circle"></i>Voting</li>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Reports Page</h2>
			<div>
				<p>Summary of your Committee reports</p>
				<table>
			<tr>
					<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Meeting ID</td>
						<td><?=$idMeetings?></td>
					</tr>
					<tr>
						<td>Meeting</td>
						<td><?=$meetingDate?></td>
					</tr>
					<tr>
						<td>Did your ass attend?</td>
						<td><?=$attendance?></td>
					</tr>
					<tr>
						<td>Committee</td>
						<td><?=$com_id?></td>
					</tr>
				
				</table>
				
			</div>
			
		</div>

	
	
	</body>
	 