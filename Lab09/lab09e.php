<!DOCTYPE html>
<html>
	<head>
		<title>Lab09e - MySQL</title>
		<?php include ("dbconnect.php") ?>
		<!-- https://webdev.cs.torontomu.ca/~emoc/lab09e.php -->
		<style>
			* {
				font-family: Verdana, sans-serif;
			}

			h2 {
				color: white;
				text-align: center;
				background-color: RebeccaPurple;
			}

			.pic_container {
				padding: 15px;
				margin: auto;
				border: 2px solid RebeccaPurple;
				background-color: Lavender;
			}
		</style>
	</head>
	<body>
		<h2>Problem 5 - Random Photo</h2>
        <?php
		$sql = "SELECT * FROM Photographs;";
		$result = mysqli_query($connect, $sql);

		$numrows = mysqli_num_rows($result);
		if ($numrows > 0) {
			echo "<div style='text-align: center;'>";
			$id = rand(1,$numrows);
			$sql = "SELECT * FROM Photographs WHERE picture_number Like '$id';";
			$result = mysqli_query($connect, $sql);

			if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_assoc($result);
				echo "<div class='pic_container' style='margin: 15px 20%; width: 60%;'>";
				$url = $row["picture_url"];
				echo "<figure>";
				echo "<img src='$url' width='75%' height='auto'>";
				echo "<figcaption><b>".$row["picture_number"].".</b> ".$row["subject"]." AT ".$row["location"]."<br>".$row["date_taken"]."</figcaption>";
				echo "</figure>";
				echo "</div>";
			}
			else {
				echo "No Data Found";
			}
			echo "<h3>$numrows photos in database<h3>";
			echo "</div>";
		}
		else {
			echo "No Data Found";
		}
		mysqli_close($connect);
		?>
	</body>
</html>
