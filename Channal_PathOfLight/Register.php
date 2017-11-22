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

<?php
// Functions to filter user inputs
function filterName($field){
    // Sanitize user name
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    
    // Validate user name
    if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+/")))){
        return $field;
    }else{
        return FALSE;
    }
}    
function filterEmail($field){
    // Sanitize e-mail address
    $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
    
    // Validate e-mail address
    if(filter_var($field, FILTER_VALIDATE_EMAIL)){
        return $field;
    }else{
        return FALSE;
    }
}
function filterString($field){
    // Sanitize string
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if(!empty($field)){
        return $field;
    }else{
        return FALSE;
    }
}
 
// Define variables and initialize with empty values
$nameErr = $emailErr = $commentErr = $phoneErr= $classtypeErr = $scheduleErr = $passwordErr=  $timeErr ="";
$pname = $pemail  = $pcomment =  $timeid = $daysid = $classid = $time = $schedule = $classtype ="";
$nameflag = $emailflag = $phoneflag = $addressflag = $classtypeflag = $scheduleflag = $timeflag = $passwordflag = True;
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate user name
    if(empty($_POST["name"])){
        $nameErr = 'Please enter your name.';
        $nameflag = FALSE;

    }else{
        $name = filterName($_POST["name"]);
        if($name == FALSE){
            $nameErr = 'Please enter a valid name.';
            $nameflag = FALSE;
        } else {
          $pname = test_input($_POST["name"]); 
        }
    }
    
    // Validate email address
    // if(empty($_POST["email"])){
    //     $emailErr = 'Please enter your email address.';     
    // }else{
    //     $email = filterEmail($_POST["email"]);
    //     if($email == FALSE){
    //         $emailErr = 'Please enter a valid email address.';
    //     } else {
    //       $pemail = test_input($_POST["email"]); 
    //     }
    // }

     if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $emailflag=False;
  } else {
    $pemail = test_input($_POST["email"]);

    // check if e-mail address is well-formed
   if(!preg_match("/^(.+)@([^\.].*)\.([a-z]{2,})$/", $pemail)) {
      $emailErr = "Invalid email format"; 
      $emailflag=False;
    }
     
  }


    if (empty($_POST["cphone"])) {
    $phoneErr = "Phone number is required";
    $phoneflag=False;
  } else {
    $phone = test_input($_POST["cphone"]);
    // check if phone  is well-formed
    if(!preg_match("/^[0-9]{3}[0-9]{3}[0-9]{4}$/", $phone)) {
    // $phone is valid
       $phoneErr = "Invalid phone format(0000000000)";
       $phoneflag=False;
    }
    
  } 


   if (empty($_POST["ctime"])) {
    $timeErr = "time is required";
    $timeflag=False;
  } else {
    $time = test_input($_POST["ctime"]);
        
  }



    if (empty($_POST["cpassword"])) {
    $passwordErr = "password is required";
    $passwordflag=False;
  } else {
    $password = test_input($_POST["cpassword"]);
    // check if  password is well-formed
    $uppercase = preg_match('@[A-Z]@', $password);
    $number    = preg_match('@[0-9]@', $password);

    if(!$uppercase  || !$number || strlen($password) < 8) {
  // tell the user something went wrong
      $passwordErr = "password must be combination of characters, \n
      numbers\n
        and atleast an uppercase";
        $passwordflag=False;
    }
     
  } 
    
    // Validate user comment
    if(empty($_POST["comment"])){
        $commentErr = 'Please enter your address.'; 
         $addressflag = FALSE;    
    }else{
        $comment = filterString($_POST["comment"]);
        if($comment == FALSE){

            $commentErr = 'Please enter a valid address.';
             $addressflag = FALSE;
        }else{
          $pcomment = test_input($_POST["comment"]);
        }
    }

     if (empty($_POST["ctypeofclass"])) {
    $classtypeErr = "typeofclass is required";
    $classtypeflag=False;
    } else {
    $classtype = test_input($_POST["ctypeofclass"]);
    }


    if (empty($_POST["cschedule"])) {
      $scheduleErr = "schedule is required";
      $scheduleflag=False;
    } 
    else {
      $schedule = test_input($_POST["cschedule"]);
    }



    // POPULATE CLIENT
     if(!empty($password) and !empty($pname) and !empty($phone) and !empty($pcomment) and !empty($pemail) and
        preg_match("/^[0-9]{3}[0-9]{3}[0-9]{4}$/", $phone)
         and preg_match("/^(.+)@([^\.].*)\.([a-z]{2,})$/", $pemail) 
        and
        $passwordflag === TRUE and  $addressflag === TRUE and $phoneflag === TRUE)
     {

    $que4    = "INSERT INTO client VALUES (NULL,'$pname', '$phone','$pcomment','$pemail','$password')";
   $rq4 = $conn->query($que4) or  die("Client insertion failed");
     }



     // POPULATE CLIENT SCHEDULE

  
      $que1="SELECT c.classid from class c where c.classname='$classtype'";
  $result = $conn->query($que1);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $classid=$row["classid"];
    }
  }

   $que2="SELECT c.daysid from days c where c.daysname='$schedule'";
  $rq2 = $conn->query($que2);
  if ($rq2->num_rows > 0) {
    // output data of each row
    while($row2 = $rq2->fetch_assoc()) {
        $daysid=$row2["daysid"];
    }
  }


  $que3="SELECT t.timeid from time t where t.timeName='$time'";
  $rq3 = $conn->query($que3);
  if ($rq3->num_rows > 0) {
    // output data of each row
    while($row3 = $rq3->fetch_assoc()) {
        $timeid=$row3["timeid"];
    }
  }

   $que5="SELECT clientid from client where name='$name' ";
   $rq5 = $conn->query($que5);
   if ($rq5->num_rows > 0) {
    // output data of each row
    while($row5 = $rq5->fetch_assoc()) {
        $clientid=$row5["clientid"];
    }
  }

  $que8    = "INSERT INTO clientschedule VALUES ('$clientid', '$timeid','$classid','$daysid')";

   } 
 
   


  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }
        
