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
$nameErr = $emailErr = $commentErr = "";
$pname = $pemail  = $pcomment = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate user name
    if(empty($_POST["name"])){
        $nameErr = 'Please enter your name.';
    }else{
        $name = filterName($_POST["name"]);
        if($name == FALSE){
            $nameErr = 'Please enter a valid name.';
        } else {
          $pname = test_input($_POST["name"]); 
        }
    }
    
    // Validate email address
    if(empty($_POST["email"])){
        $emailErr = 'Please enter your email address.';     
    }else{
        $email = filterEmail($_POST["email"]);
        if($email == FALSE){
            $emailErr = 'Please enter a valid email address.';
        } else {
          $pemail = test_input($_POST["email"]); 
        }
    }
    
  
    
    // Validate user comment
    if(empty($_POST["comment"])){
        $commentErr = 'Please enter your comment.';     
    }else{
        $comment = filterString($_POST["comment"]);
        if($comment == FALSE){

            $commentErr = 'Please enter a valid comment.';
        }else{
          $pcomment = test_input($_POST["comment"]);
        }
    }

     $SQL = "INSERT INTO Contact (Name, Email, Comments) VALUES ('$pname', '$pemail', '$pcomment')";
     $result = $conn->query($SQL);
 
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
        Contact Path of Light Yoga Studio
     </h1>

     Required information is marked with an asterisk (*).

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
          <table class = "table">
          <tr class = "row">
            <th></th>
            <th></th> 
            <th> </th>
            
          </tr>
          <tr>
            <td class = "data"> * Name: </td>
            <td class = "value"><input type="text" name="name"/></td> 
            <td><?php echo $nameErr;?></td>
          </tr>

          <tr>
            <td></td>
            <td></td>

          </tr>

          <tr>
            <td class = "data"> * Email: </td>
            <td class = "value"><input type="email" id="email" name="email" value=""> </td>
            <td>  <?php echo $emailErr;?></td> 
           
          </tr>

          <tr>
            <td class = "data"></td>
            <td></td>
          </tr>

          <tr>
            <td class = "data"> * Comments: </td>
            <td class = "value"><textarea name="comment" rows="3" cols="30" > </textarea></td> 
            <td> <?php echo $commentErr;?> </td>
          </tr>

          <tr>
            <td></td>
            <td class = "value">
              <input type="submit" value="submit">
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
