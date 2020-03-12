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
                <form action=\"doNewEntry.php\" class=\"was-validated\" method=\"post\">";
        echo "<div class=\"form-group\">
                    <label for=\"invNum\">Entry ID:</label>
                    <input type=\"text\" class=\"form-control\" placeholder=\"Enter Invoice ID\" name=\"timeID\" required>
                    <div class=\"valid-feedback\">Valid.</div>
                    <div class=\"invalid-feedback\">Please fill out this field.</div>
                  </div>";
        echo "<div class=\"form-group\">
                    <label for=\"invAgtID\">Date:</label>
                    <input type=\"text\" class=\"form-control\" placeholder=\"Enter agent ID\" name=\"date\" required>
                    <div class=\"valid-feedback\">Valid.</div>
                    <div class=\"invalid-feedback\">Please fill out this field.</div>
                  </div>";
        echo "<div class=\"form-group\">
                    <label for=\"invCliID\">Time In:</label>
                    <input type=\"text\" class=\"form-control\" placeholder=\"Enter client ID\" name=\"timeIn\" required>
                    <div class=\"valid-feedback\">Valid.</div>
                    <div class=\"invalid-feedback\">Please fill out this field.</div>
                  </div>";
        echo "<div class=\"form-group\">
                    <label for=\"invTitle\">Time Out: </label>
                    <input type=\"text\" class=\"form-control\" placeholder=\"Enter invoice title\" name=\"timeOut\" required>
                    <div class=\"valid-feedback\">Valid.</div>
                    <div class=\"invalid-feedback\">Please fill out this field.</div>
                  </div>";
        echo "<div class=\"form-group\">
                    <label for=\"invStatus\">Client:</label>
                    <input type=\"text\" class=\"form-control\" placeholder=\"Enter invoice title\" name=\"client\" required>
                    <div class=\"valid-feedback\">Valid.</div>
                    <div class=\"invalid-feedback\">Please fill out this field.</div>
                  </div>";
        echo "<div class=\"form-group\">
                    <label for=\"invStatus\">Work Description:</label>
                    <input type=\"text\" class=\"form-control\" placeholder=\"Enter invoice title\" name=\"description\" required>
                    <div class=\"valid-feedback\">Valid.</div>
                    <div class=\"invalid-feedback\">Please fill out this field.</div>
                  </div>";

        echo "<button type=\"submit\" name=\"action\" class=\"btn btn-primary\" value=\"create\">Submit</button>";
        echo "</form></div></div></div></body></html>";

?>