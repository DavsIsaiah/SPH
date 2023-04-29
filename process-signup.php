<?php
if (session_id() == "") {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';
include('connection.php');
$ref_table = "cred";
$mobile = $fname = $lname = $email = $user = $pass = "";
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $mobile = $_POST['mobile'];
    $fetch_data = $database->getReference($ref_table)->getValue();
    $err = "";
    if(!preg_match('/^[a-zA-Z\s]+$/', $fname)){
        $err = "Invalid format for fname";
    }
    if(!preg_match('/^[a-zA-Z\s]+$/', $lname)){
        $err = "Invalid format for lname";
    }
    //Verification
    if (preg_match('/^[0-9]{11}+$/', $mobile)) {

        if (gettype($fetch_data) == "string") {

        } else {
            foreach ($fetch_data as $key => $row) {
                //check if email is not in the database;
                if ($row['email'] == $email) {
                    $err = "Email is already registered.";
                }
                //check if username is not in the database;
                if ($row['user'] == $user) {
                    $err = "Username is already registered.";
                }
                //Check if phone number is not in the database
                if ($row['mobile'] == $mobile) {
                    $err = "Mobile number is already registered.";
                }
            }
        }
        if ($err == "") {
            $postData = [
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'user' => $user,
                'pass' => $pass,
                'mobile' => $mobile
            ]; //this is the schema
            $ref_table = "cred";
            $database->getReference($ref_table)->push($postData);
            header("Location: Homepage.php");
        } else {
            echo "<script>alert('$err');</script>";
        }
    } else {
        echo '<script>alert("Please input the 11 digits of your phone number.")</script>';
    }
}