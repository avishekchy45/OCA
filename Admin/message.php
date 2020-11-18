<!--DESIGNED BY AVISHEK CHOWDHURY-->
<?php
session_start();
$user = $_SESSION['user'];
$id = $_SESSION['user_id'];
include("../pages/loggedout.php");
include("usercheck.php");
include("../connection.php");
if (isset($_POST['send'])) {
    $from = $_GET['from'];
    $to = $_GET['to'];
    $msg = $_POST['msg'];
    $chatid = rand(1, 100);
    $chatid = "$from" . "$to" . "$chatid";
    $query = "INSERT INTO chat(CHAT_ID,SENDER,RECEIVER,MESSAGE) VALUES('$chatid','$from','$to','$msg')";
    if (mysqli_query($con, $query))
        echo "<correct> MESSAGE SENT SUCCESSFULLY...</correct>";
    else
        echo "<wrong> Error! </wrong>" . mysqli_error($con);
}
if (isset($_POST['delete'])) {
    $chatid = $_GET['chatid'];
    $query = "DELETE FROM chat WHERE CHAT_ID='$chatid'";
    if (mysqli_query($con, $query))
        echo "<correct> MESSAGE DELETED SUCCESSFULLY...</correct>";
    else
        echo "<wrong> Error! </wrong>" . mysqli_error($con);
}

?>

<html>

<head>
    <title>OCA</title>
    <meta charset="UTF-8">
    <meta name="OCA" content="Online Class Material, Classroom, Free courses">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/png" href="../icon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://kit.fontawesome.com/a15ab95a54.js"></script>
</head>

<body>
    <div class="row-1">
        <div class="header col-12">
            <?php
            include("../options/header.php");
            ?>
        </div>
    </div>

    <div class="row-2">
        <div class="navbar col-12">
            <nav>
                <?php
                include("../options/navbar.php");
                ?>
            </nav>
        </div>
    </div>

    <div class="row-3">
        <div class="menu col-3">

        </div>

        <div class="main col-6">

            <?php
            $from = $id;
            $to = "all";
            echo <<<HTML
            <form action="message.php?from=$id&to=$to" id="form2" autocomplete="off" target="_self" enctype="multipart/form-data" method="POST">    
            <label for="message"></label>
            <textarea rows="9" cols="45" id="post" name="msg" maxlength="101" placeholder="Write something here...(maximum 101 characters)"></textarea><br>
            <button id="approve" type="submit" value="SEND" name="send">SEND</button>
            </form><br><br>
            HTML;
            $query = "SELECT * FROM chat WHERE RECEIVER='$id' OR RECEIVER='$to' ORDER BY MSG_TIME DESC";
            $r = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($r)) {
                $chatid = $row['CHAT_ID'];
                $time = $row['MSG_TIME'];
                $from = $row['SENDER'];
                $to = $row['RECEIVER'];
                $msg = $row['MESSAGE'];
                echo <<<HTML
                <post>
                <hr>FROM: <u>$from</u><br>TO: <u>$to</u><br>TIME: <u>$time</u>
                <hr>
                </post> <i>$msg</i> <br><br>
                <form action="message.php?chatid=$chatid" id="form2" autocomplete="off" target="_self" enctype="multipart/form-data" method="POST">    
                <button type="submit" value="DELETE" name="delete">DELETE</button>
                </form><br><br>
                HTML;
            }
            ?>

        </div>

        <div class="sidebar col-3">
            <?php
            include("../options/sidebar.php");
            ?>
        </div>
    </div>

    <div class="row-4">
        <div class="footer col-12">
            <footer>
                <?php
                include("../options/footer.php");
                ?>
            </footer>
        </div>
    </div>

</body>

</html>