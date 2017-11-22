<!doctype html>
<html lang="en-US">
<head>
    <title>Path of Light</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="yoga.css">
</head>
<div class= "wrapper">
<body>

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
  
  <div class = "header">
      <h1> Path of Light Yoga Studio </h1>
  </div>


  
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

  <div class = "col-10">
     <img src="yogalounge.jpg" alt="yogamat" style="width: 70%;height:38%;">
  <h2>Yoga Schedule</h2>
  <p>
  Mats, blocks, and blankets will be provided. Please arrive 10 minutes before your class begins. Relax in our Serinity Lounge before or after your class.</p> 

  <h3> 
     <?php
      $sql = "SELECT Daysname FROM Days where DaysId = 1";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
          echo "<br>". $row["Daysname"]."<br>";
          }
      } 
      else {
        echo "0 results";
      }

      ?>
  </h3>
    <ul>
        <?php
      $sql = "SELECT TimeName from time tn, schedule sc where  sc.ScheduleId =1  AND sc.TimeId =tn.TimeId";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
           echo "<li>". $row["TimeName"]."<nbsp>";
          }
      } 
      else {
        echo "0 results";
      }

      ?>

      <?php
      $sql = "SELECT ClassName from Class cn, schedule sc where  sc.ScheduleId =1  AND sc.ClassId =cn.ClassId";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
           echo "<nbsp>". $row["ClassName"]."<br>";
          }
      } 
      else {
        echo "0 results";
      }

      ?>

     
        <?php
      $sql = "SELECT TimeName from time tn, schedule sc where  sc.ScheduleId =2  AND sc.TimeId =tn.TimeId";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
           echo "<li>". $row["TimeName"]."<nbsp>";
          }
      } 
      else {
        echo "0 results";
      }

      ?>

      <?php
      $sql = "SELECT ClassName from Class cn, schedule sc where  sc.ScheduleId =2  AND sc.ClassId =cn.ClassId";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
           echo "<nbsp>". $row["ClassName"]."<br>";
          }
      } 
      else {
        echo "0 results";
      }

      ?>

        <?php
      $sql = "SELECT TimeName from time tn, schedule sc where  sc.ScheduleId =3  AND sc.TimeId =tn.TimeId";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
           echo "<li>". $row["TimeName"]."<nbsp>";
          }
      } 
      else {
        echo "0 results";
      }

      ?>

      <?php
      $sql = "SELECT ClassName from Class cn, schedule sc where  sc.ScheduleId =3  AND sc.ClassId =cn.ClassId";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
           echo "<nbsp>". $row["ClassName"]."<br>";
          }
      } 
      else {
        echo "0 results";
      }

      ?>

  
        <?php
      $sql = "SELECT TimeName from time tn, schedule sc where  sc.ScheduleId =4  AND sc.TimeId =tn.TimeId";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
           echo "<li>". $row["TimeName"]."<nbsp>";
          }
      } 
      else {
        echo "0 results";
      }

      ?>

      <?php
      $sql = "SELECT ClassName from Class cn, schedule sc where  sc.ScheduleId =4  AND sc.ClassId =cn.ClassId";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
           echo "<nbsp>". $row["ClassName"]."<br>";
          }
      } 
      else {
        echo "0 results";
      }

      ?>

    </ul>


   <h3> 
    <?php
      $sql = "SELECT Daysname FROM Days where DaysId = 2";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
          echo "<br>". $row["Daysname"]."<br>";
          }
      } 
      else {
        echo "0 results";
      }

      ?>
   </h3>
    <ul class = "scheduleFoot">
      
        <?php
      $sql = "SELECT TimeName from time tn, schedule sc where  sc.ScheduleId =5  AND sc.TimeId =tn.TimeId";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
           echo "<li>". $row["TimeName"]."<nbsp>";
          }
      } 
      else {
        echo "0 results";
      }

      ?>

      <?php
      $sql = "SELECT ClassName from Class cn, schedule sc where  sc.ScheduleId =5  AND sc.ClassId =cn.ClassId";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
           echo "<nbsp>". $row["ClassName"]."<br>";
          }
      } 
      else {
        echo "0 results";
      }

      ?>

  
       <?php
      $sql = "SELECT TimeName from time tn, schedule sc where  sc.ScheduleId =6  AND sc.TimeId =tn.TimeId";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
           echo "<li>". $row["TimeName"]."<nbsp>";
          }
      } 
      else {
        echo "0 results";
      }

      ?>

      <?php
      $sql = "SELECT ClassName from Class cn, schedule sc where  sc.ScheduleId =6  AND sc.ClassId =cn.ClassId";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
           echo "<nbsp>". $row["ClassName"]."<br>";
          }
      } 
      else {
        echo "0 results";
      }

      ?>

        <?php
      $sql = "SELECT TimeName from time tn, schedule sc where  sc.ScheduleId =7  AND sc.TimeId =tn.TimeId";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
           echo "<li>". $row["TimeName"]."<nbsp>";
          }
      } 
      else {
        echo "0 results";
      }

      ?>

      <?php
      $sql = "SELECT ClassName from Class cn, schedule sc where  sc.ScheduleId =7  AND sc.ClassId =cn.ClassId";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
           echo "<nbsp>". $row["ClassName"]."<br>";
          }
      } 
      else {
        echo "0 results";
      }

      ?>

        <?php
      $sql = "SELECT TimeName from time tn, schedule sc where  sc.ScheduleId =8  AND sc.TimeId =tn.TimeId";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
           echo "<li>". $row["TimeName"]."<nbsp>";
          }
      } 
      else {
        echo "0 results";
      }

      ?>

      <?php
      $sql = "SELECT ClassName from Class cn, schedule sc where  sc.ScheduleId =8  AND sc.ClassId =cn.ClassId";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
           echo "<nbsp>". $row["ClassName"]."<br>";
          }
      } 
      else {
        echo "0 results";
      }

      ?>
        <?php
      $sql = "SELECT TimeName from time tn, schedule sc where  sc.ScheduleId =9  AND sc.TimeId =tn.TimeId";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
           echo "<li>". $row["TimeName"]."<nbsp>";
          }
      } 
      else {
        echo "0 results";
      }

      ?>

      <?php
      $sql = "SELECT ClassName from Class cn, schedule sc where  sc.ScheduleId =9  AND sc.ClassId =cn.ClassId";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
           echo "<nbsp>". $row["ClassName"]."<br>";
          }
      } 
      else {
        echo "0 results";
      }

      ?>


    </ul>    
 
   </div> 
     <div class = "col-12 footer">
          
          <i>Copyright @2017 Path of Light Yoga Studio</i>
           </br>
          <a href="mailto:padmavati@channal.com"> padmavati@channal.com </a>
          
    </div>
   

</body>
</div>
</html>
