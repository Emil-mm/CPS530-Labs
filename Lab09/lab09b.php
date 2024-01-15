<!DOCTYPE html>
<html>
	<head>
		<title>Lab09b - MySQL</title>
		<?php include ('dbconnect.php'); ?>
		<!-- https://webdev.cs.torontomu.ca/~emoc/lab09b.php -->

		<style>
			* {
				font-family: Verdana, sans-serif;
			}

			td,th {
				border: 2px;
				padding: 5px 10px;
				font-size: calc(10px + 0.3vw);
			}

			.photonum {
				text-align: center;
			}

			tr {
				background-color: Lavender;
			}

			tr:nth-child(odd){
				background-color: White;
			}

			tr:nth-child(1) {
				color: white;
				background-color: RebeccaPurple;
			}
			
			td:nth-child(1){
				font-weight: 700;
			}

			h2 {
				color: white;
				background-color: RebeccaPurple;
			}
		</style>
	</head>
	<body>
		<?php
		$sql = "SELECT * FROM Photographs ORDER BY date_taken DESC; ";
		$result = mysqli_query($connect, $sql);

		echo "<h2 style='text-align:center;'>Problem 2 - Data New to Old</h2>";
		echo "<div style='margin: 15px 20%; width: 60%;'>";
		if (mysqli_num_rows($result) > 0) {
			echo "<table style='color:indigo;'>";
			echo "<tr>";
			echo "<th>ID</td>";
			echo "<th>Subject</td>";
			echo "<th>Location</td>";
			echo "<th>Date</td>";
			echo "<th>Picture URL</td>";
			echo "</tr>";
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td class='photonum'>".$row["picture_number"]."</td>";
				echo "<td>".$row['subject']."</td>";
				echo "<td>".$row["location"]."</td>";
				echo "<td>".$row["date_taken"]."</td>";
				echo "<td>".$row["picture_url"]."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		else {
			echo "No results.";
		}
		echo "</div>";

		mysqli_close($connect);
		?>
	</body>
<html>
