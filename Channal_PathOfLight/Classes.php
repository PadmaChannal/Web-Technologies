<!doctype html>
<html lang="en-US">

<head>
    <title>Path of Light</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="yoga.css">
</head>

<div class= "wrapper">
<body>
  <!-- Heading -->
  <div class = "header">
   <h1> Path of Light Yoga Studio </h1>
  </div>

    <?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Yoga";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>

<!-- Links to other pages -->
  <div class = "menu col-2">
          <ul>
            <li>
              <a href="http://localhost:1234/Channal_PathOfLight/Index.php">Home</a>  
            </li>
            <li>
              <a href="http://localhost:1234/Channal_PathOfLight/Classes.php"> Classes</a>
            </li> 
            <li>
              <a href="http://localhost:1234/Channal_PathOfLight/Schedule.php">Schedule</a> 
            </li>
            <li>
              <a href="http://localhost:1234/Channal_PathOfLight/Register.php">Register</a>  
            </li>
            <li>
              <a href="http://localhost:1234/Channal_PathOfLight/Contact.php" >Contact</a>
            </li>
          </ul>
        </div>

<!-- Sub headings and paragraph descriptions -->
  <div class = "col-10">
     <img src="yogamat.jpg" alt="yogamat" width="75%">
<div class = "classDescription">
  
  <h2>Yoga Classes</h2>
    <h3> <?php
      $sql = "SELECT Classname FROM Class where ClassId = 1";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
          echo "<br>". $row["Classname"]."<br>";
          }
      } 
      else {
        echo "0 results";
      }
      
      
  ?> </h3>
	<p> 
    <?php
      $sql = "SELECT Description FROM Class where ClassName ='Gentle Hatha Yoga'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
          echo "<br>". $row["Description"]."<br>";
          }
      } 
      else {
        echo "0 results";
      }
      
      
  ?>
</p>

  <h3><?php
      $sql = "SELECT Classname FROM Class where ClassId = 2";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
          echo "<br>". $row["Classname"]."<br>";
          }
      } 
      else {
        echo "0 results";
      }
      
      
  ?></h3>
    <p> 
    <?php
      $sql = "SELECT Description FROM Class where ClassName ='Vinyasa Yoga'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
          echo "<br>". $row["Description"]."<br>";
          }
      } 
      else {
        echo "0 results";
      }
      
      
  ?>
</p>
  <h3> <?php
      $sql = "SELECT Classname FROM Class where ClassId = 3";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
          echo "<br>". $row["Classname"]."<br>";
          }
      } 
      else {
        echo "0 results";
      }
      
      
  ?></h3>
   <p> 
    <?php
      $sql = "SELECT Description FROM Class where ClassName ='Restorative Yoga'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
          echo "<br>". $row["Description"]."<br>";
          }
      } 
      else {
        echo "0 results";
      }
      
      $conn->close();
  ?>
</p>
 </div>

  </div>

<!-- Footer -->
   <div class = "col-12 footer">
          
          <i>Copyright @2017 Path of Light Yoga Studio</i>
           </br>
          <a href="mailto:padmavati@channal.com"> padmavati@channal.com </a>
          
        </div>

</body>
</div>
</html>
