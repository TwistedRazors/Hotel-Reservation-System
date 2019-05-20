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

$employee_id = $_POST['employee_id'];
$employee_password = $_POST['employee_password'];

if ($_POST){
    mysqli_select_db($conn, "hotel");
    $SQLstring2 = "SELECT * FROM employee WHERE EmployeeID='$employee_id'";

    $result2 = mysqli_query($conn, $SQLstring2) or die(mysqli_error());

    if (mysqli_num_rows($result2) > 0) {
        echo "Employee already exists";
    }
    else{
          $SQLstring = "INSERT INTO employee VALUES ('$employee_id','$employee_password')";
           $result = mysqli_query($conn, $SQLstring) or die(mysqli_error());
           echo 'New record created successfully!';
           mysqli_close($conn);
           echo "<script>setTimeout(\"location.href = 'http://localhost/hotelclass/AddEmployee.php';\",1000);</script>";
                  exit;
         }
}
?>
<html>
<title>Add Employee</title>

<head>
<h1>Add Employee</h1>
</head>
<br>

<body>
<form method="post" action="" autocomplete="off">
  Employee ID: &nbsp<input type="text" name="employee_id" minlength="8" maxlength="8" required>
  <br>
  <br>
  Password: &nbsp <input type="password" name="employee_password" minlength="8" maxlength="20" required>
  <br>
  <br>
  <input type="submit" value="Add Employee">
</form>
</body>

</html>
