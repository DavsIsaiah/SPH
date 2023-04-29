<?php
session_start();
if (isset($_SESSION["user"])) {
    session_destroy();
    echo '<script>alert("Successfully Logged Out.");
    window.location = "Homepage.php";</script>';
} else {
    session_destroy();
    echo '<script>alert("You are not logged in!");
    window.location = "Homepage.php";
    </script>';
}
?>