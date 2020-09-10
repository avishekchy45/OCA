<!--DESIGNED BY AVISHEK CHOWDHURY-->
<?php

$con = mysqli_connect("localhost", "root", "", "oca");
if (mysqli_connect_errno()) {
    echo "<wrong>Sorry!!! Unable to Connect. Try again later... </wrong><br>" . mysqli_connect_error();
} else {
    echo "<correct> Successfully Connected... <br></correct>";
}

?>