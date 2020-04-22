<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Title </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
<nav class="nav nav-pills nav-fill">
    <a class="nav-item nav-link active" href="admin.php">Home</a>
    <a class="nav-item nav-link" href="index.php">Timeclock</a>
</nav>

<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <h5 class="card-header">Timeboard</h5>
                <div class="card-body">
                    <h5 class="card-title">Recent entries</h5>
                    <form method="get" action="newEntry.php">
                        <button type="submit" class="btn btn-primary" name="newEntry">New Entry</button>
                    </form>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time In</th>
                            <th scope="col">Time Out</th>
                            <th scope="col">Total Hours</th>
                            <th scope="col">Client</th>
                            <th scope="col">Work Description</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        //https://www.w3schools.com/php/php_mysql_select.asp
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

                        $sql = "SELECT * FROM timetable ORDER BY timeID DESC";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                                echo "<form method='post' action='editEntry.php'>";
                                echo "<tr><td>";
                                echo $row["timeID"];
                                echo "</td><td>";
                                echo $row["date"];
                                echo "</td><td>";
                                echo $row["timeIn"];
                                echo "</td><td>";
                                echo $row["timeOut"];
                                echo "</td><td>";
                                $timeIn = $row["timeIn"];
                                $timeOut = $row["timeOut"];
                                $timeDiff = abs(strtotime($timeOut) - strtotime($timeIn));
                                $timeTotal = $timeDiff/60;
                                $timeTotalHrs = floor($timeTotal/60);
                                $mins = $timeTotal%60;
                                echo $timeTotalHrs . " Hours, " . $mins . " Minutes";
                                echo "</td><td>";
                                echo $row["client"];
                                echo "</td><td>";
                                echo $row["description"];
                                echo "</td><td><button type=\"submit\" value=";
                                echo $row["timeID"];
                                echo " class=\"btn btn-primary\" name=\"editEntry\">Edit</button></td></tr>";
                                echo "</form>";
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
