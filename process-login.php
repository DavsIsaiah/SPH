<?php
if (session_id() == "") {
    session_start();
}
require __DIR__ . '/vendor/autoload.php';
include('connection.php');
$ref_table = "cred";
if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $fetch_data = $database->getReference($ref_table)->getValue();
    $err = "";
    //Verification
    $fetch_data = $database->getReference($ref_table)->getValue();
    if (gettype($fetch_data) == "string") {
        
    } else {
        
        foreach ($fetch_data as $key => $row) {
            //pass the value to the session variables.
            if ($row['user'] == "$user" && $row['pass'] == "$pass") {
                $_SESSION['user'] = $row['user'];
                $_SESSION['pass'] = $row['pass'];
                $_SESSION['key'] = $key;
                $_SESSION['email'] = $row['email'];
                $_SESSION['fname'] = $row['fname'];
                $_SESSION['lname'] = $row['lname'];
                $_SESSION['mobile'] = $row['mobile'];
                if (isset($row['admin']))
                    $_SESSION['admin'] = $row['admin'];
                header("Location: Homepage.php");
            }
        }
    }

    $alert = "Account Not Found";

}
?>