<!-- This file will save values and write to the database -->
<?php
//This is the directory where the receipt images will be saved
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
//Reads file path and converts to lower case if necessary
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo " Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo " Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats (JPG, PNG, JPEG, GIF)
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo " Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo " Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo " The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo " Sorry, there was an error uploading your file.";
    }
}
?>

<?php
//Identifying the server and database
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "billist";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$uploadedFile = basename( $_FILES["fileToUpload"]["name"]);

//Check if the submit button was clicked
if(isset($_POST['submit'])) {
//Server-side calculations
  $sliderValue = $_POST["slider"];
  $billAmount = $_POST["billAmount"];
  $tipAmount = $billAmount * ($sliderValue / 100);
  $totalBill = $billAmount + $tipAmount;

  //Inserting the values into the database (same names of phpMyAdmin columns)
  $sql = "INSERT INTO billentrees (restaurantName, theDate, billAmount, tipAmount, totalBill, imageFile)
  VALUES ('".$_POST["restaurantName"]."','".$_POST["date"]."','".$_POST["billAmount"]."','".$tipAmount."','".$totalBill."','".$uploadedFile."')";
}

//If everything was passed to the database...Success!
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
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

  <form id="billForm" method="post" action="index.php" enctype="multipart/form-data">
    <img src="images/billist_logo.PNG" alt="billist_logo">
    <input type="text" name="restaurantName" class="field textField" id="restaurantName" placeholder="Restaurant Name" maxlength="30" required> </br>
    <input type="text" name="date" id="datepicker" class="field textField" placeholder="Date" required>
    <input type="number" step="0.01" name="billAmount" class="field textField" id="billAmt" placeholder="Bill Amount ($)" required> </br>
    <p name="tipPercentage" class="field textField" id="tipPercentage">--%</p>
    <input type="range" class="slider" name="slider" min="0" max="100" step="1" value="50" id="slider"> </br>
    <input type="text" name="tipAmount" class="field textField" id="tipAmount" placeholder="Tip Amount ($)" readonly required> </br>
    <input type="text" name="totalAmount" class="field textField" placeholder="Total Bill Amount ($)" id="totalBill" readonly required> </br>
    <input type="file" name="fileToUpload" class="field textField" id="fileToUpload">
    <input type="submit" name="submit" class="field buttons" id="submit" onclick="saveValues()" value="Save This Bill">
    <input type="reset" name="clear" id="clear" class="field buttons" value="Clear">
  </form>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript" src="billist.js"></script>

</body>
</html>
