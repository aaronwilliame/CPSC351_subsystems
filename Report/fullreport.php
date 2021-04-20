<?php
				// Check connection
				if (mysqli_connect_errno())
				{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}

				$sql = "SELECT * FROM meetings, faculty 
					WHERE id = ". $_SESSION['id'] ."
					AND Faculty_id = id";

				$result = mysqli_query($conn, $sql);

				echo "<table border='5'>
				<tr>
				<th>Meeting Date</th>
				<th>Attendance</th>
				<th>Committee ID</th>
				</tr>";
                
                // mysqli_query returns false if something went wrong with the query
             
				while($row = mysqli_fetch_array($result))
				{
				echo "<tr>";
				echo "<td>" . $row['meetingDate'] . "</td>";
				echo "<td>" . $row['attendance'] . "</td>";
				echo "<td>" . $row['com_id'] . "</td>";
				echo "</tr>";
				}
				echo "</table>";

				mysqli_close($conn);
		
			?>
</div>
</html>