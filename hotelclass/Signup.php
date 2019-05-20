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
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

if ($_POST){
    mysqli_select_db($conn, "hotel");
    $SQLstring2 = "SELECT * FROM customer WHERE Username='$username'";

    $result2 = mysqli_query($conn, $SQLstring2) or die(mysqli_error());

    if (mysqli_num_rows($result2) > 0) {
        echo "Username already exists";
    }
    else{
          $SQLstring = "INSERT INTO customer(`Fname`, `Lname`, `Email`, `Username`, `Password`) VALUES ('$fname', '$lname', '$email', '$username','$password')";
           $result = mysqli_query($conn, $SQLstring) or die(mysqli_error());
           echo 'New record created successfully!';
           mysqli_close($conn);
           echo "<script>setTimeout(\"location.href = 'http://localhost/hotelclass/Login.php';\",1000);</script>";
                  exit;
         }
}
?>

<html>

<title>Sign Up</title>

<head>
<h1>Sign Up</h1>
</head>
<script>
function check_pass() {
    if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value) {
              document.getElementById('message').style.color = 'green';
               document.getElementById('message').innerHTML = 'matching';
        document.getElementById('submit').disabled = false;
    } else {
      document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'not matching';
        document.getElementById('submit').disabled = true;
    }
}
</script>
<br>

<body>
<form method="post" action="" autocomplete="off">
  First Name: &nbsp <input type="text" name="firstname" minlength="1" maxlength="20" required>
  <br>
  <br>
  Last Name: &nbsp <input type="text" name="lastname" minlength="1" maxlength="20" required>
  <br>
  <br>
  Email Address: &nbsp <input type="email" name="email" minlength="1" maxlength="80" required>
  <br>
  <br>
  Username: &nbsp<input type="text" name="username" minlength="1" maxlength="40" required>
  <br>
  <br>
  Password (8-20 characters): &nbsp<input type="password" name="password" id="password" onchange='check_pass();' minlength="8" maxlength="20" required>
  <br>
  <br>
  Confirm Password: &nbsp <input type="password" name="confirmpassword" id="confirm_password" onchange='check_pass();'> <span id="message"></span>
  <br>
  <br>
  <input type="submit" value="Sign up" id="submit" disabled/>
  <br>
  <br>
</form>
</body>
</html>
