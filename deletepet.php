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
if ($_SESSION['cat'] == "true") {
    $ref_table = "cat_images";
} else {
    $ref_table = "dog_images";
}
require __DIR__ . '/vendor/autoload.php';
include('connection.php');
$id = $_GET['id2'];

$fetch_data = $database->getReference($ref_table)->getValue();
if ($fetch_data > 0) {
    foreach ($fetch_data as $key => $row) {
        if ($row['pet_id'] == $id) {
            $keys = $key;
            $url = $row['url'];
        }
    }
}
$database->getReference("$ref_table/$keys")->remove();

//delete also from adopt table
$ref_table = "adopt";
$fetch_data = $database->getReference($ref_table)->getValue();
if ($fetch_data > 0) {
    foreach ($fetch_data as $key => $row) {
        if ($row['pet_id'] == $id && $_SESSION['cat'] == $row['cat']) {
            $database->getReference("$ref_table/$key")->remove();
        }
    }
}

$trim = str_replace("https://firebasestorage.googleapis.com/v0/b/safepetshaven.appspot.com/o/", "", "$url");
$trim2 = str_replace("?alt=media", "", "$trim");
$bucket->object($trim2)->delete();

echo '<script>
      window.location = "animals_admin.php";
      </script>';
?>