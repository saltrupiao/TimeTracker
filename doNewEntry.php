<?php
/**
 * Created by PhpStorm.
 * User: saltrupiano
 * Date: 3/11/20
 * Time: 9:43 PM
 */

$servername = "localhost";
$username = "root";
$password = "oakland";
$dbname = "timetracker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$dateIn = date('Y-m-d H:i:s');;
$timeIn = filter_input(INPUT_POST, 'timeIn');
$timeOut = filter_input(INPUT_POST, 'timeOut');
$clientIn = filter_input(INPUT_POST, 'clientIn');
$description = filter_input(INPUT_POST, 'description');

$sql = "INSERT INTO timetable (date, timeIn, timeOut, clientIn, description)
VALUES ('$dateIn', '$timeIn', '$timeOut', '$clientIn', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>