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

$timeOut = date('H:i:s');

/*
$sqlCalcLastID = 0;
$sql = "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'timetracker' AND TABLE_NAME = 'timetable'";
if ($conn->query($sql) === TRUE) {
    $sqlCalcLastID = $sql - 1;
} else {
    echo "Error - calclastID: " . $sql . "<br>" . $conn->error;
}
$conn->close();
*/

$sqlGetLstID = "SELECT MAX(timeID) AS max FROM timetable";
$result2 = $conn->query($sqlGetLstID);

$sql = "UPDATE timetable SET timeOut='$timeOut' WHERE timeID=$result2";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>