<?php
$servername = "setapproject.org";
$username = "csc412";
$password = "csc412";
$dbname = "csc412";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

// If Submit button pressed, insert into the table

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $name = $email = $gender = $comment = $website = "";

  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $company = test_input($_POST["company"]);
  $message = test_input($_POST["message"]);



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
    
    
   $sql = "INSERT INTO `JdombrowskiMail`(`name`, `company`,`email`,`message`) "
          . "VALUES ('$_POST[name]','$_POST[email]','$_POST[company]','$_POST[message]')";

   if ($conn->query($sql) === TRUE) {
       echo "";
   } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
   }
}
mysql_query($sql,$con);
mysql_close($con);
?>