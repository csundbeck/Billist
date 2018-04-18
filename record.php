<!DOCTYPE html>
<html>
  <head>
    <title>Billist</title>
      <link rel="stylesheet" href="style.css">
      <link href="https://fonts.googleapis.com/css?family=Jockey+One" rel="stylesheet">
  </head>

<style>
  body {
    background-color: #6A1B9A;
  }

  </style>

  <body>

    <div id="recordForm">
      <img src="images/billist_logo.PNG" alt="billist_logo">

      <?php
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

          $sql = "SELECT restaurantName, theDate, billAmount, tipAmount, totalBill FROM billentrees";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                  echo "<p style='color:#ffffff; font-size:18px; font-family:'Jockey One', sans-serif;'>" . "Date: " . $row["theDate"]. "
                  , Restaurant Name: " . $row["restaurantName"]. "
                  , Subtotal:  " . $row["billAmount"]. "
                  , Tip Amount: " . $row["tipAmount"] . "
                  , Total Bill: " . $row["totalBill"] . "</p>";
              }

          } else {
              echo "<p style='color:#ffffff; font-size:18px; font-family:'Jockey One', sans-serif;'>" . "Your Billist is empty!" . "</p>";
          }

          $conn->close();
      ?>

      <br />
      <a href="index.php"><input type="button" class="field buttons" id="clear-storage" value="New Bill"></a>
    </div>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="F:\Portfolio\Projects\Billist\Billist.js"></script>

</body>
</html>
