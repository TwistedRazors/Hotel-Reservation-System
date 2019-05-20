<?php
error_reporting(E_ERROR | E_PARSE);
$databaseName = 'hotel';
$databaseUser = 'root';
$databasePassword = '';
$databaseHost = '127.0.0.1';
session_start();
$conn = new mysqli($databaseHost, $databaseUser, $databasePassword, $databaseName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_GET['empid'];
mysqli_close($conn);
?>
<html>
<title>Employee Duties</title>

<head>
</head>

<body>
  <h1>Duties</h1>
  <?php echo "<a href='http://localhost/hotelclass/CheckAvailability.php?empid=$id'>Check In Guests</a>"; ?>
  <br>
  <?php echo "<a href='http://localhost/hotelclass/CheckOut.php?empid=$id'>Check Out Guests</a>"; ?>
  <br>
  <?php echo "<a href='http://localhost/hotelclass/ViewServices.php?empid=$id'>View Service Requests</a>"; ?>
  <br>
  <a href="http://localhost/hotelclass/LoggedOut.html">Sign Out</a>
</body>
</html>
