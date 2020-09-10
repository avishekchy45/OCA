<!--DESIGNED BY AVISHEK CHOWDHURY-->
<?php
session_start();
include("pages/loggedin.php");
include("validation.php");
?>

<html>

<head>
    <title>SIGNUP-OCA</title>
    <meta charset="UTF-8">
    <meta name="OCA" content="Online Class Material, Classroom, Free courses">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="icon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
                include("options/navbar.php");
                ?>
            </nav>
        </div>
    </div>

    <div class="row-3">
        <div class="menu col-3">
        </div>

        <div class="main col-6">
            <form id="form" autocomplete="on" target="_self" enctype="multipart/form-data" method="POST">

                <h2>SIGN UP</h2>

                <label for="user"></label>
                <select id="user" name="user" size="1" required autofocus>
                    <option value="">Register As</option>
                    <option value="instructor">INSTRUCTOR</option>
                    <option value="student">LEARNER</option>
                </select><br>

                <label for="photo"></label>
                <button id="photo" onclick="document.getElementById('user_photo').click()" title="Upload Your Photo">Upload
                    Your Photo</button>
                <input type="file" id="user_photo" name="user_photo" accept="image/*" style="display: none;"><br>

                <label for="name"></label>
                <input type="text" id="name" name="name" placeholder="Full Name" pattern="[A-Za-z ]{3,}" title="Enter your Full Name" required><br>

                <label for="id/username"></label>
                <input type="text" id="id/username" name="id" placeholder="ID/USERNAME" pattern="[A-Za-z0-9]{4,}" maxlength="14" title="Enter your ID/a unique username(maximum 13 characters)" required><br>

                <label for="email"></label>
                <input type="email" id="email" name="email" placeholder="E-mail Address" title="Enter your E-mail Address" required><br>

                <label for="phone_num"></label>
                <input type="tel" id="phone_num" name="phone_num" placeholder="Phone Number" pattern="[0-9]{11}" title="Enter your 11 digit phone Number"><br>

                <label for="bdate">Enter your birthdate</label><br>
                <input type="date" id="bdate" name="bdate" title="Enter your birthdate" min="1972-01-01" max="2020-06-26"><br>

                <fieldset>
                    <legend>Gender</legend>
                    <input type="radio" id="male" name="gender" value="Male" required>
                    <label for="male">Male</label><br>
                    <input type="radio" id="female" name="gender" value="Female">
                    <label for="female">Female</label>
                </fieldset><br>

                <fieldset>
                    <legend>LANGUAGES</legend>
                    <input type="checkbox" id="bangla" name="lang[]" value="Bangla">
                    <label for="instructor">Bangla</label><br>
                    <input type="checkbox" id="english" name="lang[]" value="English">
                    <label for="student">English</label>
                </fieldset><br>

                <label for="about"></label>
                <textarea rows="5" cols="45" id="about" name="about" maxlength="101" placeholder="Write a short description about you...(maximum 101 characters)" title="Write here something about you. It will be displayed in your About section"></textarea><br>

                <label for="pass"></label>
                <input type="password" id="pass" name="pass" placeholder="PASSWORD" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 6 or more characters" required><br><br>

                <button type=" reset" onclick="alert('Form Reset!')">RESET</button>
                <button type="submit" value="submit" name="signup">SIGNUP</button><br><br>

            </form>

        </div>

        <div class="sidebar col-3">
        </div>
    </div>

    <div class="row-4">
        <div class="footer col-12">
            <footer>
                <?php
                include("options/footer.php");
                ?>
            </footer>
        </div>
    </div>

</body>

</html>