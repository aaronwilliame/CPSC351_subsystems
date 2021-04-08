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
$stmt = $conn->prepare('SELECT password, email, department FROM faculty WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email, $department);
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
                <a href="home.php">Home</a></li>
				<a href="reports.php"><i class="fas fa-user-circle"></i>Reports</a>
		        <a href="voting.php">Voting</a></li>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
                    <tr>
						<td>department</td>
						<td><?=$department?></td>
					</tr>
                    <tr>
						<td>Next Meeting</td>
						<td><?=?meeting?></td>
					</tr>
				</table>
			</div>
		</div>
	<form>
	<label for ="formname">Form Name:</label>
	<input type="text" id="formname" name="formname" required="required">
	<label for="myfile">Select a file:</label>
	<input type="file" id="myfile" name="myfile" required="required">
	<label for ="comments">Comments:</label>
	<textarea id="comments" name="comments" rows="5" cols="25"></textarea>
	<input type="submit" value="Submit">
	</form>

	<?php
	$formname = $_POST["formname"];
	$myfile = $_POST["myfile"];
	$book = $_POST["book"];
	$comments = $_POST["comments"];
	?>
	
	
	</body>
	 