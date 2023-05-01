<?php
if (session_id() == "") {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';
include('connection.php');
$ref_table = "cred";
$err = "";
if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['mobile'];


    if (!preg_match('/^[0-9]{11}+$/', $phone)) {
        $err = "Invalid format for mobile number";
    }
    if(!preg_match('/^[a-zA-Z\s]+$/', $fname)){
        $err = "Invalid format for fname";
    }
    if(!preg_match('/^[a-zA-Z\s]+$/', $lname)){
        $err = "Invalid format for lname";
    }




    $getdata = $database->getReference($ref_table)->getChild($_SESSION['key'])->getValue();

    if ($getdata > 0) {
        $updateData = [
            'mobile' => $phone,
            'user' => $user,
            'pass' => $pass,
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email
        ]; //this is the schema
        $ref_table = 'cred';
        $fetch_data = $database->getReference($ref_table)->getValue();
        foreach ($fetch_data as $key => $row) {
            //check if username is not in the database;
            if ($key == $_SESSION['key']) {
                continue;
            }
            if ($row['user'] == $user) {
                $err = "Username is already registered.";
            }
            //Check if phone number is not in the database
            if ($row['mobile'] == $phone) {
                $err = "Mobile number is already registered.";
            }
        }
        if ($err == "") {
            //edits the value in the database
            $ref_table = "cred/" . $_SESSION['key'];
            $database->getReference($ref_table)->update($updateData);
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            $_SESSION['mobile'] = $phone;
            $_SESSION['email'] = $email;
            $_SESSION['fname'] = $fname;
            $_SESSION['lname'] = $lname;
            echo "<script>window.location = 'Homepage.php';</script>";
        } else {
            echo "<script>alert('$err');</script>";
        }
    } else {
        echo "Something went wrong";
    }


}
?>