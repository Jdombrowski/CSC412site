<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="temp.css">
    <div class ="inputGroup">
        <form id="contact_form" method="POST" action="insertform.php" >
            <div class="row">
                <label for="name">Your Name:</label><br />
                <input id="name" class="input" name="name" type="text" value="" size="30" /><br />
            </div>

            <div class="row">
                <label for="email">Email:</label><br />
                <input id="email" class="input" name="email" type="text" value="" size="30" /><br />
            </div>

            <div class="row">
                <label for="company">Company/Label Name:</label><br />
                <input id="company" class="input" name="company" type="text" value="" size="30" /><br />
            </div>

            <div class="row">
                <label for="message">Message:</label><br />
                <textarea id="message" class="input" name="message" rows="7" cols="30"></textarea><br />
            </div>
            <input id="submit_button" type="submit" value="Send email" />
        </form>
    </div>

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