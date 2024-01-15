
<!DOCTYPE html>
<html>
	<head>
		<title>Lab09d - MySQL</title>
		<?php include ("dbconnect.php") ?>
		<!-- https://webdev.cs.torontomu.ca/~emoc/lab09d.php -->
		<style>
			* {
				font-family: Verdana, sans-serif;
			}

			h2 {
				color: white;
				text-align: center;
				background-color: RebeccaPurple;
			}

			input {
				margin: 10px 10px 10px 25px;
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
		<h2>Problem 4 - Photo Search</h2>
		<div style="text-align: center; border: 2px solid rebeccaPurple; margin: 25px 0px;">
			<form action method="get">
				<?php
				$sql = "SELECT DISTINCT location FROM Photographs ORDER BY location;";
				$loc = mysqli_query($connect, $sql);

				$sql = "SELECT DISTINCT substring(date_taken,1,4) AS year FROM Photographs ORDER BY year;";
				$year = mysqli_query($connect, $sql);

				if(mysqli_num_rows($loc) > 0 or mysqli_num_rows($year)) {
					echo "<div>";
					echo "<h3>LOCATION</h3>";
					while($l=mysqli_fetch_assoc($loc)) {
						$location = $l["location"];
						echo "<input type='radio' name='location' value='$location'>$location</input>";
					}
					echo "<br></div>";

					echo "<div>";
					echo "<h3>YEAR</h3>";
					while($y=mysqli_fetch_assoc($year)) {
						echo "<input type='radio' name='year' value=".$y["year"].">". $y["year"]."</input>";
					}
					echo "</div>";

					echo "<input type='submit' value='SUBMIT'>";
				}
				else {
					echo "No Data Found";
				}
				?>
			</form>
		</div>
		<div style="text-align: center;">
			<?php
			$location = $_GET["location"];
			$year = $_GET["year"];
			$sql = "SELECT * FROM Photographs WHERE location LIKE '$location' AND date_taken LIKE '$year%';";
			$result = mysqli_query($connect, $sql);
			if (mysqli_num_rows($result) > 0){
				echo "<h3>PHOTOS TAKEN AT ".$location." IN ".$year."</h3>";
				while ($row=mysqli_fetch_assoc($result)) {
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
				if (!$location or !$year){
					echo "<h3>INSERT THE LOCATION AND YEAR</h3>";
				}
				else {
					echo "<h3>NO PHOTOS FOUND AT ".$location." FROM ".$year."</h3>";
				}
			}
			mysqli_close($connect);
			?>
		</div>
	</body>
</html>
