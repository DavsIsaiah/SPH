<?php
if (session_id() == "") {
    session_start();
}
if (!isset($_SESSION["user"])) {
    echo '<script>alert("You are not allowed here.");</script>';
    header("location:Homepage.php");
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css">
</head>

<style>

</style>

<body>
<?php require_once('header.php');?>
    <br />
    <div class="container min-vh-100 justify-content-center align-items-center " >
    
        <div class="shadow-sm mx-2 border rounded p-5">
            <h3>My Profile</h3>

            <div class="form-group">
                <label for="uinput2" class="mt-3 mb-1 text-muted">
                    Username
                </label>
                <input id="uinput2" type="text" name="user" class="form-control"
                    value="<?php echo $_SESSION["user"]; ?>" required disabled/>
                <label for="uinput5" class="mt-3 mb-1 text-muted">
                    Password
                </label>
                <input id="uinput5" type="password" name="pass" class="form-control"
                    value="<?php echo $_SESSION["pass"]; ?>" required disabled/>
                <label for="fname" class="mt-3 mb-1 text-muted">
                    First Name
                </label>
                <input id="fname" type="text" name="fname" class="form-control"
                    value="<?php echo $_SESSION["fname"]; ?>" required disabled/>
                <label for="lname" class="mt-3 mb-1 text-muted">
                    Last Name
                </label>
                <input id="lname" type="text" name="lname" class="form-control"
                    value="<?php echo $_SESSION["lname"]; ?>" required disabled/>
                <label for="email" class="mt-3 mb-1 text-muted">
                    Email
                </label>
                <input id="email" type="text" name="email" class="form-control"
                    value="<?php echo $_SESSION["email"]; ?>" required disabled/>
                <label for="mobile" class="mt-3 mb-1 text-muted">
                    Mobile Number
                </label>
                <input id="mobile" type="text" name="mobile" class="form-control"
                    value="<?php echo $_SESSION["mobile"]; ?>" required disabled/>
            </div>

            <a href="edit-profile.php" class="text-muted"><button name="submit" type="submit" class="mt-2 w-100">
                Modify Account
            </button></a>


        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>