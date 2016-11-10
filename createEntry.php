<?php
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
        $user = $_POST["fullName"];
        $title = $_POST["logTitle"];
        $today = date("Y-m-d", strtotime($_POST["date"]));
        $log = $_POST["textarea"];
        echo $log;
        echo $_POST['test'];
        $sql = "INSERT INTO logs(user, title, date_created, log_entry) VALUES(:user,:title,:today,:log)";
        $stmt = $db -> prepare($sql);
        $stmt -> bindParam(':user', $user);
        $stmt -> bindParam(':title', $title);
        $stmt -> bindParam(':today', $today);
        $stmt -> bindParam(':log', $log);
        $stmt->execute();
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
        <title>Create a Log</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/mdb.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>

    <body>

    <!-------navbar------->
    <nav class="navbar navbar-dark navbar-fixed-top scrolling-navbar">

        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx">
            <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-toggleable-xs" id="collapseEx">
            <a class="navbar-brand" target="_blank">Placement Logs</a>
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html" data-toggle="tooltip" data-placement="bottom" title="Home"><i class="material-icons">home</i><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="createEntry.php" data-toggle="tooltip" data-placement="bottom" title="Create Log Entry"><i class="material-icons">mode_edit</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="myLogs.html" data-toggle="tooltip" data-placement="bottom" title="All Log Entries"><i class="material-icons">list</i></a>
                </li>
                <!--<li class="nav-item">
                    <a class="nav-link" href="myProfile.html"><i class="material-icons">person</i></a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="feedback.html" data-toggle="tooltip" data-placement="bottom" title="Feedback"><i class="material-icons">mail_outline</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navIcon" href="loginSignTemp.html" data-toggle="tooltip" data-placement="bottom" title="Login/Sign Up"><i class="material-icons">person_add</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <!--<li class="nav-item">
                    <a class="nav-link navIcon" href="signUp.html"><i class="material-icons">person_add</i></a>
                </li>
                <li class="nav-item navIcon">
                    <a class="nav-link" href="login.html"><i class="material-icons">person_outline</i></a>
                </li>-->

            </ul>

            <form class="form-inline">
                <input class="form-control" type="text" placeholder="Search">
            </form>
        </div>
    </nav>


    <div class="view hm-black-strong" id="createBkg">
        <div class="full-bg-img flex">
            <div class="center" align="center">
                <form method="post" onsubmit="sendForm(this)">

                    <div class="container create">
                        <h2><span class="createTitle animated fadeIn">Create Log Entry</span></h2>
                        <br><br>

                        <div class="md-form col-md-4 offset-md-2">
                            <input placeholder="Enter first and last name" type="text" name="fullName" id="fullName" class="form-control animated fadeIn">
                        </div>
                        <div class="md-form col-md-4">
                            <input type="text" name="date" id="date" class="form-control animated fadeIn" value="<?= date("d/m/Y") ?>">
                        </div>

                        <div class="md-form col-md-8 offset-md-2">
                            <input placeholder="Enter Log title" type="text" name="logTitle" id="logTitle" class="form-control animated fadeIn">
                        </div>

                        <div class="md-form col-md-8 offset-md-2">
                            <textarea type="text" name="textarea" id="textarea" placeholder="Enter Log" class="md-textarea animated fadeIn"></textarea>
                        </div>
                    </div>


                    <div class="container">
                        <button class="btn btn-white-outline btn-md animated fadeIn" id="postEntryBtn" >Post Entry
                        </button>
                        <!--<input type="submit" name="submit" value="Save Data" id="textFileSubmit">
                        onclick="createLog()"-->
                    </div>

                    <!--placeholder="Enter Date, e.g Fri 5th Sep 2016"-->
                    <div id="output1"></div>
                    <div id="output2"></div>
                    <div id="output3"></div>

                </form>
            </div>
        </div>
    </div>

    <a href="data.rtf">Text File</a>

    <script type="text/javascript" src="javascript.js"></script>
    <script type="text/javascript">

        $('#textarea').trigger('autoresize');

        function checkContent(content)              //checking if content is present in text area
        {
            return Boolean(content);
        }

        function sendForm(form)
        {
            event.preventDefault();     //stops default of button from going to next page

            const PASSWORD_CHECK = "placementlogs";
            var attempt = 3,
                user = document.getElementById("fullName").value,
                title = document.getElementById("logTitle").value,
                date = document.getElementById("date").value,
                log = document.getElementById("textarea").value,
                xhttp = new XMLHttpRequest();

            do
            {
                var password = prompt("Password:");

                if(password == null)
                {
                    return;
                }
                else
                {
                    if(PASSWORD_CHECK == password)
                    {
                        if(document.getElementById("textarea") == null)
                        {
                            alert("Cannot find text box");
                        }
                        else
                        {
                            var content = document.getElementById("textarea").value;
                            var hasContent = checkContent(content);

                            if(hasContent)
                            {
                                xhttp.onreadystatechange = function()
                                {
                                    if(this.readyState == 4 && this.status == 200)      //200 is response code for ready/success
                                    {
                                        console.log(this.responseText);
                                    }
                                };

                                xhttp.open("POST",window.location.pathname.split("/").pop(), true);
                                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                xhttp.send("fullName=" +user+ "&logTitle=" +title+ "&date=" +date+ "&textarea=" +log);
                            }
                            else
                            {
                                alert("Oops! No log content has been entered!");
                            }
                        }
                    }
                    else
                    {
                        attempt--;

                        if(attempt > 1) {
                            alert("Incorrect Password. Please try again.\n(" + attempt + " attempts left)");
                        }
                        else if(attempt > 0) {
                            alert("Incorrect Password. Please try again.\n(" + attempt + " attempt left)");
                        }
                        else if (attempt == 0) {
                            document.getElementById("postEntryBtn").disabled = true;
                            return;
                        }
                    }
                }

            }while(PASSWORD_CHECK !== password);
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