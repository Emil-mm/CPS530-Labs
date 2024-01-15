<!DOCTYPE html>
<html>
	<head>
		<!-- https://www.cs.torontomu.ca/~emoc/lab08/lab08.php  -->
		<title>Lab 08 - PHP</title>
		<style>
			* {
				font-family: Verdana, sans-serif;
			}

			.img-container {
				min-width: 200px;
			}

			label {
				display: inline-block;
				text-align: left;
				width: 35%;
				max-width: 700px;
				min-width: 200px;
				font-size: calc(11px + 0.5vw);
			}

			input {
				width: 10%;
				max-width: 100px;
				min-width: 45px;
				font-size: calc(11px + 0.5vw);
			}

			input[type=submit] {
				width: 100px;
			}

			a div {
				width: 150px;
				height: auto;
				padding: 10px;
				margin: 10px;
				text-align: center;
				background-color: PaleTurquoise;

			}

			a div:hover {
				background-color:Turquoise;
			}
		</style>
	</head>
	<body style="background-color: aliceBlue;">
		<h2>Problem 1</h2>
		<div style="margin: 1% 2%">
			<?php
	 		$time = number_format(date("H"));
			if ($time >= 5 and $time < 12) {
			    echo "<div class='img-container' style='background-image: url(https://www.shutterstock.com/image-vector/spring-sunset-sky-scape-blue-260nw-2220991215.jpg); background-size: cover; background-repeat: no-repeat; text-align: center; margin: 0px 25% 0px; padding: 7%;'>";
		            echo "<p style='color: black; font-size:calc(20px + 1vw);'>GOOD MORNING</p>";
			    echo "<p style='color: black; font-size:calc(20px + 1vw);'>[05:00 - 11:59]</p>";
			    echo "</div>";
			}
			elseif ($time >= 12 and $time < 17) {
			    echo "<div class='img-container' style='background-image: url(https://live.staticflickr.com/4093/4890419846_548484d0b6_b.jpg); background-size: cover; background-repeat: no-repeat; text-align: center; margin: 0px 25% 0px; padding: 7%;'>";
			    echo "<p style='color: black; font-size:calc(20px + 1vw);'>GOOD AFTERNOON</p>";
			    echo "<p style='color: black; font-size:calc(20px + 1vw);'>[12:00 - 16:59]</p>";
			    echo "</div>";
	                }
			elseif ($time >= 17 and $time < 21) {
			    echo "<div class='img-container' style='background-image: url(https://t4.ftcdn.net/jpg/06/16/74/97/240_F_616749736_Pm4QJi5l4IYRabLujZKwuBD7K02ZgUHY.jpg); background-size: cover;  auto; background-repeat: no-repeat; text-align: center; margin: 0px 25% 0px; padding: 7%;'>";
			    echo "<p style='color: white; font-size:calc(20px + 1vw);'>GOOD EVENING</p>";
			    echo "<p style='color: white; font-size:calc(20px + 1vw);'>[17:00 - 20:59]</p>";
			    echo "</div>";
			}
			else {
			    echo "<div class='img-container' style='background-image: url(https://alrightblog951505478.files.wordpress.com/2018/12/milky-way-starry-sky-night-sky-star-957061.jpeg?w=1200); background-size: cover; background-repeat: no-repeat; text-align: center; margin: 0px 25% 0px; padding: 7%;'>";
			    echo "<p style='color: white; font-size:calc(20px + 1vw);'>GOOD NIGHT</p>";
			    echo "<p style='color: white; font-size:calc(20px + 1vw);'>[21:00 - 04:59]</p>";
			    echo "</div>";
			}
			?>
		</div>
		<h2>Problem 2</h2>
		<div style="margin: 1% 2%">
			<form action="lab08b.php" method="POST" target="_blank">
				<label for="num1">Select a number between 3 and 12</label>
				<input id="num1" type="number" name="num1"><br><br>
				<label for="num2">Select a number between 3 and 12</label>
				<input id="num2" type="number" name="num2"><br><br>
				<input type="submit" value="Submit">
			</form>
		</div>
		
		<!-- Problem 3 -->
		<?php
			$inOneDay = 60 * 60 * 24 + time();
			$count = 1;
			if (isset($_COOKIE['hits'])) {
				$count += $_COOKIE['hits'];
				setCookie('hits', $count, $inOneDay);
			}
			else {
				setCookie('hits', $count, $inOneDay);
			}

			echo "<div style='position: fixed; opacity: 0.70; bottom: 0; right: 0; text-align: center; z-index: 5; padding: 25px;'>";
			echo "<h2 style='color:SteelBlue'>Hits: $count</h2>";
			echo "</div>";
		?>

		<h2>Problem 4</h2>
		<div style="margin: 1% 2%">
			<?php
			if(isSet($_GET['img'])){
				$name = $_GET['img'];
				echo "<img src='$name' style=' height: 25%; position: fixed; opacity: 0.70; top: 0; right: 0; text-align: center; z-index:5;'>";
				echo "<h3>The image shown is $name</h3>";
			}
			else {
				echo "<a href='https://www.cs.torontomu.ca/~emoc/lab08/lab08.php?img=dracula1.gif'>";
	                        echo "<div>";
        	                echo "<p>dracula1.gif</p>";
                	        echo "</div>";
     	         	        echo "</a>";
        	                echo "<a href='https://www.cs.torontomu.ca/~emoc/lab08/lab08.php?img=jackghost.gif'>";
                                echo "<div>";
                                echo "<p>jackghost.gif</p>";
                                echo "</div>";
                        	echo "</a>";
                        	echo "<a href='https://www.cs.torontomu.ca/~emoc/lab08/lab08.php?img=walkers.gif'>";
                                echo "<div>";
                                echo "<p>walkers.gif</p>";
                                echo "</div>";
                        	echo "</a>";
			}
			?>
		</div>
	</body>
</html>
