<?php
require_once("DBconnect.php");

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'car_showroom';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM  cars ";
$result = mysqli_query($conn, $sql);
?>



<!doctype html>
<html>

  <head>
    <section id = "header">
        <div class = "row">
            <div class ="col-md-2" style="font-size: 30px;color:#24d1f8;">Car Showroom</div>
            <div id="menu_bar" class ="col-md-10" style="text-align: right">
                <div id="menu_buttons"><a href="home.html">HOME</a></div>
                <div id="menu_buttons"><a href="show_cars.php">CARS</a></div>
                <div id="menu_buttons"><a href="booking.php">BOOKING</a></div>
                <div id="menu_buttons"><a href="inquiries.php">INQUIRIES</a></div>
            </div>
        </div>
    </section>
  </head>
  <style type="text/css">
  	#header{
  		background-color: #000000;
  		height: 60px;
  		font-family: fantasy;
  		padding: 10px;
  	}

  	#menu_bar{
  		padding: 8px;
  		float: right;
  	}

  	#menu_buttons{
  		width: 100px;
  		height: 20px;
  		text-align: center;
  		border-radius: 4px;
        display: inline-block;
        margin: 2px;
        background-color: #24d1f8;
        font-family: tahoma;
        font-weight: bold;
  	}

    .btn2{
        background-color: #555;
        color: #24d1f8;
        font-size: 16px;
        padding: 12px 24px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }
    .btn2:hover {
        background-color: black;
    }

  </style>
  <body style="background-color: #24d1f8">

  	<div id="car_table">
		<table align="center" border="lpx" style="width:600px; line-height:40px;">
			<tr>
				<th colspan="5"><h2>Car Details</h2></th>
			</tr>
			<t>
			    <th>car_id</th>
				<th>Model</th>
				<th>Avaibility</th>
				<th>Manufacturer</th>
				<th>Price</th>
				<th>Feature</th>
        <th>Book</th>
			</t>
				<?php

				while($row = mysqli_fetch_array($result)){
						//some html code, close php
				?>
				<tr>
				    <td><?php echo $row[0];?></td>
					<td><?php echo $row[1];?></td>
					<td><?php echo $row[2];?></td>
					<td><?php echo $row[3];?></td>
					<td><?php echo $row[4];?></td>
					<td><?php echo $row[5];?></td>
          <td><button class="btn2" onclick="window.location.href='booking.php'">Book</button></td>
				</tr>

				<?php
					}


				?>
		</table>
	</div>

	<div>

	</div>

  </body>
</html>
