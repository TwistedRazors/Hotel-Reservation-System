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
<title>Your rental has been placed</title>

<head>
<h1>Your rental has been placed!</h1>
</head>
<body>
  <?php echo "<a href='http://localhost/hotelclass/HomePage.php?user=$username'>Home</a>"; ?>
</body>
</html>
