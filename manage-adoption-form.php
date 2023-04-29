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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require __DIR__ . '/vendor/autoload.php';
  include('connection.php');
  if (isset($_POST['approve'])) {
    // Check if form is approved
    $updateData = [
      'status' => "Approved"
    ];
    $key = $_SESSION['adopt-key'];
    $database->getReference("adopt/$key")->update($updateData);
    header("Location: manage-adoption-appointment.php");
  }
  if (isset($_POST['deny'])) {
    // Check if form is denied
    $updateData = [
      'status' => "Denied"
    ];
    $key = $_SESSION['adopt-key'];
    $database->getReference("adopt/$key")->update($updateData);
    header("Location: manage-adoption-appointment.php");
  }
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
  <title>Manage Adoption Form</title>
  <link rel="stylesheet" href="style2.css">
</head>

<style>

</style>

<body>
  <?php require_once('header.php'); ?>
  <!-- This is the code for title header -->
  <div class="container title">
    <h1 class="text-center " style="text-shadow: 1px 1px 4px #000; font-size: 40px;"><strong>VIEWING</strong></h1>
    <h1 class="text-center " style="text-shadow: 1px 1px 4px #000; font-size: 40px;"><strong>ADOPTION</strong></h1>
    <h1 class="text-center " style="text-shadow: 1px 1px 4px #000;font-size: 40px; color:#fddc6a;"><strong>FORM</strong>
    </h1>
  </div>


  <!-- This is the code for the forms -->
  <div class="container">
    <div class="content">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <?php
        require __DIR__ . '/vendor/autoload.php';
        include('connection.php');
        if (isset($_GET['key']))
          $_SESSION['adopt-key'] = $_GET['key'];
        $ref_table = "adopt";
        $fetch_data = $database->getReference($ref_table)->orderByKey()->equalTo($_SESSION['adopt-key'])
          ->getValue();

        if ($fetch_data > 0) {
          foreach ($fetch_data as $key => $row) {


            ?>
            <div class="form_title">Pet Information for Adoption</div>
            <div class="user-details">
              <div class="input-box">
                <span class="details"> Pet ID</span>
                <input type="text" id="pet_id" name="pet_id" value="<?php echo $row['pet_id'] ?>" readonly><br>
              </div>

              <div class="input-box">
                <span class="details">Pet Name</span>
                <input type="text" id="pet_name" name="pet_name" value="<?php echo $row['name'] ?>" readonly><br>
              </div>
            </div>

            <div class="form_title">User Information</div>
            <label for="legal_name" class="mt-3 mb-1 text-muted">
              Full Legal Name
            </label>
            <input id="legal_name" type="text" name="legal_name" class="form-control"
              value="<?php echo $row['legal_name'] ?>" required readonly />
            <label for="Address" class="mt-3 mb-1 text-muted">
              Complete Address
            </label>
            <input id="Address" type="text" name="Address" class="form-control" value="<?php echo $row['address'] ?>"
              required readonly />
            <label for="Facebook" class="mt-3 mb-1 text-muted">
              Facebook Profile Name
            </label>
            <input id="Facebook" type="text" name="Facebook" class="form-control" value="<?php echo $row['facebook'] ?>"
              required readonly />
            <label class="mt-3 mb-1 text-muted">
              Home Ownership
            </label><br>
            <input type="radio" id="Owned" name="Home" value="Owned" required readonly <?php echo ($row['home'] == "Owned") ? 'checked' : '' ?>>
            <label for="Owned">Owned</label><br>
            <input type="radio" id="Rented" name="Home" value="Rented" readonly <?php echo ($row['home'] == "Rented") ? 'checked' : '' ?>>
            <label for="Rented">Rented</label><br>
            <input type="radio" id="Relatives" name="Home" value="Living with Relatives" readonly <?php echo ($row['home'] == "Living with Relatives") ? 'checked' : '' ?>>
            <label for="Relatives">Living with Relatives</label><br>
            <label for="length" class="mt-3 mb-1 text-muted">
              For how long have you been living in your home?
            </label>
            <input id="length" type="text" name="length" class="form-control" value="<?php echo $row['length']; ?>" required
              readonly />
            <label class="mt-3 mb-1 text-muted">
              Does your landlord/landlady allow pets?
            </label><br>
            <input type="radio" id="yes" name="allowed" value="Yes" required readonly <?php echo ($row['allowed'] == "Yes") ? 'checked' : '' ?>>
            <label for="yes">Yes</label><br>
            <input type="radio" id="no" name="allowed" value="No" readonly <?php echo ($row['allowed'] == "No") ? 'checked' : '' ?>>
            <label for="no">No</label><br>
            <label for="adults" class="mt-3 mb-1 text-muted">
              How many Adults are in the household?
            </label>
            <input id="adults" type="number" name="adults" class="form-control" value="<?php echo $row['adults']; ?>"
              required readonly />
            <label for="child" class="mt-3 mb-1 text-muted">
              How many Children are in the household?
            </label>
            <input id="child" type="number" name="child" class="form-control" value="<?php echo $row['child']; ?>" required
              readonly />
            <label class="mt-3 mb-1 text-muted">
              Are all members of the family supportive of this adoption?
            </label><br>
            <input type="radio" id="yes" name="adoption" value="Yes" required readonly <?php echo ($row['adoption'] == "Yes") ? 'checked' : '' ?>>
            <label for="yes">Yes</label><br>
            <input type="radio" id="no" name="adoption" value="No" readonly <?php echo $row['child']; ?>>
            <label for="no">No, will still convince them</label><br>
            <label class="mt-3 mb-1 text-muted">
              Are you planning to move in the future?
            </label><br>
            <input type="radio" id="yes" name="move" value="Yes" required readonly <?php echo ($row['move'] == "Yes") ? 'checked' : '' ?>>
            <label for="yes">Yes</label><br>
            <input type="radio" id="no" name="move" value="No" readonly <?php echo ($row['move'] == "No") ? 'checked' : '' ?>>
            <label for="no">No</label><br>
            <label class="mt-3 mb-1 text-muted">
              Are you willing to take your pet with you?
            </label><br>
            <input type="radio" id="yes" name="willing" value="Yes" required readonly <?php echo ($row['willing'] == "Yes") ? 'checked' : '' ?>>
            <label for="yes">Yes</label><br>
            <input type="radio" id="no" name="willing" value="No" readonly <?php echo ($row['willing'] == "No") ? 'checked' : '' ?>>
            <label for="no">No</label><br>
            <label for="responsible" class="mt-3 mb-1 text-muted">
              Who will be responsible for the pet's care
            </label>
            <input id="responsible" type="text" name="responsible" class="form-control"
              value="<?php echo $row['responsible']; ?>" required readonly />
            <label class="mt-3 mb-1 text-muted">
              What is your Source of Income
            </label><br>
            <input type="radio" id="No Job" name="Income" value="No Job" required readonly <?php echo ($row['income'] == "No Job") ? 'checked' : '' ?>>
            <label for="No Job">No Job</label><br>
            <input type="radio" id="Employed" name="Income" value="Employed" readonly <?php echo ($row['income'] == "Employed") ? 'checked' : '' ?>>
            <label for="Employed">Employed</label><br>
            <input type="radio" id="Self Employed" name="Income" value="Self Employed" readonly <?php echo ($row['income'] == "Self Employed") ? 'checked' : '' ?>>
            <label for="Self Employed">Self Employed</label><br>
            <input type="radio" id="Allowance" name="Income" value="Allowance" readonly <?php echo ($row['income'] == "Allowance") ? 'checked' : '' ?>>
            <label for="Allowance">Allowance</label><br>
            <input type="radio" id="Others" name="Income" value="Others" readonly <?php echo ($row['income'] == "Others") ? 'checked' : '' ?>>
            <label for="Others">Others</label><br>
            <label for="return" class="mt-3 mb-1 text-muted">
              If you will return an animal, what would be the reason?
            </label>
            <input id="return" type="text" name="return" class="form-control" value="<?php echo $row['return']; ?>" required
              readonly />
            <label class="mt-3 mb-1 text-muted">
              Do you plan to give this dog/cat as a gift?
            </label><br>
            <input type="radio" id="yes" name="gift" value="Yes" required readonly <?php echo ($row['gift'] == "Yes") ? 'checked' : '' ?>>
            <label for="yes">Yes</label><br>
            <input type="radio" id="no" name="gift" value="No" readonly <?php echo ($row['gift'] == "No") ? 'checked' : '' ?>>
            <label for="no">No</label><br>
            <label class="mt-3 mb-1 text-muted">
              Do you have other pets?
            </label><br>
            <input type="radio" id="yes" name="other" value="Yes" required readonly <?php echo ($row['other'] == "Yes") ? 'checked' : '' ?>>
            <label for="yes">Yes</label><br>
            <input type="radio" id="no" name="other" value="No" readonly <?php echo ($row['other'] == "No") ? 'checked' : '' ?>>
            <label for="no">No</label><br>
            <label for="kept" class="mt-3 mb-1 text-muted">
              Where will the pet be kept during the day or night? (i.e. indoors, outside, yard, cage, etc.)
            </label>
            <input id="kept" type="text" name="kept" class="form-control" value="<?php echo $row['kept']; ?>" required
              readonly />
            <label for="food" class="mt-3 mb-1 text-muted">
              What type of food do you plan to feed the pet?
            </label>
            <input id="food" type="text" name="food" class="form-control" value="<?php echo $row['food']; ?>" required
              readonly />
            <label for="vet" class="mt-3 mb-1 text-muted">
              Who is your veterinarian?
            </label>
            <input id="vet" type="text" name="vet" class="form-control" value="<?php echo $row['vet']; ?>" required
              readonly />
            <label for="reason" class="mt-3 mb-1 text-muted">
              Please state a brief reason/s for wanting to adopt this pet:
            </label>
            <input id="reason" type="text" name="reason" class="form-control" value="<?php echo $row['reason']; ?>" required
              readonly />
            <label for="date" class="form-label">Preferred Interview Date</label>
            <input type="date" class="form-control" id="date" name="date" min="<?php
            echo date('Y-m-d');
            ?>" value="<?php echo $row['date']; ?>" required readonly>
        </div>

        <div class="d-flex justify-content-center flex-wrap">
          <button type="submit" name="approve" class="btn-lg btn-success mx- mb-2">Approve</button>
          <button type="submit" name="deny" class="btn-lg btn-danger mx-3 mb-2"> Deny</button>
        </div>
        <?php

          }
        }
        ?>
    </form>
  </div>


  </div>
  </div>













  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>