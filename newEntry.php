<?php
    //DB details
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = 'oakland';
    $dbName = 'timetracker';


    //Create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($db->connect_error) {
        die("Unable to connect database: " . $db->connect_error);
    }

        echo "<!DOCTYPE html>
      <html lang=\"en\">
        <head>
            <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600\">
            <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css\" integrity=\"sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS\" crossorigin=\"anonymous\">
            <link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.7.0/css/all.css\" integrity=\"sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ\" crossorigin=\"anonymous\">
        </head>
    
	    <body>
            <div class=\"container mt-3\">
                <div class=\"row\">
                <div class=\"col-lg-12 pb-4\">
                <form action=\"doNewEntry.php\" class=\"was-validated\" method=\"post\">";
        echo "<div class=\"form-group\">
                    <label for=\"invAgtID\">Date:</label>
                    <input type=\"text\" class=\"form-control\" placeholder=\"Enter date of work\" name=\"date\" required>
                    <div class=\"valid-feedback\">Valid.</div>
                    <div class=\"invalid-feedback\">Please fill out this field.</div>
                  </div>";
        echo "<div class=\"form-group\">
                    <label for=\"invCliID\">Time In:</label>
                    <input type=\"text\" class=\"form-control\" placeholder=\"Enter start time of work\" name=\"timeIn\" required>
                    <div class=\"valid-feedback\">Valid.</div>
                    <div class=\"invalid-feedback\">Please fill out this field.</div>
                  </div>";
        echo "<div class=\"form-group\">
                    <label for=\"invTitle\">Time Out: </label>
                    <input type=\"text\" class=\"form-control\" placeholder=\"Enter end time of work\" name=\"timeOut\" required>
                    <div class=\"valid-feedback\">Valid.</div>
                    <div class=\"invalid-feedback\">Please fill out this field.</div>
                  </div>";
        echo "<div class=\"form-group\">
                    <label for=\"invStatus\">Client:</label>
                    <input type=\"text\" class=\"form-control\" placeholder=\"Enter client for work performed\" name=\"client\" required>
                    <div class=\"valid-feedback\">Valid.</div>
                    <div class=\"invalid-feedback\">Please fill out this field.</div>
                  </div>";
        echo "<div class=\"form-group\">
                    <label for=\"invStatus\">Work Description:</label>
                    <input type=\"text\" class=\"form-control\" placeholder=\"Enter a description of the completed work\" name=\"description\" required>
                    <div class=\"valid-feedback\">Valid.</div>
                    <div class=\"invalid-feedback\">Please fill out this field.</div>
                  </div>";

        echo "<button type=\"submit\" name=\"action\" class=\"btn btn-primary\">Submit</button>";
        echo "</form></div></div></div></body></html>";

?>