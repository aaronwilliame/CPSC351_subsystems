<html>
<link href="../Styles/style.css" rel="stylesheet">
   <body>
      <div class="content">
            <div>
               <?php
                        // DB conection
                     include "../Backend/db_connect.php"; 
                        
                        if(isset($_POST['submit']))
                        {    
                           $nomName = $_POST['nomName'];
                           $nomSeat = $_POST['nomSeat'];
                           $nomCommittee = $_POST['nomCommittee'];
                           $Faculty_id = $_POST['id'];

                           $sql = "INSERT INTO voting_results (nomName,nomSeat,nomCommittee,Faculty_id)
                              VALUES ('$nomName','$nomSeat','$nomCommittee','$Faculty_id')";
                           if (mysqli_query($conn, $sql)) {
                              echo "Your Vote has been counted successfully!";
                              
                           } else {
                              echo "Error: " . $sql . ":-" . mysqli_error($conn);
                           }
                           mysqli_close($conn);
                        }
               ?>
         
            <h1>Return Home</h1>
               <a href="../Pages/home.php"><i class="fas fa-user-circle"></i>HOME</li>
            </div>
         </div>
   </body>
   
</html>