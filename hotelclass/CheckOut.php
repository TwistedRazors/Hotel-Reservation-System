
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

mysqli_select_db($conn,"hotel");
$id = $_GET['empid'];
$SQLstring = "SELECT * FROM room WHERE Vacancy='No'";



$QueryResult =  @mysqli_query($conn, $SQLstring);

echo "<table width='52%' border='1' id='single'>\n";
echo "<tr><th>Room Number</th><th>Vacant?</th></tr>\n";
  while(($Value = mysqli_fetch_row($QueryResult))!= FALSE)
  {
    echo "<tr><td align='center'>{$Value[0]}</td>";
    echo "<td align='center'>{$Value[1]}</td>";
    echo "<td align='center'><a href='CheckedOut.php?empid=$id&out={$Value[0]}'>Check Out</a></td>";
  }
  ?>
