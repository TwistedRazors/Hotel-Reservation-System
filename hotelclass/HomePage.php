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
?>
<html>
<title>Home</title>

<head>
  <h1>Home</h1>
</head>

<body>
<?php echo "<a href='http://localhost/hotelclass/RentRoom.php?user=$username'>Rent a Room</a>"; ?>
  <br>
  <?php echo "<a href='http://localhost/hotelclass/ServiceRequest.php?user=$username'>Submit a service Request</a>"; ?>
    <br>
  <a href="http://localhost/hotelclass/LoggedOut.html">Logout</a>
</body>
</html>
