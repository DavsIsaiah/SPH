<?php
error_reporting(0);
ini_set('display_errors', '0');
if (session_id() == "") {
    session_start();
}
if (!isset($_SESSION["admin"])) {
    session_destroy();
    echo '<script>alert("You are not allowed here!");
      window.location = "Homepage.php";
      </script>';
}
// Include config file
require __DIR__ . '/vendor/autoload.php';
include('connection.php');
if (isset($_GET['id'])) {
    $_SESSION['testi_id_edit'] = $_GET['id'];
}
$fetch_data = $database->getReference("testimonials")->orderByChild("testi_id")->equalTo((int) $_SESSION['testi_id_edit'])->getValue();
if ($fetch_data > 0) {
    foreach ($fetch_data as $key => $row) {
        $database->getReference("testimonials/$key")->remove();
    }
}
$fetch_data = $database->getReference("testimonial_pic")->orderByChild("testi_id")->equalTo((int) $_SESSION['testi_id_edit'])->getValue();
if ($fetch_data > 0) {
    foreach ($fetch_data as $key => $row) {
        $url = $row['picture_link'];
        $database->getReference("testimonial_pic/$key")->remove();
        $trim = str_replace("https://firebasestorage.googleapis.com/v0/b/safepetshaven.appspot.com/o/", "", "$url");
        $trim2 = str_replace("?alt=media", "", "$trim");
        $bucket->object($trim2)->delete();
    }
}
header("Location:Announcements_admin.php");
?>