?>

  <!-- Heading -->
  <div class = "header">
   <h1> Path of Light Yoga Studio </h1>
  </div>


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
     <h1>
        Register Path of Light Yoga Studio
     </h1>

     Required information is marked with an asterisk (*).

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" novalidate>
          <table class = "table" >
          <tr class = "row">
            <th></th>
            <th></th> 
            
          </tr>
          <tr class = "row">
            <td class = "data"> * Name: </td>
            <td class = "value"><input type="text" id="name" name="name"/> </td>
            <td><?php echo $nameErr;?></td> 
          </tr>

          <tr class = "row">
            <td></td>
            <td></td>

          </tr>

          <tr class = "row">
            <td class = "data"> * Email: </td>
            <td class = "value"><input type="email" id="email" name="email" value=""></td>
            <td>  <?php echo $emailErr;?></td>  
          </tr class = "row">

           <tr>
            <td class = "data"> * Phone: </td>
            <td class = "value"><input type="text" id="phone" name="cphone" value=""></td>
             <td> <?php echo $phoneErr;?></td>
          </tr>

          <tr>
              <td class = "data">*Password:</td>
              <td class = "value"><input type="password" name="cpassword"  value=""</input></td>
              <td> <?php echo $passwordErr;?></td>
          </tr>

          <tr class = "row">
            <td class = "data"> * Address: </td>
            <td class = "value">
              <textarea rows="3" cols="30" name="comment" ></textarea></td> 
              <td> <?php echo $commentErr;?> </td>
          </tr>
          
          <tr class = "row">
            <td class = "data"> * Type of Class: </td>
            <td>
              <select name="ctypeofclass">
                <?php 
                $sql = mysqli_query($conn, "SELECT classname FROM class");
                while ($row = $sql->fetch_assoc()){
                ?>
                <option value="<?php echo $row['classname']; ?>"><?php echo $row['classname']; ?></option>
                <?php
                }
                ?>
              </select>
          </td>
          <td>  <span class="error"><small><?php echo $classtypeErr;?></small></span></td>

          </tr>

           <tr class = "row">
            <td class = "data"> * Schedule: </td>

            <td>
            <select name="cschedule">
            <?php 
            $sql = mysqli_query($conn, "SELECT daysname FROM days");
            while ($row = $sql->fetch_assoc()){
            ?>
            <option value="<?php echo $row['daysname']; ?>"><?php echo $row['daysname']; ?></option>
            <?php
            }
            ?>
          </select>
          </td>

           <td> <span class="error"><small><?php echo $scheduleErr;?></small></span>
           </td>
          </tr>



          <tr class = "row">
            <td class = "data"> * Time: </td>
               <td>
            <select name="ctime">
            <?php 

            $sql = mysqli_query($conn, "SELECT TimeName FROM Time");

            while ($row = $sql->fetch_assoc()){

            ?>
            <option value="<?php echo $row['TimeName']; ?>"><?php echo $row['TimeName']; ?></option>

            <?php
            // close while loop 
            }
            ?></select>
          </td>
          <td>  <span class="error"><small><?php echo $timeErr;?></small></span></td>
          </tr>

          <tr class = "row">
            <td></td>
            <td class = "value">
              <button type="submit" name="Register" onClick ="clearform();"> Send Now </button>
            </td>

          </tr>
        </table>

      </form>
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



