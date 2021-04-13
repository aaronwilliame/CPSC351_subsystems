<?php
         // DB conection
        include "../Backend/db_connect.php"; 
         
         if(isset($_POST['submit']))
         {    
            $nomName = $_POST['nomName'];
            $nomSeat = $_POST['nomSeat'];
            $nomCommittee = $_POST['nomCommittee'];
            $Faculty_id = $_POST['id'];

            $sql = "INSERT INTO nominates (nomName,nomSeat,nomCommittee,Faculty_id)
               VALUES ('$nomName','$nomSeat','$nomCommittee','$Faculty_id')";
            if (mysqli_query($conn, $sql)) {
               echo "Your Vote has been counted successfully!";
            } else {
               echo "Error: " . $sql . ":-" . mysqli_error($conn);
            }
            mysqli_close($conn);
         }
?>
     