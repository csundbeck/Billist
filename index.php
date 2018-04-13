<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "billist";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])) {

  $sliderValue = $_POST["slider"];
  $billAmount = $_POST["billAmount"];
  $tipAmount = $billAmount * ($sliderValue / 100);
  $totalBill = $billAmount + $tipAmount;

  $sql = "INSERT INTO billentrees (restaurantName, theDate, billAmount, tipAmount, totalBill)
  VALUES ('".$_POST["restaurantName"]."','".$_POST["date"]."','".$_POST["billAmount"]."','".$tipAmount."','".$totalBill."')";
}

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Billist</title>
      <link rel="stylesheet" href="style.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jockey+One">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  </head>

<style>
  body {
    background-color: #6A1B9A;
  }
  </style>

  <body>

  <a id="view-bills" href="record.php">View My Billist</a>

  <form id="billForm" method="post" action="index.php">
    <img src="images/billist_logo.PNG" alt="billist_logo">
    <input type="text" name="restaurantName" class="field textField" id="restaurantName" placeholder="Restaurant Name" required> </br>
    <input type="date" name="date" class="field textField" id="date-box" required>
    <!-- <input type="text" name="date" id="datepicker" class="field textField" placeholder="Date" required> -->
    <input type="number" step="0.01" name="billAmount" class="field textField" id="billAmt" placeholder="Bill Amount ($)" required> </br>
    <p name="tipPercentage" class="field textField" id="tipPercentage">--%</p>
    <input type="range" class="slider" name="slider" min="0" max="100" step="1" value="50" id="slider"> </br>
    <input type="text" name="tipAmount" class="field textField" id="tipAmount" placeholder="Tip Amount ($)" readonly required> </br>
    <input type="text" name="totalAmount" class="field textField" placeholder="Total Bill Amount ($)" id="totalBill" readonly required> </br>
    <input type="submit" name="submit" class="field buttons" id="submit" onclick="saveValues()" value="Save This Bill">
    <input type="reset" name="clear" id="clear" class="field buttons" value="Clear">
  </form>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript" src="Billist.js"></script>

</body>
</html>
