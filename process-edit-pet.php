<?php
if (session_id() == "") {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';
include('connection.php');
$err = "";
if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $status = $_POST['status'];

    $err = "";

    if (!preg_match('/^[a-zA-Z\s]+$/', $_POST['name'])) {
        $err = "Invalid format for name";
    }
    if (!preg_match('/^[a-zA-Z\s]+$/', $_POST['breed'])) {
        $err = "Invalid format for breed";
    }
    if ($err == "") {

        if ($_SESSION['cat'] == "true") {
            $ref_table = "cat_images";
        } else {
            $ref_table = "dog_images";
        }
        $fetch_data = $database->getReference($ref_table)->getValue();
        if ($fetch_data > 0) {
            foreach ($fetch_data as $key => $row) {
                if ($row['pet_id'] == $id) {
                    $keys = $key;
                }
            }
            $updateData = [
                'pet_id' => $id,
                'name' => $name,
                'breed' => $breed,
                'age' => $age,
                'sex' => $sex,
                'status' => $status
            ]; //this is the schema
            if ($err == "") {
                //edits the value in the database
                $ref_table = "$ref_table/" . $keys;
                $database->getReference($ref_table)->update($updateData);
                echo "<script>window.location = 'animals_admin.php';</script>";
            } else {
                echo "<script>alert('$err');</script>";
            }
        } else {
            echo "Something went wrong";
        }

    } else {
        echo "<script>alert('$err');</script>";
    }

}
?>