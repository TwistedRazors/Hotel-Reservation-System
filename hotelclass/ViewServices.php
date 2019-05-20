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
$id = $_GET['empid'];
$SQLstring = "SELECT DISTINCT EmpID, Service, Room_no FROM interacts_with, reserves, room WHERE User=User_name AND Room_no=Number AND EmpID='$id' ";
$QueryResult = mysqli_query($conn, $SQLstring) or die(mysqli_error($conn));


echo "<table width='100%' border='1'>\n"; // create table
echo "<tr><th>Employee Assigned</th><th>Service</th><th>Room</th><th>Finished?</th>\n"; // table headers

while (($Value = mysqli_fetch_row($QueryResult)) != FALSE) {
  echo "<tr><td align='center'>{$Value[0]}</td>";
  echo "<td align='center'>{$Value[1]}</td>";
  echo "<td align='center'>{$Value[2]}</td>";
  echo "<td align='center'><a href='http://localhost/hotelclass/CompleteRequest.php?empid=$id&service={$Value[1]}&roomno={$Value[2]}'>Complete</td>";
}
mysqli_close($conn);
?>
