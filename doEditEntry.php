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

$timeID = filter_input(INPUT_POST, 'timeID');
$dateIn = date('Y-m-d');;
$timeIn = filter_input(INPUT_POST, 'timeIn');
$timeOut = filter_input(INPUT_POST, 'timeOut');
$clientIn = filter_input(INPUT_POST, 'client');
$description = filter_input(INPUT_POST, 'description');

$sql = "UPDATE timetable SET date='$dateIn', timeIn='$timeIn', timeOut='$timeOut', client='$clientIn', description='$description' WHERE timeID='$timeID'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>