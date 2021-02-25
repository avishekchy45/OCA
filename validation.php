<?php
include("connection.php");

if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $id = $_POST['id'];
    $pass = $_POST['pass'];

    $query = "select ID,PASS from $user where BINARY ID='$id'";
    $r = mysqli_query($con, $query);
    $row = mysqli_fetch_array($r);
    $pswd = $row['PASS'];
    
    if (mysqli_num_rows($r) > 0 && password_verify($pass, $pswd)) {
        $_SESSION['user'] = $user;
        $_SESSION['user_id'] = $id;
        $_SESSION['login_status'] = "in";
        if ($user == 'instructor' || $user == 'student')
            header("Location:user/home.php");
        else if ($user == 'admin')
            header("Location:home.php");
    } else {
        echo "<wrong>Incorrect UserId or Password. If you are new user signup to continue...<br></wrong>";
    }
}

if (isset($_POST['signup'])) {
    $user = $_POST['user'];
    $name = $_POST['name'];
    $id = $_POST['username'];
    $email = $_POST['email'];
    $phone_num = $_POST['phone_num'];
    $bdate = $_POST['bdate'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $languages = isset($_POST['lang']) ? implode(', ', $_POST['lang']) : '';
    $about = $_POST['about'];
    $pass = $_POST['pass'];
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    //$pass = ENCODE('$pass','$id');
    //$pass = md5('$pass');
    if (($_FILES['user_photo']['error']) == UPLOAD_ERR_OK) {
        $ext = explode(".", $_FILES['user_photo']['name']);
        $c = count($ext);
        $ext = $ext[$c - 1];
        if ($user == 'instructor')
            $type = "I-";
        else if ($user == 'student')
            $type = "S-";
        $photo = $type . $id . "." . $ext;
        move_uploaded_file($_FILES['user_photo']['tmp_name'], "uploads/user_photo/$photo");
    } else
        $photo = '';

    $query = "insert into $user (NAME,ID,EMAIL,PHONENUMBER,BIRTHDATE,GENDER,LANGUAGES,ABOUT,PASS,PHOTO) values ('$name','$id','$email','$phone_num','$bdate','$gender','" . $languages . "','$about','$pass','$photo')";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Successfully registered .Remember this ID($id) for further login.Go to login page to continue...')</script>";
        //$_SESSION['user'] = $user;
        //$_SESSION['user_id'] = $id;
        //$_SESSION['login_status'] = "in";
        //header("Location:user/home.php");
    } else {
        echo "<wrong> Registration error! </wrong>" . mysqli_error($con);
    }
}
