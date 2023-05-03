<?php
require('./process-signup.php');
if (session_id() == "") {
    session_start();
}
if (isset($_SESSION["user"])) {
    echo '<script>alert("You are already logged in.");
    window.location = "Homepage.php";</script>';

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
    <title>Sign Up | Sweet Pets Haven</title>
    <link rel="stylesheet" href="style.css">
</head>

<style>

</style>

<body>
    <?php require_once('header.php'); ?>
    <div class="d-flex min-vh-100 justify-content-center align-items-center">
        <div class="shadow-sm mx-2 border rounded p-5">
            <h3>Create an Account</h3>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="">
                    <div class="form-group">
                        <label for="uinput" class="mt-3 mb-1 text-muted">
                            First Name
                        </label>
                        <input id="uinput" type="text" name="fname" class="form-control" value="<?php echo $fname; ?>"
                            required />
                        <label for="uinput3" class="mt-3 mb-1 text-muted">
                            Last Name
                        </label>
                        <input id="uinput3" type="text" name="lname" class="form-control" value="<?php echo $lname; ?>"
                            required />
                        <label for="uinput2" class="mt-3 mb-1 text-muted">
                            Username
                        </label>
                        <input id="uinput2" type="text" name="user" class="form-control" value="<?php echo $user; ?>"
                            required />
                        <label for="uinput5" class="mt-3 mb-1 text-muted">
                            Password
                        </label>
                        <input id="uinput5" type="password" name="pass" class="form-control"
                            value="<?php echo $pass; ?>" required />
                        <label for="uinput4" class="mt-3 mb-1 text-muted">
                            Email
                        </label>
                        <input id="uinput4" type="email" name="email" class="form-control" value="<?php echo $email; ?>"
                            required />
                        <label for="uinput6" class="mt-3 mb-1 text-muted">
                            Mobile Number
                        </label>
                        <input id="uinput6" type="text" name="mobile" class="form-control"
                            value="<?php echo $mobile; ?>" required />
                    </div>
                </div>
                <button name="submit" type="submit" class="mt-2 w-100">
                    Sign Up
                </button>
                <small class="d-block mt-3">
                    <a href="login.php" class="text-muted">Login</a>
                </small>
            </form>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>   
</body>

</html>