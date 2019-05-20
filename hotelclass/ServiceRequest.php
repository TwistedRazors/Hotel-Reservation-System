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
      $service = $_POST['service'];
      $SQLstring3 = "SELECT Room_no FROM reserves WHERE User_name='$username' AND Room_no IS NOT NULL";
      $QueryResult3 = mysqli_query($conn, $SQLstring3) or die(mysqli_error($conn));
      if(($Value = mysqli_fetch_row($QueryResult3)) == FALSE) {
        echo 'Your must check into a room to submit a service request.';
        mysqli_close($conn);
        echo "<script>setTimeout(\"location.href = 'http://localhost/hotelclass/HomePage.php?user=$username';\",1000);</script>";
        exit;
      }
      if ($_POST) {
        $SQLstring2 = "INSERT INTO interacts_with VALUES ((SELECT EmployeeID FROM employee ORDER BY RAND() LIMIT 1), '$username', '$service')";
        $QueryResult2 = mysqli_query($conn, $SQLstring2) or die(mysqli_error($conn));
        echo 'Your request will be attended to shortly.';
        mysqli_close($conn);
        echo "<script>setTimeout(\"location.href = 'http://localhost/hotelclass/HomePage.php?user=$username';\",1000);</script>";
        exit;
      }
?>
<html>
<head>
  <title>Submit Request</title>
  <h1>Submit a Service Request</h1>
</head>
<body>
  Service: &nbsp
  <form method="post" action="" autocomplete="off">
    <textarea rows="4" cols="50" name="service" minlength="1" maxlength="1000" required></textarea>
    <br>
    <br>
    <input type="submit" value="Submit Request" id="request">
  </form>
</body>
</html>
