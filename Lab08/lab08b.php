<!DOCTYPE html>
<html>
	<head>
		<title>Lab08b - PHP</title>
		<!-- https://www.cs.torontomu.ca/~emoc/lab08/lab08b.php -->
		<style>
			* {
				font-family: Verdana, sans-serif;
			}

			h2 {
				font-size: calc(18px + 1vw);
			}

			td {
				box-sizing: border-box;
				width: 100px;
				border: 2px solid aliceBlue;
				padding: 5px 10px;
				font-size: calc(10px + 1vw);
				text-align: center;
			}

			tr {
				background-color: Lavender;
			}

			tr:nth-child(odd){
				background-color: White;
			}

			tr:nth-child(1){
				color: white;
				background-color: indigo;
			}
		</style>
	</head>
	<?php
	$x = $_POST['num1'];
	$y = $_POST['num2'];
	if(($x>=3 and $x<=12) and ($y>=3 and $y<=12)) {
		echo "<body align='center' style='background-color: aliceBlue;'>";
		echo "<h2>Multiplication Table: $x X $y</h2>";
		echo "<table align='center'>";
		for ($i=1; $i<=$x; $i+=1) {
			echo "<tr>";
			for ($j=1; $j<=$y; $j+=1) {
				echo "<td>";
				echo $i * $j;
				echo "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
		echo "</body>";
	}
	else {
		echo "<body align='center' style='background-color: LightCoral;'>";
		echo "<h2>Invalid number</h2>";
		if($x < 3) {
			echo "<p>The first number <span style='font-weight: bold;'>$x</span> must be greater than or equal 3</p>";
		}
		elseif ($x > 12) {
			echo "<p>The first number <span style='font-weight: bold;'>$x</span> must be less than or equal 12</p>";
		}

		if($y < 3) {
                        echo "<p>The second number <span style='font-weight: bold;'>$y</span> must be greater than or equal 3</p>";
                }
                elseif ($y > 12) {
                        echo "<p>The second number <span style='font-weight: bold;'>$y</span> must be less than or equal 12</p>";
                }
		echo "</body>";
	}
	?>
</html>
