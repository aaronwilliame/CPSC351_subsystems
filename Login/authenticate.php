<?php

session_start();
// DB conection
include "../Backend/db_connect.php"; 

//Checks if user submited login info.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// If not
	exit('Please fill both the username and password fields!');
}
// SQL,
if ($stmt = $conn->prepare('SELECT id, password FROM faculty WHERE username = ?')) {
	// Bind parameters 
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result
	$stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $password);
            $stmt->fetch();
            // Account exists verify the password.
            if ($_POST['password'] === $password) {
                // Verification success! User has logged-in!
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $id;
                header('Location: ../Pages/home.php');
            } else {
                // Incorrect password
                echo 'Incorrect username and/or password!';
            }
        } else {
            // Incorrect username
            echo 'Incorrect username and/or password!';
        }

	$stmt->close();
}
?>