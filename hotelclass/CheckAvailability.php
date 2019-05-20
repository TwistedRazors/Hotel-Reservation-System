
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

$Vacancy = $_POST["Vacant?"];
$id = $_GET['empid'];
mysqli_select_db($conn,"hotel");
$SQLstring = "SELECT * FROM room WHERE Vacancy='Yes' AND Type='Single'";
$SQLstring2 = "SELECT * FROM room WHERE Vacancy='Yes' AND Type='Double'";
$SQLstring3 = "SELECT * FROM room WHERE Vacancy='Yes' AND Type='Queen'";
$SQLstring4 = "SELECT * FROM room WHERE Vacancy='Yes' AND Type='King'";
$SQLstring5 = "SELECT * FROM room WHERE Vacancy='Yes' AND Type='Double Queen'";
$SQLstring6 = "SELECT * FROM room WHERE Vacancy='Yes' AND Type='Double King'";
$SQLstring7 = "SELECT * FROM room WHERE Vacancy='Yes' AND Type='Suite'";
$SQLstring8 = "SELECT * FROM room WHERE Vacancy='Yes' AND Type='Presidential'";


$QueryResult =  @mysqli_query($conn, $SQLstring);
$QueryResult2 =  @mysqli_query($conn, $SQLstring2);
$QueryResult3 =  @mysqli_query($conn, $SQLstring3);
$QueryResult4 =  @mysqli_query($conn, $SQLstring4);
$QueryResult5 =  @mysqli_query($conn, $SQLstring5);
$QueryResult6 =  @mysqli_query($conn, $SQLstring6);
$QueryResult7 =  @mysqli_query($conn, $SQLstring7);
$QueryResult8 =  @mysqli_query($conn, $SQLstring8);


if (mysqli_num_rows($QueryResult) > 0) {
  echo"<h1>Single</h1>";
  echo "<table width='52%' border='1' id='single'>\n";
  echo "<tr><th>Room Number</th><th>Vacant?</th></tr>\n";
  while(($Value = mysqli_fetch_row($QueryResult))!= FALSE)
  {
    echo "<tr><td align='center'>{$Value[0]}</td>";
    echo "<td align='center'>{$Value[1]}</td>";
    echo "<td align='center'><a href = CheckIn.php?empid=$id&roomno={$Value[0]}>Check In</a></td>";
  }
  echo "</table>";
}

if (mysqli_num_rows($QueryResult2) > 0) {
  echo"<h1>Double</h1>";
  echo "<table width='52%' border='1'>\n";
  echo "<tr><th>Room Number</th><th>Vacant?</th></tr>\n";
  while(($Value2 = mysqli_fetch_row($QueryResult2))!= FALSE)
  {
    echo "<tr><td align='center'>{$Value2[0]}</td>";
    echo "<td align='center'>{$Value2[1]}</td>";
    echo "<td align='center'><a href = CheckIn.php?empid=$id&roomno={$Value2[0]}>Check In</a></td>";
  }
  echo "</table>";
}

if (mysqli_num_rows($QueryResult3) > 0) {
  echo"<h1>Queen</h1>";
  echo "<table width='52%' border='1'>\n";
  echo "<tr><th>Room Number</th><th>Vacant?</th></tr>\n";
  while(($Value3 = mysqli_fetch_row($QueryResult3))!= FALSE)
  {
    echo "<tr><td align='center'>{$Value3[0]}</td>";
    echo "<td align='center'>{$Value3[1]}</td>";
    echo "<td align='center'><a href = CheckIn.php?empid=$id&roomno={$Value3[0]}>Check In</a></td>";
  }
  echo "</table>";
}

if (mysqli_num_rows($QueryResult4) > 0) {
  echo"<h1>King</h1>";
  echo "<table width='52%' border='1'>\n";
  echo "<tr><th>Room Number</th><th>Vacant?</th></tr>\n";
  while(($Value4 = mysqli_fetch_row($QueryResult4))!= FALSE)
  {
    echo "<tr><td align='center'>{$Value4[0]}</td>";
    echo "<td align='center'>{$Value4[1]}</td>";
    echo "<td align='center'><a href = CheckIn.php?empid=$id&roomno={$Value4[0]}>Check In</a></td>";
  }
  echo "</table>";
}

if (mysqli_num_rows($QueryResult5) > 0) {
  echo"<h1>Double Queen</h1>";
  echo "<table width='52%' border='1'>\n";
  echo "<tr><th>Room Number</th><th>Vacant?</th></tr>\n";
  while(($Value5 = mysqli_fetch_row($QueryResult5))!= FALSE)
  {
    echo "<tr><td align='center'>{$Value5[0]}</td>";
    echo "<td align='center'>{$Value5[1]}</td>";
    echo "<td align='center'><a href = CheckIn.php?empid=$id&roomno={$Value5[0]}>Check In</a></td>";
  }
  echo "</table>";
}

if (mysqli_num_rows($QueryResult6) > 0) {
  echo"<h1>Double King</h1>";
  echo "<table width='52%' border='1'>\n";
  echo "<tr><th>Room Number</th><th>Vacant?</th></tr>\n";
  while(($Value6 = mysqli_fetch_row($QueryResult6))!= FALSE)
  {
    echo "<tr><td align='center'>{$Value6[0]}</td>";
    echo "<td align='center'>{$Value6[1]}</td>";
    echo "<td align='center'><a href = CheckIn.php?empid=$id&roomno={$Value6[0]}>Check In</a></td>";
  }
  echo "</table>";
}

if (mysqli_num_rows($QueryResult7) > 0) {
  echo"<h1>Suite</h1>";
  echo "<table width='52%' border='1'>\n";
  echo "<tr><th>Room Number</th><th>Vacant?</th></tr>\n";
  while(($Value7 = mysqli_fetch_row($QueryResult7))!= FALSE)
  {
    echo "<tr><td align='center'>{$Value7[0]}</td>";
    echo "<td align='center'>{$Value7[1]}</td>";
    echo "<td align='center'><a href = CheckIn.php?empid=$id&roomno={$Value7[0]}>Check In</a></td>";
  }
  echo "</table>";
}

if (mysqli_num_rows($QueryResult8) > 0) {
  echo"<h1>Presidential</h1>";
  echo "<table width='52%' border='1'>\n";
  echo "<tr><th>Room Number</th><th>Vacant?</th></tr>\n";
  while(($Value8 = mysqli_fetch_row($QueryResult8))!= FALSE)
  {
    echo "<tr><td align='center'>{$Value8[0]}</td>";
    echo "<td align='center'>{$Value8[1]}</td>";
    echo "<td align='center'><a href = CheckIn.php?empid=$id&roomno={$Value8[0]}>Check In</a></td>";
  }
  echo "</table>";
}
 ?>
