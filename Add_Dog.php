<?php
if (session_id() == "") {
    session_start();
}
if (!isset($_SESSION['admin'])) {
    session_destroy();
    echo "<script>
    alert('You are not allowed here.');
    window.location = 'Homepage.php';
    </script>";
}
include('process-dog.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Our Animals</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="animal-style.css">
    <link rel="stylesheet" href="adopt.css" />
</head>

<body>
    <?php require_once('header.php'); ?>
    <br><br>
    <div>
        <div class="container min-vh-100 justify-content-center align-items-center">
            <div class="shadow-sm mx-2 border rounded p-5">
                <h3>Pet for Adoption</h3>
                <?php if (isset($alert)) { ?>
                    <div class="alert alert-success mt-4">
                        <?php echo $alert; ?>
                    </div>
                <?php } ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="uinput5" class="mt-3 mb-1 text-muted">
                            NAME
                        </label>
                        <input id="uinput5" type="text" name="name" class="form-control" required />
                        <label for="fname" class="mt-3 mb-1 text-muted">
                            BREED
                        </label>
                        <input id="fname" type="text" name="breed" class="form-control" required />
                        <label for="lname" class="mt-3 mb-1 text-muted">
                            AGE
                        </label>
                        <input id="lname" type="number" name="age" class="form-control" required />
                        <label for="date" class="mt-3 mb-1 text-muted">
                            Years/Months
                        </label>
                        <select id="date" name="date" required class="form-control">
                            <option value="Years">Years</option>
                            <option value="Months">Months</option>
                        </select>
                        <label for="sex" class="mt-3 mb-1 text-muted">
                            SEX
                        </label>
                        <select id="sex" name="sex" required class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <label for="files[]" class="mt-3 mb-1 text-muted">
                            Upload Image
                        </label>
                        <br>
                        <input type="file" name="image" required>

                    </div>

                    <button name="submit" type="submit" class="mt-2 w-100">
                        ADD DOG
                    </button>

                </form>
            </div>
        </div>
</body>