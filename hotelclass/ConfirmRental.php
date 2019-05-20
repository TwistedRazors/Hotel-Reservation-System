<?php
error_reporting(E_ERROR | E_PARSE);
$databaseName = 'hotel';
$databaseUser = 'root';
$databasePassword = '';
$databaseHost = '127.0.0.1';


$conn = new mysqli($databaseHost, $databaseUser, $databasePassword, $databaseName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username = $_GET['user'];
$card = $_GET['card'];
$start = $_GET['start_date'];
$end = $_GET['end_date'];
$type = $_GET['type'];
$price = $_GET['price'];


mysqli_select_db($conn, "hotel");
if ($_POST['confirm']) {
  $SQLstring = "INSERT INTO reserves (User_name, Start_date, End_date) VALUES ('$username', '$start', '$end')";
  mysqli_query($conn, $SQLstring) or die(mysqli_error());
  echo "<script> location.href='http://localhost/hotelclass/RentalPlaced.php?user=$username'; </script>";
}
?>

<html>
<title>Confirm Rental</title>

<head>
<h1>Confirm your information</h1>
</head>
<body>
<div>
<br>
<?php
echo "Card Number: ".$card."<br>";
echo "Start Date: ".$start."<br>";
echo "End Date: ".$end."<br>";
echo "Room Type: ".$type."<br>";
echo "Price: $".$price."<br>";
?>
</div>
<br>
  <form action = "" method = "post">
   <input type="submit" name="confirm" value="Confirm Rental"/>
 </form>
</body>
</html>
