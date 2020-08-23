<!DOCTYPE html>
<!--DESIGNED BY AVISHEK CHOWDHURY-->
<html>

<head>
    <title>SIGNUP-OCA</title>
    <meta charset="UTF-8">
    <meta name="OCA" content="OCA,FREECOURSE">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="icon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <div class="row-1">
        <div class="header col-12">
            <h1>Online Class Assistance</h1>
        </div>
    </div>

    <div class="row-2">
        <div class="navbar col-12">
            <nav>
                <a href="login.php" class="option"> LOG IN </a>
                <a href="signup.php" class="option"> SIGN UP </a>
                <a href="index.htm" class="option"> ABOUT US </a>
            </nav>
        </div>
    </div>

    <div class="row-3">
        <div class="menu col-3">
        </div>

        <div class="main col-6">
            <form id="form" autocomplete="on" target="_self" enctype="multipart/form-data"  method="POST">

                <h2>SIGN UP</h2><br>

                <label for="dept"></label>
                <select id="dept" name="department" size="1" required autofocus>
                    <option value="">Choose Department</option>
                    <option value="CSE">Computer Science & Engineering</option>
                    <option value="EEE">Electrical & Electronics Engineering</option>
                    <option value="other">Other</option>
                </select><br>

                <label for="photo"></label>
                <button id="photo" onclick="document.getElementById('uploadphoto').click()" title="Upload Photo">Upload
                    Your Photo</button>
                <input type="file" id="uploadphoto" name="photo" accept="image/*" style="display: none;" required><br>

                <label for="name"></label>
                <input type="text" id="name" name="name" placeholder="Full Name" title="Enter Full Name" required><br>

                <label for="id"></label>
                <input type="text" id="id" name="id" placeholder="Student ID" pattern="[0-9]{4}" title="Enter 4 digit ID" required><br>

                <label for="email"></label>
                <input type="email" id="email" name="email" placeholder="E-mail Address" title="Enter E-mail Address" required><br>

                <label for="phonenumber"></label>
                <input type="tel" id="phonenumber" name="phonenumber" placeholder="Phone Number" pattern="[0-9]{11}" title="Enter Phone Number"><br>

                <label for="bdate">Enter your birthdate</label>
                <input type="date" id="bdate" name="date" min="1999-01-01" max="2020-06-26"><br>

                <fieldset>
                    <legend>Gender</legend>
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label><br>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                </fieldset><br>

                <fieldset>
                    <legend>Register as</legend>
                    <input type="checkbox" id="instructor" name="title" value="instructor">
                    <label for="instructor">Instructor</label><br>
                    <input type="checkbox" id="student" name="title" value="student">
                    <label for="student">Student</label>
                </fieldset><br>

                <label for="about"></label>
                <textarea rows="5" cols="45" id="about" name="about" placeholder="Tell us something about you..." title="Tell us something about you..."></textarea><br>

                <label for="pass"></label>
                <input type="password" id="pass" name="password" placeholder="Password" minlength="6" required><br><br>

                <button type="reset" onclick="alert('Form Reset!')">RESET</button>
                <button type="submit" value="submit" name="submit">SIGNUP</button><br><br>

            </form>

        </div>

        <div class="sidebar col-3">

            <?php
            include("connectdb.php");

            if (isset($_POST['submit'])) {
                $department = $_POST['department'];
                $name = $_POST['name'];
                $id = $_POST['id'];
                $email = $_POST['email'];
                $phone_num = $_POST['phonenumber'];
                $gender = $_POST['gender'];
                $register = $_POST['title'];
                $message = $_POST['about'];
                $pass = $_POST['password'];

                $ext = explode(".", $_FILES['photo']['name']);
                $c = count($ext);
                $ext = $ext[$c - 1];
                $image = $id . "." . $ext;

                //$pass = ENCODE('$pass','$id');
                //$pass = md5('$pass');

                $query = "insert into users values('$department','$name','$id','$email','$phone_num','$gender','$register','$message','$pass','$image')";

                if (mysqli_query($con, $query)) {
                    echo "Successfully registered $id";
                    if ($image != null) {
                        move_uploaded_file($_FILES['photo']['tmp_name'], "Uploads/User_Photos/$image");
                    }
                } else {
                    echo "error!" . mysqli_error($con);
                }
            }
            ?>

        </div>
    </div>

    <div class="row-4">
        <div class="footer col-12">
            <footer>
                <a href="contact.htm" class="option">Contact Information</a>
                <a href="privacy.htm" class="option">Privacy Policy</a>
                <a href="terms.htm" class="option">Terms of Services</a>
                <a href="copyright.htm" class="option">Copyright Information</a>
                <a href="sitemap.htm" class="option">Sitemap and Related Documents</a>
            </footer>
        </div>
    </div>

</body>

</html>