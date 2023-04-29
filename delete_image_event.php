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
if (isset($_GET['key'])) {
    $ref_table = "event_pic";
    require __DIR__ . '/vendor/autoload.php';
    include('connection.php');
    $key = $_GET['key'];
    $get_data = $database->getReference('event_pic')->orderByKey()->equalTo($key)->getValue();
    foreach ($get_data as $keys => $row) {
        $url = $row['picture_link'];
        $trim = str_replace("https://firebasestorage.googleapis.com/v0/b/safepetshaven.appspot.com/o/", "", "$url");
        $trim2 = str_replace("?alt=media", "", "$trim");
        $bucket->object($trim2)->delete();
    }
    $database->getReference("$ref_table/$key")->remove();
    header("Location: edit_event.php");
}

?>