<html>
    <div class="quoteBox">
        <link rel="stylesheet" type="text/css" href="temp.css">
        <body>
            <h1>
                <button type="button"><a href="quotes.html">Back</button>
            </h1>
    </div>
</html>

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

$sql = "SELECT quote, author FROM Jdombrowski";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table cellpadding='10' align='center'><tr><th>Quote</th><th>Name</th></tr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td valign='baseline'>"  $row["quote"] . "</td><td valign='baseline'>" . $row["author"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>