<?php
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
    $_SESSION['event_id_edit'] = $_GET['id'];
}
$fetch_data = $database->getReference("event")->orderByChild("event_id")->equalTo((int)$_SESSION['event_id_edit'])->getValue();
if ($fetch_data > 0) {
    foreach ($fetch_data as $key => $row) {
        $database->getReference("event/$key")->remove();
    }
}
$fetch_data = $database->getReference("event_pic")->orderByChild("event_id")->equalTo((int) $_SESSION['event_id_edit'])->getValue();
if ($fetch_data > 0) {
    foreach ($fetch_data as $key => $row) {
        $url = $row['picture_link'];
        $database->getReference("event_pic/$key")->remove();
        $trim = str_replace("https://firebasestorage.googleapis.com/v0/b/safepetshaven.appspot.com/o/", "", "$url");
        $trim2 = str_replace("?alt=media", "", "$trim");
        $bucket->object($trim2)->delete();
    }
}
header("Location:Announcements_admin.php");
?>