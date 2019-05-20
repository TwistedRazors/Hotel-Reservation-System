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

$fname = $_POST['firstname'];
$lname  = $_POST['lastname'];
$card = $_POST['card_no'];
$license_no = $_POST['license_no'];
$id = $_GET['empid'];
$roomno = $_GET['roomno'];

if ($_POST){
mysqli_select_db($conn, "hotel");
$SQLstring = "SELECT * FROM customer WHERE Fname='$fname' AND Lname='$lname' AND Card_no='$card'";
$number = $_GET['roomno'];
$SQLstring2 = "UPDATE room SET Vacancy='No' WHERE Number='$number'";
$SQLstring3 = "UPDATE reserves SET Room_no='$number' WHERE (SELECT Card_no FROM customer WHERE Username=User_name)='$card'";
mysqli_query($conn, $SQLstring3) or die(mysqli_error());

$result = mysqli_query($conn, $SQLstring) or die(mysqli_error());

if (mysqli_num_rows($result) > 0) {
    echo "Checked in";
    echo "<script>setTimeout(\"location.href = 'http://localhost/hotelclass/EmployeeMainPage.php?empid=$id';\",1000);</script>";
    mysqli_query($conn, $SQLstring2) or die(mysqli_error());
}
else {
  echo "No account";
  echo "<script>setTimeout(\"location.href = 'http://localhost/hotelclass/CheckIn.php?empid=$id&roomno=$roomno';\",1000);</script>";
}
mysqli_close($conn);
exit;

}

?>

<html>
<title>Check In</title>

<head>
<h1>Check In</h1>
</head>
<script>
function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }
</script>
<br>

<body>
<form method="post" action="" autocomplete="off">
  First Name: &nbsp<input type="text" name="firstname" minlength="1" maxlength="20" required>
  <br>
  <br>
  Last Name: &nbsp <input type="text" name="lastname" minlength="1" maxlength="20" required>
  <br>
  <br>
  Card Number: &nbsp <input type="text" name="card_no" onkeypress="return isNumberKey(event)" minlength="16" maxlength="16" required>
  <br>
  <br>
  License Number: &nbsp <input type="text" name="license_no" onkeypress="return isNumberKey(event)" minlength="8" maxlength="8" required>
    <br>
    <br>
  <input type="submit" value="Submit">
</form>
</body>
</html>
