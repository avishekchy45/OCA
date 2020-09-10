<!--DESIGNED BY AVISHEK CHOWDHURY-->
<?php
session_start();
?>
<html>

<head>
    <title>ONLINE CLASS ASSISTANT</title>
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
            <h1>Online Class Assistant</h1>
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

            <h1>ONLINE CLASS ASSISTANT (OCA)</h1>

        </div>

        <div class="sidebar col-3">
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