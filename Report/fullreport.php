<?php
				// Check connection
				if (mysqli_connect_errno())
				{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}

				$result = mysqli_query($conn,"SELECT * FROM meetings");
                /*$result = mysqli_query($conn,"SELECT M.meetingDate, M.attendance, M.com_id, M.Faculty_id, F.id
                                FROM meetings M, faculty F
                                INNER JOIN M.Faculty_id
                                ON M.Faculty_id = F.id
                                ORDER BY M.meetingDate");*/ 





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