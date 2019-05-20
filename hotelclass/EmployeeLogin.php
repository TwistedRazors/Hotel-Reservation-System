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

$id = $_POST['employee_id'];
$password = $_POST['employee_password'];

if ($_POST){
    $SQLstring = "SELECT * FROM employee WHERE EmployeeID='$id' AND Password='$password'";
    $QueryResult = @mysqli_query($conn, $SQLstring);
    $Value = @mysqli_fetch_row($QueryResult);

    if ($Value[0] != '') {
      echo "Hello " . $id;
      echo "<script>setTimeout(\"location.href = 'http://localhost/hotelclass/HomePage.php?empid=$id';\",1000);</script>";
    } else {
      echo "Invalid Login";
      echo "<script>setTimeout(\"location.href = 'http://localhost/hotelclass/EmployeeLogin.php';\",1000);</script>";
    }
    mysqli_close($conn);

           exit;
}
?>
<html>

<title>Employee Login</title>

<head>
<h1>Employee Login</h1>
</head>
<br>

<body>
<form method="post" action="">
  Employee ID: &nbsp<input type="text" name="employee_id">
  <br>
  <br>
  Password: &nbsp <input type="password" name="employee_password">
  <br>
  <br>
  <input type="submit" value="Login">
</form>
</body>
</html>
