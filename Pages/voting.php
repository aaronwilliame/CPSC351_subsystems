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
$stmt = $conn->prepare('SELECT id, email FROM faculty WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($id, $email);
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
				<a href="account.php"><i class="fas fa-user-circle"></i>Account</a>
				<a href="reports.php"><i class="fas fa-user-circle"></i>Reports</li>
				<a href="nominates.php"><i class="fas fa-sign-out-alt"></i>Nominate</a>
		        <a href="voting.php"><i class="fas fa-user-circle"></i>Voting</li>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>

		<div class="content">
			<h2>Voting
                <div style="float: right">
                    <img src="./Photos/Voting/voting.svg" alt="voting box" width=100px>
                </div><br><br>
            </h2>   
			
            <div>
            This is the voting page, <?=$_SESSION['name']?>! <br><br>
            <?php
				include "../Vote/voteinfo.php"; 
			?>
			<br>
        </div>
			
            <div class="content">
			<table>
            Vote here: <br><br>
                <form action="../Vote/votes.php" method="POST" onSubmit="return confirm('Are you sure?\n Only ONE vote per faculty member per position');">
                    <tr>
                        <td>Nominee Full Name:</td>
                        <td><input type = "text" name = "nomName" required></td>
                    </tr>
                   
                    <tr>
                        <td>Seat:</td>
                        <td><input type = "text" name = "nomSeat" required></td>
                    </tr>
                    <tr>
                        <td>Committee:</td>
                        <td><input type = "text" name = "nomCommittee" required></td>
                    </tr>
                    <tr>
                        <td>Your Faculty ID:</td>
                        <td><input type="text" name="id" value="<?php echo $id;?>" readonly="readonly"></td>    
                    </tr>
                    <tr>
                     <td><input type = "submit" name = "submit" value = "Submit"><td>
                    </tr>
                 </form>

             </table>
            
		</div>

	
	</body>
</html>
