<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "quiz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, question, answer, hint FROM questions";
$result = $conn->query($sql);

$index = 0;
$myArray = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["question"]. " " . $row["answer"]. "<br>";
		$myArray[$index] = $row;
		$index++;
    }
} else {
    echo "0 results";
}

//echo var_dump($myArray);

$res = json_encode($myArray);
echo $res;

$conn->close();

?>