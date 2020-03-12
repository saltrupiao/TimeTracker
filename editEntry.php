<?php
if(!empty($_GET['editEntry'])){
    //DB details
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = 'oakland';
    $dbName = 'timetracker';

    $timeIDForm = $_GET['editEntry'];

    //Create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($db->connect_error) {
        die("Unable to connect database: " . $db->connect_error);
    }

    //get content from database
    $query = $db->query("SELECT * FROM timetable WHERE timeID = {$timeIDForm}");

    if($query->num_rows > 0){
        //$invData = $query->fetch_assoc();
        echo "<!DOCTYPE html>
      <html lang=\"en\">
        <head>
            <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600\">
            <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css\" integrity=\"sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS\" crossorigin=\"anonymous\">
            <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.7.0/css/all.css\" integrity=\"sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ\" crossorigin=\"anonymous\">
            <link rel=\"stylesheet\" href=\"../assets/css/animate.css\">
            <link rel=\"stylesheet\" href=\"../assets/css/profile.css\">
            <link rel=\"stylesheet\" href=\"../assets/css/media-queries.css\">
            <link rel=\"stylesheet\" href=\"../assets/css/carousel.css\">
            <meta name=\"msapplication-TileColor\" content=\"#da532c\">
            <meta name=\"msapplication-config\" content=\"../assets/ico/browserconfig.xml\">
            <meta name=\"theme-color\" content=\"#ffffff\">
        </head>
    
	    <body>
            <div class=\"container mt-3\">
                <div class=\"row\">
                <div class=\"col-lg-12 pb-4\">
                <form action=\"doEditEntry.php\" class=\"was-validated\" method=\"post\">";

        $rowStaticInvData = $query->fetch_assoc();


        echo "<div class=\"form-group\">
                    <label for=\"invNum\">Entry ID:</label>
                    <input type=\"text\" class=\"form-control\" placeholder=\"Enter Invoice ID\" name=\"timeID\" value='{$rowStaticInvData['timeID']}' required>
                    <div class=\"valid-feedback\">Valid.</div>
                    <div class=\"invalid-feedback\">Please fill out this field.</div>
                  </div>";
        echo "<div class=\"form-group\">
                    <label for=\"invAgtID\">Date:</label>
                    <input type=\"text\" class=\"form-control\" placeholder=\"Enter agent ID\" name=\"date\" value='{$rowStaticInvData['date']}' required>
                    <div class=\"valid-feedback\">Valid.</div>
                    <div class=\"invalid-feedback\">Please fill out this field.</div>
                  </div>";
        echo "<div class=\"form-group\">
                    <label for=\"invCliID\">Time In:</label>
                    <input type=\"text\" class=\"form-control\" placeholder=\"Enter client ID\" name=\"timeIn\" value='{$rowStaticInvData['timeIn']}' required>
                    <div class=\"valid-feedback\">Valid.</div>
                    <div class=\"invalid-feedback\">Please fill out this field.</div>
                  </div>";
        echo "<div class=\"form-group\">
                    <label for=\"invTitle\">Time Out: </label>
                    <input type=\"text\" class=\"form-control\" placeholder=\"Enter invoice title\" name=\"timeOut\" value='{$rowStaticInvData['timeOut']}' required>
                    <div class=\"valid-feedback\">Valid.</div>
                    <div class=\"invalid-feedback\">Please fill out this field.</div>
                  </div>";
        echo "<div class=\"form-group\">
                    <label for=\"invStatus\">Client:</label>
                    <input type=\"text\" class=\"form-control\" placeholder=\"Enter invoice title\" name=\"client\" value='{$rowStaticInvData['client']}' required>
                    <div class=\"valid-feedback\">Valid.</div>
                    <div class=\"invalid-feedback\">Please fill out this field.</div>
                  </div>";
        echo "<div class=\"form-group\">
                    <label for=\"invStatus\">Work Description:</label>
                    <input type=\"text\" class=\"form-control\" placeholder=\"Enter invoice title\" name=\"description\" value='{$rowStaticInvData['description']}' required>
                    <div class=\"valid-feedback\">Valid.</div>
                    <div class=\"invalid-feedback\">Please fill out this field.</div>
                  </div>";

        echo "<button type=\"submit\" name=\"action\" class=\"btn btn-primary\" value=\"update\">Submit</button>";
        echo "</form></div></div></div></body></html>";

    }else{
        echo 'Content not found....';
        echo "{$_GET['id']}";
    }
}else {
    //echo 'Content not found....';

}
?>