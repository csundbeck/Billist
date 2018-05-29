<!-- This file will read from the database to the results page -->
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

          //Querying the database for all columns in the billentrees table
          $sql = "SELECT restaurantName, theDate, billAmount, tipAmount, totalBill, imageFile FROM billentrees";
          $result = $conn->query($sql);

          //If the query is not empty on return...
          if ($result->num_rows > 0) {
              // Output data of each row
              while($row = $result->fetch_assoc()) {
                  echo "<div class='record'><p style=\"color:#ffffff; font-size:18px; font-family:'Jockey One', sans-serif;\">" . "Date: " . $row["theDate"]. "
                  , Restaurant Name: " . $row["restaurantName"]. "
                  , Subtotal:  $" . $row["billAmount"]. "
                  , Tip Amount: $" . $row["tipAmount"] . "
                  , Total Bill: $" . $row["totalBill"] . "
                  , Reciept Image: <img src='/Billist/uploads/" . $row["imageFile"] . "'></p></div>";
              }

            //If it does return an empty query...
          } else {
              echo "<br /><h2 style=\"color:#ffffff; font-size: 30px; font-family:'Jockey One', sans-serif; text-align: center;\">" . "Your Billist is empty!" . "</h1><br />";
          }

          //Close the connection
          $conn->close();
      ?>

      <br />
      <a href="index.php"><input type="button" class="field buttons" id="clear-storage" value="New Bill"></a>
    </div>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="/Billist/billist.js"></script>

</body>
</html>
