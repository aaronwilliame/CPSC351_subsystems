<html>
<link href="../Styles/style.css" rel="stylesheet">
<div class="content">
This is the list of Current Nominations <br><br>
<?php
				// Check connection
				if (mysqli_connect_errno())
				{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}

				$result = mysqli_query($conn,"SELECT * FROM nominates");

				echo "<table border='1'>
				<tr>
				<th>Candidate</th>
				<th>Position</th>
				<th>Committee</th>
				</tr>";

				while($row = mysqli_fetch_array($result))
				{
				echo "<tr>";
				echo "<td>" . $row['nomName'] . "</td>";
				echo "<td>" . $row['nomSeat'] . "</td>";
				echo "<td>" . $row['nomCommittee'] . "</td>";
				echo "</tr>";
				}
				echo "</table>";

				mysqli_close($conn);
			?>
</div>
</html>