<?php
if (session_id() == "") {
  session_start();
}
if (!isset($_SESSION['user'])) {
  session_destroy();
  echo "<script>
  alert('You cannot adopt when not logged in.');
  window.location = 'animals.php';
  </script>";
}
require('./process-adopt.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Adopt Form | Sweet Pets Haven</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="style3.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="adopt-form.css" />

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
            <input id="uinput2" type="text" name="id" class="form-control" value="<?php echo $ID ?>" required
              readonly />
            <label for="uinput5" class="mt-3 mb-1 text-muted">
              NAME
            </label>
            <input id="uinput5" type="text" name="name" class="form-control" value="<?php echo $name ?>" required
              readonly />
            <label for="fname" class="mt-3 mb-1 text-muted">
              BREED
            </label>
            <input id="fname" type="text" name="breed" class="form-control" value="<?php echo $breed ?>" required
              readonly />
            <label for="lname" class="mt-3 mb-1 text-muted">
              AGE
            </label>
            <input id="lname" type="text" name="age" class="form-control" value="<?php echo $age ?>" required
              readonly />
            <label for="email" class="mt-3 mb-1 text-muted">
              SEX
            </label>
            <input id="email" type="text" name="sex" class="form-control" value="<?php echo $sex ?>" required
              readonly />
            <label for="stat" class="mt-3 mb-1 text-muted">
              STATUS
            </label>
            <input id="stat" type="text" name="status" class="form-control" value="<?php echo $status ?>" required
              readonly />


            <h3>User Information</h3>
            <label for="legal_name" class="mt-3 mb-1 text-muted">
              Full Legal Name
            </label>
            <input id="legal_name" type="text" name="legal_name" class="form-control"
              value="<?php if (isset($_POST['legal_name']))
                echo $_POST['legal_name']; ?>" required />
            <label for="Address" class="mt-3 mb-1 text-muted">
              Complete Address
            </label>
            <input id="Address" type="text" name="Address" class="form-control"
              value="<?php if (isset($_POST['Address']))
                echo $_POST['Address']; ?>" required />
            <label for="Facebook" class="mt-3 mb-1 text-muted">
              Facebook Profile Name
            </label>
            <input id="Facebook" type="text" name="Facebook" class="form-control"
              value="<?php if (isset($_POST['Facebook']))
                echo $_POST['Facebook']; ?>" required />
            <label class="mt-3 mb-1 text-muted">
              Home Ownership
            </label><br>
            <input type="radio" id="Owned" name="Home" value="Owned" required>
            <label for="Owned">Owned</label><br>
            <input type="radio" id="Rented" name="Home" value="Rented">
            <label for="Rented">Rented</label><br>
            <input type="radio" id="Relatives" name="Home" value="Living with Relatives">
            <label for="Relatives">Living with Relatives</label><br>
            <label for="length" class="mt-3 mb-1 text-muted">
              For how long have you been living in your home?
            </label>
            <input id="length" type="text" name="length" class="form-control"
              value="<?php if (isset($_POST['length']))
                echo $_POST['length']; ?>" required />
            <label class="mt-3 mb-1 text-muted">
              Does your landlord/landlady allow pets?
            </label><br>
            <input type="radio" id="yes" name="allowed" value="Yes" required>
            <label for="yes">Yes</label><br>
            <input type="radio" id="no" name="allowed" value="No">
            <label for="no">No</label><br>
            <label for="adults" class="mt-3 mb-1 text-muted">
              How many Adults are in the household?
            </label>
            <input id="adults" type="number" name="adults" class="form-control"
              value="<?php if (isset($_POST['adults']))
                echo $_POST['adults']; ?>" required />
            <label for="child" class="mt-3 mb-1 text-muted">
              How many Children are in the household?
            </label>
            <input id="child" type="number" name="child" class="form-control"
              value="<?php if (isset($_POST['child']))
                echo $_POST['child']; ?>" required />
            <label class="mt-3 mb-1 text-muted">
              Are all members of the family supportive of this adoption?
            </label><br>
            <input type="radio" id="yes1" name="adoption" value="Yes" required>
            <label for="yes1">Yes</label><br>
            <input type="radio" id="no1" name="adoption" value="No">
            <label for="no1">No, will still convince them</label><br>
            <label class="mt-3 mb-1 text-muted">
              Are you planning to move in the future?
            </label><br>
            <input type="radio" id="yes2" name="move" value="Yes" required>
            <label for="yes2">Yes</label><br>
            <input type="radio" id="no2" name="move" value="No">
            <label for="no2">No</label><br>
            <label class="mt-3 mb-1 text-muted">
              Are you willing to take your pet with you?
            </label><br>
            <input type="radio" id="yes3" name="willing" value="Yes" required>
            <label for="yes3">Yes</label><br>
            <input type="radio" id="no3" name="willing" value="No">
            <label for="no3">No</label><br>
            <label for="responsible" class="mt-3 mb-1 text-muted">
              Who will be responsible for the pet's care
            </label>
            <input id="responsible" type="text" name="responsible" class="form-control"
              value="<?php if (isset($_POST['responsible']))
                echo $_POST['responsible']; ?>" required />
            <label class="mt-3 mb-1 text-muted">
              What is your Source of Income
            </label><br>
            <input type="radio" id="No Job" name="Income" value="No Job" required>
            <label for="No Job">No Job</label><br>
            <input type="radio" id="Employed" name="Income" value="Employed">
            <label for="Employed">Employed</label><br>
            <input type="radio" id="Self Employed" name="Income" value="Self Employed">
            <label for="Self Employed">Self Employed</label><br>
            <input type="radio" id="Allowance" name="Income" value="Allowance">
            <label for="Allowance">Allowance</label><br>
            <input type="radio" id="Others" name="Income" value="Others">
            <label for="Others">Others</label><br>
            <label for="return" class="mt-3 mb-1 text-muted">
              If you will return an animal, what would be the reason?
            </label>
            <input id="return" type="text" name="return" class="form-control"
              value="<?php if (isset($_POST['return']))
                echo $_POST['return']; ?>" required />
            <label class="mt-3 mb-1 text-muted">
              Do you plan to give this dog/cat as a gift?
            </label><br>
            <input type="radio" id="yes4" name="gift" value="Yes" required>
            <label for="yes4">Yes</label><br>
            <input type="radio" id="no4" name="gift" value="No">
            <label for="no4">No</label><br>
            <label class="mt-3 mb-1 text-muted">
              Do you have other pets?
            </label><br>
            <input type="radio" id="yes5" name="other" value="Yes" required>
            <label for="yes5">Yes</label><br>
            <input type="radio" id="no5" name="other" value="No">
            <label for="no5">No</label><br>
            <label for="kept" class="mt-3 mb-1 text-muted">
              Where will the pet be kept during the day or night? (i.e. indoors, outside, yard, cage, etc.)
            </label>
            <input id="kept" type="text" name="kept" class="form-control"
              value="<?php if (isset($_POST['kept']))
                echo $_POST['kept']; ?>" required />
            <label for="food" class="mt-3 mb-1 text-muted">
              What type of food do you plan to feed the pet?
            </label>
            <input id="food" type="text" name="food" class="form-control"
              value="<?php if (isset($_POST['food']))
                echo $_POST['food']; ?>" required />
            <label for="vet" class="mt-3 mb-1 text-muted">
              Who is your veterinarian?
            </label>
            <input id="vet" type="text" name="vet" class="form-control"
              value="<?php if (isset($_POST['vet']))
                echo $_POST['vet']; ?>" required />
            <label for="reason" class="mt-3 mb-1 text-muted">
              Please state a brief reason/s for wanting to adopt this pet:
            </label>
            <input id="reason" type="text" name="reason" class="form-control"
              value="<?php if (isset($_POST['reason']))
                echo $_POST['reason']; ?>" required />
            <label for="date" class="form-label">Preferred Interview Date</label>
            <input type="date" class="form-control" id="date" name="date" min="<?php
            echo date('Y-m-d');
            ?>" required>
          </div>

          <button name="submit" type="submit" class="mt-2 w-100" <?php echo ($status != "Available") ? "disabled" : "" ?>>
            ADOPT
          </button>

        </form>
      </div>
    </div>

  </div>
  <br><br>
  <br>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>