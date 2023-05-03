<?php
if (session_id() == "") {
    session_start();
}
require('./process-edit-pet.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Pet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="style3.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="adopt-form.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

    <style>

    </style>
</head>

<body>
    <?php require_once('header.php');
    // Include config file
    require __DIR__ . '/vendor/autoload.php';
    include('connection.php');
    if (isset($_GET['cat'])) {
        $_SESSION['cat'] = $_GET['cat'];
        $_SESSION['petID'] = $_GET['petID'];
        $_SESSION['imageSrc'] = $_GET['imageSrc'];
    }
    $cat = $_SESSION['cat'];
    $ID = $_SESSION['petID'];

    if ($cat == "true") {
        $ref_table = 'cat_images';
        $fetch_data = $database->getReference($ref_table)->getValue();
        foreach ($fetch_data as $key => $row) {
            if ($row['pet_id'] == $ID) {
                $name = $row['name'];
                $breed = $row['breed'];
                $age = $row['age'];
                $sex = $row['sex'];
                $Status = $row['status'];
                break;
            }
        }

    } else {
        $ref_table = 'dog_images';
        $fetch_data = $database->getReference($ref_table)->getValue();
        foreach ($fetch_data as $key => $row) {
            if ($row['pet_id'] == $ID) {
                $name = $row['name'];
                $breed = $row['breed'];
                $age = $row['age'];
                $sex = $row['sex'];
                $status = $row['status'];
                break;
            }
        }
        $comp = preg_split('/\s+/', $age);

    }
    ?>
    <br><br>
    <div>
        <div class="container min-vh-100 justify-content-center align-items-center">
            <div class="shadow-sm mx-2 border rounded p-5">
                <img src="<?php echo $_SESSION['imageSrc']; ?>" id="image" class="img-fluid rounded mx-auto d-block"
                    style="width: 200px;height: 200px;">
                <h3>Pet for Adoption</h3>
                <?php if (isset($alert)) { ?>
                    <div class="alert alert-success mt-4">
                        <?php echo $alert; ?>
                    </div>
                <?php } ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-group">
                        <label for="uinput2" class="mt-3 mb-1 text-muted">
                            PET ID
                        </label>
                        <input id="uinput2" type="text" name="id" class="form-control" value="<?php echo $ID ?>"
                            required readonly />
                        <label for="uinput5" class="mt-3 mb-1 text-muted">
                            NAME
                        </label>
                        <input id="uinput5" type="text" name="name" class="form-control" value="<?php echo $name ?>"
                            required />
                        <label for="fname" class="mt-3 mb-1 text-muted">
                            BREED
                        </label>
                        <input id="fname" type="text" name="breed" class="form-control" value="<?php echo $breed ?>"
                            required />
                        <label for="lname" class="mt-3 mb-1 text-muted">
                            AGE
                        </label>
                        <input id="lname" type="number" name="age" min="1" class="form-control"
                            value="<?php echo $comp[0] ?>" required />
                        <label for="date" class="mt-3 mb-1 text-muted">
                            Years/Months
                        </label>
                        <select id="date" name="date" required class="form-control">
                            <option value="Years" <?php if ($comp[1] == "Years")
                                echo "selected"; ?>>Years</option>
                            <option value="Months" <?php if ($comp[1] == "Months")
                                echo "selected"; ?>>Months</option>
                        </select>
                        <label for="sex" class="mt-3 mb-1 text-muted">
                            SEX
                        </label>
                        <select id="sex" name="sex" required class="form-control">
                            <option value="Male" <?php if ($sex == "Male")
                                echo "selected"; ?>>Male</option>
                            <option value="Female" <?php if ($sex == "Female")
                                echo "selected"; ?>>Female</option>
                        </select>
                        <label for="status" class="mt-3 mb-1 text-muted">
                            STATUS
                        </label>
                        <select id="status" name="status" required class="form-control">
                            <option value="Available">Available</option>
                            <option value="On Hold">On Hold</option>
                            <option value="Adopted">Adopted</option>
                        </select>
                    </div>

                    <button name="submit" type="submit" class="mt-2 w-100">
                        Save Changes
                    </button>
                    <br>

                </form>
                <form action="deletepet.php">
                    <input type="text" name="id2" class="form-control" value="<?php echo $ID ?>" required readonly
                        hidden />
                    <button type="submit" class="delete mt-2 w-100">Delete</button>
                </form>
            </div>
        </div>




    </div>
    <br><br>
    <br>
    <script>
        $('.delete').click(function () { return confirm("are you sure?"); });
    </script>
</body>

</html>