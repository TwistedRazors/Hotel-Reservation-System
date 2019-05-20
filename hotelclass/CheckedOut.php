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

    mysqli_select_db($conn, "hotel");
$id = $_GET['empid'];
	if( isset($_GET['out']) )
	{
		$out = $_GET['out'];
		$SQLstring = "UPDATE room SET Vacancy='Yes' WHERE Number='$out'";
		$result = mysqli_query($conn, $SQLstring) or die(mysqli_error($conn));
    echo "Checked Out";
    echo "<script>setTimeout(\"location.href = 'http://localhost/hotelclass/EmployeeMainPage.php?empid=$id';\",1000);</script>";
	}

  mysqli_close($conn);
?>
