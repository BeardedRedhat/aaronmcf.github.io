<?php
/**
 * Created by PhpStorm.
 * User: AaronMcf
 * Date: 02/11/2016
 * Time: 10:07
 */

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $serverName = "localhost";
    $port = "8889";
    $username = "root";
    $password = "root";
    $dbname = "projectDb";


    try
    {
        $db = new PDO("mysql:host=$serverName; port=$port; dbname=$dbname", $username, $password);     //PDO allows us to connect to the database, passes 3 arguments and returns connection to DB
        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $error)
    {
        echo "Connection failed".$error -> getMessage();    //getMessage() is a function in PDOException that outputs the error details. '->' is the same as '.' in java. '.' is concatenation
    }

    if($db)
    {
        $user = $_POST["user"];
        $title = $_POST["title"];
        $today = date("Y-m-d");
        $log = $_POST["log"];
        $sql = "INSERT INTO logs(user, title, date_created, log_entry) VALUES('$user','$title','$today','$log')";
        $db -> exec($sql);
        echo "Success";
    }

}
else {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PHP Test page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
</head>

<body>

<br><br><br>
<form method="post" onsubmit="sendForm(this)">
    <div class="container col-sm-8 offset-sm-2">
        <label for="user">User:</label>
        <input type="text" name="user" id="user" class="form-control animated fadeIn">

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" class="form-control animated fadeIn">

        <label for="date">Date:</label>
        <input type="date" name="date" id="date" class="form-control animated fadeIn">

        <label for="log">Log Entry:</label>
        <textarea name="log" id="log"></textarea>

        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
    </div>
</form>


<script>

    function sendForm(form)
    {
        event.preventDefault();     //stops default of button from going to next page

        var user = document.getElementById("user").value,
            title = document.getElementById("title").value,
            log = document.getElementById("log").value;
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status == 200)      //200 is response code for ready/success
            {
                console.log(this.responseText);
            }
        };

        xhttp.open("POST",window.location.pathname.split("/").pop(), true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("User=" +user+ "&Title=" +title+ "&Log=" +log);
    }

</script>
<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/tether.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>

</body>
</html>
<?php
}


?>


