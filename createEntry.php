<?php

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
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>



<!--
<div class="left">
    <div class="item">
        <a href="index.html"></a><span class="glyphicon"><i class ="material-icons">home</i></span>
    </div></a>
    <div class="item">
        <a href="createEntry.html"></a><span class="glyphicon"><i class="material-icons">mode_edit</i></span>
        Create Log Entry</div></a>
    <div class="item active">
        <a href="myLogs.html"><span class="glyphicon"><i class="material-icons">list</i></span>
            My Logs</div></a>
    <div class="item">
        <a href="myProfile.html"><span class="glyphicon"><i class="material-icons">person</i></span>
            My Profile</div></a>
</div>

</div>-->

<!-------navbar------->
<nav class="navbar navbar-dark navbar-fixed-top scrolling-navbar">

    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx">
        <i class="fa fa-bars"></i>
    </button>

        <div class="collapse navbar-toggleable-xs" id="collapseEx">
            <a class="navbar-brand" target="_blank">Placement Logs</a>
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html" data-toggle="tooltip" data-placement="bottom" title="Home"><i class ="material-icons">home</i><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="createEntry.html" data-toggle="tooltip" data-placement="bottom" title="Create Log Entry"><i class="material-icons">mode_edit</i></a>
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
                    <a class="nav-link" href="#"></a>
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
            <form action="create.php" method="post">

                <div class="container create">
                    <h2><span class="createTitle animated fadeIn">Create Log Entry</span></h2>
                    <br><br>


                    <div class="md-form col-sm-4 offset-sm-2">
                        <input placeholder="Enter first and last name" type="text" name="fullName" id="fullName" class="form-control animated fadeIn">
                    </div>
                    <div class="md-form col-sm-4">
                        <input placeholder="Enter Date, e.g Fri 5th Sep 2016" type="text" name="date" id="date" class="form-control animated fadeIn">
                    </div>


                    <div class="md-form col-sm-8 offset-sm-2">
                        <input placeholder="Enter Log title" type="text" name="logTitle" id="logTitle" class="form-control animated fadeIn">
                    </div>


                    <div class="md-form col-sm-8 offset-sm-2">
                        <textarea type="text" name="textarea" id="textarea" placeholder="Enter Log" class="md-textarea animated fadeIn"></textarea>
                    </div>
                </div>


                <div class="container">
                    <button class="btn btn-white-outline btn-md animated fadeIn" id="postEntryBtn" onclick="createLog()">Post Entry</button>
                    <!--<input type="submit" name="submit" value="Save Data" id="textFileSubmit">-->
                </div>


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

</script>

<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/tether.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>

</body>
</html>