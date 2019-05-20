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
$service = $_GET['service'];
$number = $_GET['roomno'];

$SQLstring = "DELETE FROM interacts_with WHERE EmpID='$id' AND Service='$service' AND (SELECT DISTINCT Room_no FROM reserves WHERE Room_no='$number')";
$QueryResult = mysqli_query($conn, $SQLstring) or die(mysqli_error($conn));
echo 'Request has been completed.';
mysqli_close($conn);
echo "<script>setTimeout(\"location.href = 'http://localhost/hotelclass/EmployeeMainPage.php?empid=$id';\",1000);</script>";

?>
