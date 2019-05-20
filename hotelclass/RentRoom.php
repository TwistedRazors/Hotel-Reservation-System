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

$start = $_POST['start_date'];
$end = $_POST['end_date'];
$type = $_POST['type'];
$username = $_GET['user'];

$SQLstring = "SELECT DISTINCT Price, Description FROM room WHERE Type='Single'";
$SQLstring2 = "SELECT DISTINCT Price, Description FROM room WHERE Type='Double'";
$SQLstring3 = "SELECT DISTINCT Price, Description FROM room WHERE Type='Queen'";
$SQLstring4 = "SELECT DISTINCT Price, Description FROM room WHERE Type='King'";
$SQLstring5 = "SELECT DISTINCT Price, Description FROM room WHERE Type='Double_Queen'";
$SQLstring6 = "SELECT DISTINCT Price, Description FROM room WHERE Type='Double_King'";
$SQLstring7 = "SELECT DISTINCT Price, Description FROM room WHERE Type='Suite'";
$SQLstring8 = "SELECT DISTINCT Price, Description FROM room WHERE Type='Presidential'";

$QueryResult = mysqli_query($conn, $SQLstring) or die(mysqli_error($conn));
$QueryResult2 = mysqli_query($conn, $SQLstring2) or die(mysqli_error($conn));
$QueryResult3 = mysqli_query($conn, $SQLstring3) or die(mysqli_error($conn));
$QueryResult4 = mysqli_query($conn, $SQLstring4) or die(mysqli_error($conn));
$QueryResult5 = mysqli_query($conn, $SQLstring5) or die(mysqli_error($conn));
$QueryResult6 = mysqli_query($conn, $SQLstring6) or die(mysqli_error($conn));
$QueryResult7 = mysqli_query($conn, $SQLstring7) or die(mysqli_error($conn));
$QueryResult8 = mysqli_query($conn, $SQLstring8) or die(mysqli_error($conn));

$Value = mysqli_fetch_row($QueryResult);
$Value2 = mysqli_fetch_row($QueryResult2);
$Value3 = mysqli_fetch_row($QueryResult3);
$Value4 = mysqli_fetch_row($QueryResult4);
$Value5 = mysqli_fetch_row($QueryResult5);
$Value6 = mysqli_fetch_row($QueryResult6);
$Value7 = mysqli_fetch_row($QueryResult7);
$Value8 = mysqli_fetch_row($QueryResult8);
if ($_POST) {
  echo "<script> location.href='http://localhost/hotelclass/BillingInformation.php?user=$username&start_date=$start&end_date=$end&type=$type'; </script>";
  mysqli_close($conn);
  exit;
}
?>
<html>
<head>
<link rel="stylesheet" href="Style.css">
<script
  type="text/javascript"
  src="//code.jquery.com/jquery-2.1.3.js">
</script>
  <script type="text/javascript">
      $(window).load(function(){
        $("select").change(function() {
              $('.room').hide();
              $('.' + $(':selected', this).attr('value')).show();
        });
      });
      </script>
<div>
  <form action="" id="rooms" method="post">
      <select name='type' required>
        <option style="display: none;" value="">Choose Room</option>
        <option value="single">Single</option>
        <option value="double">Double</option>
        <option value="queen">Queen</option>
        <option value="king">King</option>
        <option value="double_queen">Double Queen</option>
        <option value="double_king">Double King</option>
        <option value="suite">Suite</option>
        <option value="presidential">Presidential</option>
      </select>
    </div>
    Start Date: &nbsp<input type="date" name="start_date" id="start_date" min="" max="" required>
    <br>
    End Date: &nbsp<input type="date" name="end_date" id="end_date" min="" max="" required>
    <br>
    <div class="single room">
      <div id="description1">
        <?php echo"{$Value[1]}";?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <b>Price per night:</b> $<?php echo"{$Value[0]}";?>
      </div>
        <img src="Pictures\Single.jpg" id="single" />
    </div>
    <div class="double room">
      <div id="description2">
        <?php echo"{$Value2[1]}";?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <b>Price per night:</b> $<?php echo"{$Value2[0]}";?>
        </div>
        <img src="Pictures\Double.jpg" id="double"/>
    </div>
    <div class="queen room">
      <div id="description3">
        <?php echo"{$Value3[1]}";?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <b>Price per night:</b> $<?php echo"{$Value3[0]}";?>
        </div>
        <img src="Pictures\Queen.jpg" id="queen"/>
    </div>
    <div class="king room">
      <div id="description4">
        <?php echo"{$Value4[1]}";?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <b>Price per night:</b> $<?php echo"{$Value4[0]}";?>
        </div>
        <img src="Pictures\King.jpg" id="king"/>
    </div>
    <div class="double_queen room">
      <div id="description5">
        <?php echo"{$Value5[1]}";?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <b>Price per night:</b> $<?php echo"{$Value5[0]}";?>
        </div>
        <img src="Pictures\Double Queen.jpg" id="doublequeen"/>
    </div>
    <div class="double_king room">
      <div id="description6">
        <?php echo"{$Value6[1]}";?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <b>Price per night:</b> $<?php echo"{$Value6[0]}";?>
        </div>
        <img src="Pictures\Double King.jpg" id="doubleking"/>
    </div>
    <div class="suite room">
      <div id="description7">
        <?php echo"{$Value7[1]}";?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <b>Price per night:</b> $<?php echo"{$Value7[0]}";?>
        </div>
        <img src="Pictures\Suite.jpeg" id="suite"/>
    </div>
    <div class="presidential room">
      <div id="description8">
        <?php echo"{$Value8[1]}";?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <b>Price per night:</b> $<?php echo"{$Value8[0]}";?>
        </div>
        <img src="Pictures\Presidential.jpg" id="presidential" />
    </div>
    <input type="submit" value="Submit">

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

      var maxstart = new Date();
      var dd2 = maxstart.getDate();
      var mm2 = maxstart.getMonth() + 1;
      var yyyy2 = maxstart.getFullYear() + 1;
      if(dd2<10){
        dd2='0'+dd2
      }
      if(mm2<10){
        mm2='0'+mm2
      }
      maxstart = yyyy2+'-'+mm2+'-'+dd2;

      var minend = new Date();
      var dd3 = minend.getDate() + 1;
      var mm3 = minend.getMonth() + 1;
      var yyyy3 = minend.getFullYear();
      if(dd3<10){
        dd3='0'+dd3
      }
      if(mm3<10){
        mm3='0'+mm3
      }
      minend = yyyy3+'-'+mm3+'-'+dd3;

      var maxend = new Date();
      var dd4 = maxend.getDate() + 1;
      var mm4 = maxend.getMonth() + 1;
      var yyyy4 = maxend.getFullYear() + 2;
      if(dd4<10){
        dd4='0'+dd4
      }
      if(mm4<10){
        mm4='0'+mm4
      }
      maxend = yyyy4+'-'+mm4+'-'+dd4;

      document.getElementById("start_date").setAttribute("min", minstart);
      document.getElementById("start_date").setAttribute("max", maxstart);
      document.getElementById("end_date").setAttribute("min", minend);
      document.getElementById("end_date").setAttribute("max", maxend);
    </script>

  </form>
    </head>
  </html>
