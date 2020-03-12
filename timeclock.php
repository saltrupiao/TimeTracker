<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Title </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>

<h1 style="text-align: center;">Time Clock</h1>

<!-- Source: https://stackoverflow.com/questions/14563234/php-with-javascript-code-live-clock -->

<?php
if(@$_GET["action"]=="getTime"){
    $time1 = Time();
    $date1 = date("h:i:s A",$time1);
    echo $date1; // time output for ajax request
    die();
}
?>

<nav class="nav nav-pills nav-fill">
    <a class="nav-item nav-link active" href="index.php">Home</a>
    <a class="nav-item nav-link" href="timeclock.php">Timeclock</a>
</nav>

<div id="qwe" class="timeclocklarge"></div>



<script type="text/javascript">
    window.onload = startInterval;
    function startInterval() {
        setInterval("startTime();",1000);
    }
    function startTime() {
        AX = new ajaxObject("?action=getTime", showTime)
        AX.update(); // start Ajax Request
    }
    // CallBack
    function showTime( data ){
        document.getElementById('qwe').innerHTML = data;
    }
</script>



<script type="text/javascript">
    // Ajax Object - Constructor
    function ajaxObject(url, callbackFunction) {
        var that=this;
        this.updating = false;
        this.abort = function() {
            if (that.updating) {
                that.updating=false;
                that.AJAX.abort();
                that.AJAX=null;
            }
        };
        this.update =
            function(passData,postMethod) {
                if (that.updating) { return false; }
                that.AJAX = null;
                if (window.XMLHttpRequest) {
                    that.AJAX=new XMLHttpRequest();
                }else{
                    that.AJAX=new ActiveXObject("Microsoft.XMLHTTP");
                }
                if (that.AJAX==null) {
                    return false;
                }else{
                    that.AJAX.onreadystatechange = function() {
                        if (that.AJAX.readyState==4) {
                            that.updating=false;
                            that.callback( that.AJAX.responseText, that.AJAX.status, that.AJAX.responseXML, that.AJAX.getAllResponseHeaders() );
                            that.AJAX=null;
                        }
                    };
                    that.updating = new Date();
                    if (/post/i.test(postMethod)) {
                        var uri=urlCall+(/\?/i.test(urlCall)?'&':'?')+'timestamp='+that.updating.getTime();
                        that.AJAX.open("POST", uri, true);
                        that.AJAX.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        that.AJAX.setRequestHeader("Content-Length", passData.length);
                        that.AJAX.send(passData);
                    }else{
                        var uri=urlCall+(/\?/i.test(urlCall)?'&':'?')+passData+'&timestamp='+(that.updating.getTime());
                        that.AJAX.open("GET", uri, true);
                        that.AJAX.send(null);
                    }
                    return true;
                }
            };
        var urlCall = url;
        this.callback = callbackFunction || function (){};
    }
</script>

</body>
</html>
