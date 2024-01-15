<!DOCTYPE html>
<html>
	<head>
		<title>Lab09c - MySQL</title>
		<?php include ('dbconnect.php'); ?>
		<!-- https://webdev.cs.torontomu.ca/~emoc/lab09c.php -->

		<style>
			* {
				font-family: Verdana, sans-serif;
			}

			.pic_container {
				padding: 15px;
				margin: auto;
				border: 2px solid RebeccaPurple;
				background-color: Lavender;
			}

			h2 {
				color: white;
				background-color: RebeccaPurple;
			}
		</style>
	</head>
	<body>
		<?php
		$sql = "SELECT * FROM Photographs WHERE location LIKE '%ON'; ";
		$result = mysqli_query($connect, $sql);

		echo "<h2 style='text-align:center;'>Problem 3 - Ontario Photos</h2>";
		echo "<div style='text-align:center;'>";
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo "<div class='pic_container' style='margin: 15px 20%; width: 60%;'>";
				$url = $row["picture_url"];
				echo "<figure>";
				echo "<img src='$url' width='75%' height='auto'>";
				echo "<figcaption><b>".$row["picture_number"].".</b> ".$row["subject"]." AT ".$row["location"]."<br>".$row["date_taken"]."</figcaption>";
				echo "</figure>";
				echo "</div>";
			}
		}
		else {
			echo "No results.";
		}
		echo "</div>";

		mysqli_close($connect);
		?>
	</body>
<html>
