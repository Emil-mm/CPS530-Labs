<!DOCTYPE html>
<html>
	<head>
		<title>Lab09a - MySQL</title>
		<?php include ('dbconnect.php') ?>
		<!--  https://webdev.cs.torontomu.ca/~emoc/lab09a.php  -->
	</head>
	<body>
		<?php
		if($connect){
    		echo "Connected to MySQL Database <b>$database</b><br>";
		}
		else{
    		echo "Connection Failed<br>";
		}

		//Drop table
		$sql = "DROP TABLE Photographs";

		if (mysqli_query($connect, $sql)) {
		    echo "Table Photographs Dropped.<br>";
		}
		else {
    		echo "Error: " . $sql . "=>" . mysqli_error($connect);
		}

		//Create the table
		$sql = "CREATE TABLE Photographs (
			picture_number INT(8) PRIMARY KEY,
			subject VARCHAR(50),
			location VARCHAR(50),
			date_taken VARCHAR(10),
			picture_url VARCHAR(50) NOT NULL);";

		if (mysqli_query($connect, $sql)) {
			echo "New table created successfully.<br>";
		}
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($connect);
		}

		//Insert Table Data
		$sql = "INSERT INTO Photographs (picture_number, subject, location, date_taken, picture_url) 
			VALUES (1,'CN TOWER','TORONTO, ON','2013-06-20','./img/cntower.jpg'); ";
		$sql .= "INSERT INTO Photographs (picture_number, subject, location, date_taken, picture_url) 
			VALUES (2,'CANADIAN NATIONAL EXHIBITION','TORONTO, ON','2023-09-05','./img/cne.jpg'); ";
		$sql .= "INSERT INTO Photographs (picture_number, subject, location, date_taken, picture_url) 
			VALUES (3,'GRANVILLE ISLAND MARKET','VANCOUVER, BC','2023-07-29','./img/granville_market.jpg'); ";
		$sql .= "INSERT INTO Photographs (picture_number, subject, location, date_taken, picture_url) 
			VALUES (4,'MONT-TREMBLANT','LAURENTIDES, QC','2020-03-14','./img/mont_tremblant.jpg'); ";
		$sql .= "INSERT INTO Photographs (picture_number, subject, location, date_taken, picture_url) 
			VALUES (5,'NIAGARA FALLS','NIAGARA FALLS, ON','2017-03-13','./img/niagarafalls.jpg'); ";
		$sql .= "INSERT INTO Photographs (picture_number, subject, location, date_taken, picture_url) 
			VALUES (6,'THE DISTILLERY DISTRICT','TORONTO, ON','2020-01-16','./img/distillerydistrict.jpg'); ";
		$sql .= "INSERT INTO Photographs (picture_number, subject, location, date_taken, picture_url) 
			VALUES (7,'QUEEN STATION TTC','TORONTO, ON','2018-02-01','./img/queenttc.jpg'); ";
		$sql .= "INSERT INTO Photographs (picture_number, subject, location, date_taken, picture_url) 
			VALUES (8,'TMU SLC','TORONTO, ON','2016-07-03','./img/tmu_slc.jpg'); ";
		$sql .= "INSERT INTO Photographs (picture_number, subject, location, date_taken, picture_url) 
			VALUES (9,'YONGE-DUNDAS','TORONTO, ON','2019-11-06','./img/yongedundas.jpg'); ";
		$sql .= "INSERT INTO Photographs (picture_number, subject, location, date_taken, picture_url) 
			VALUES (10,'HARBOUR FRONT','TORONTO, ON','2019-07-14','./img/harbourfront.jpg'); ";

		if (mysqli_multi_query($connect, $sql)) {
			echo "Multiple photos added.<br>";
		}
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($connect);
		}

		mysqli_close($connect);
		?>
	</body>
</html>
