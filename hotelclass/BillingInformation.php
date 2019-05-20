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

$address = $_POST['billing_address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zipcode'];
$card = $_POST['card_no'];
$license_no = $_POST['license_no'];
$username = $_GET['user'];
$start = $_GET['start_date'];
$end = $_GET['end_date'];
$type = $_GET['type'];

mysqli_select_db($conn, "hotel");
$SQLstring3 = "SELECT DATEDIFF('$end','$start') * (SELECT DISTINCT Price FROM room WHERE Type='$type')";
$QueryResult3 = mysqli_query($conn, $SQLstring3) or die(mysqli_error($conn));
$Value3 = mysqli_fetch_row($QueryResult3);
if ($_POST){
  $SQLstring = "SELECT CONCAT('$address', ', ', '$city', ', ', '$state', ' ', '$zip') AS Address FROM customer";
  $result = mysqli_query($conn, $SQLstring) or die(mysqli_error($conn));
  $result = $result->fetch_object()->Address;
  $SQLstring2 = "UPDATE customer SET Address='$result', Card_no='$card', License_no='$license_no' WHERE Username='$username'";
  mysqli_query($conn, $SQLstring2) or die(mysqli_error($conn));
  echo "<script> location.href='http://localhost/hotelclass/ConfirmRental.php?user=$username&card=$card&start_date=$start&end_date=$end&type=$type&price={$Value3[0]}'; </script>";
  mysqli_close($conn);
  exit;
}




?>
<html>
<title>Billing</title>

<head>
<h1>Your Total: $<?php echo "{$Value3[0]}";?></h1>
</head>
<script>
function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }
</script>
<body>
<h3> Billing Information</h3>
<form method="post" action="" autocomplete="off">
  First Name: &nbsp<input type="text" name="firstname" minlength="1" maxlength="20" required>
  <br>
  <br>
  Last Name: &nbsp <input type="text" name="lastname" minlength="1" maxlength="20" required>
  <br>
  <br>
  Billing Address: &nbsp <input type="text" name="billing_address" minlength="1" maxlength="100" required>
  <br>
  <br>
  City: &nbsp <input type="text" name="city" minlength="1" maxlength="30" required>
  <br>
  <br>
  State: &nbsp <select name="state" required>
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>
  <br>
  <br>
  Zip Code: &nbsp <input type="text" name="zipcode" onkeypress="return isNumberKey(event)" minlength="5" maxlength="5" required>
  <br>
  <br>
  Card Number: &nbsp <input type="text" name="card_no" onkeypress="return isNumberKey(event)" minlength="16" maxlength="16" required>
  <br>
  <br>
  Expiration Date: &nbsp <input type="date" name="expr_date" id="expr_date" min="" required>
  <script type="text/javascript">
    var minstart = new Date();
    var dd = minstart.getDate();
    var mm = minstart.getMonth() + 1;
    var yyyy = minstart.getFullYear();
    if(dd<10){
      dd='0'+dd
    }
    if(mm<10){
      mm='0'+mm
    }
    minstart = yyyy+'-'+mm+'-'+dd;
    document.getElementById("expr_date").setAttribute("min", minstart);
</script>
  <br>
  <br>
  Security Code: &nbsp <input type="text" name="sec_key" onkeypress="return isNumberKey(event)" minlength="3" maxlength="3" required>
  <br>
  <br>
  License Number: &nbsp <input type="text" name="license_no" onkeypress="return isNumberKey(event)" minlength="8" maxlength="8" required>
  <br>
  <br>
  <input type="submit" value="Next">
</form>
</body>
</html>
