<?php
if (isset($_GET['footer'])) {
    echo "
    <a href='../index.htm?footer' class='option'> ABOUT US </a>
    <a href='contact.php?footer' class='option'>Contact Information</a>
    <a href='privacy.php?footer' class='option'>Privacy Policy</a>
    <a href='terms.php?footer' class='option'>Terms of Services</a>
    <a href='copyright.php?footer' class='option'>Copyright Information</a>
    <a href='sitemap.php?footer' class='option'>Sitemap and Related Documents</a>
    ";
} else {
    if (isset($_SESSION['user'])) {
        echo "
        <a href='../pages/contact.php?footer' class='option'>Contact Information</a>
        <a href='../pages/privacy.php?footer' class='option'>Privacy Policy</a>
        <a href='../pages/terms.php?footer' class='option'>Terms of Services</a>
        <a href='../pages/copyright.php?footer' class='option'>Copyright Information</a>
        <a href='../pages/sitemap.php?footer' class='option'>Sitemap and Related Documents</a>
        ";
    } else {
        echo "
        <a href='index.htm?footer' class='option'> ABOUT US </a>
        <a href='pages/contact.php?footer' class='option'>Contact Information</a>
        <a href='pages/privacy.php?footer' class='option'>Privacy Policy</a>
        <a href='pages/terms.php?footer' class='option'>Terms of Services</a>
        <a href='pages/copyright.php?footer' class='option'>Copyright Information</a>
        <a href='pages/sitemap.php?footer' class='option'>Sitemap and Related Documents</a>
        ";
    }
}
?>
