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

require __DIR__ . '/vendor/autoload.php';
include('connection.php');
if (isset($_POST['approve'])) {
  // Check if form is approved
  $updateData = [
    'status' => "Approved"
  ];
  $key = $_SESSION['volunteer-key'];
  $database->getReference("volunteer/$key")->update($updateData);
  header("Location: admin_manage_volunteer.php");
}
if (isset($_POST['deny'])) {
  // Check if form is denied
  $updateData = [
    'status' => "Denied"
  ];
  $key = $_SESSION['volunteer-key'];
  $database->getReference("volunteer/$key")->update($updateData);
  header("Location: admin_manage_volunteer.php");
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
  <title>Volunteer</title>
  <link rel="stylesheet" href="style2.css">
</head>


<style>
  #center {
    text-align: center;
    padding: 50 50 50 50;
  }

  .flex-container {
    display: flex;
    justify-content: space-between;
    /* Align the columns horizontally */
    width: 100%;
  }

  /* Define the column class */
  .column {
    flex-basis: 30%;
    /* Set the width of each column */
  }

  /* Style the button */
  .flex-button {
    width: 100%;
    padding: 10px;
    font-size: 16px;
  }
</style>

<body>
  <?php require_once('header.php'); ?>


  <div class="container" id="center">
    <h3>Viewing</h3>
    <h3><b>Volunteer Application Form</b></h3>
  </div>


  <!-- This is the code for the forms -->
  <div class="container">
    <div class="form_title">Sweet Pets Haven Volunteer</div>
    <div class="content">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="user-details">
          <?php

          if (!isset($_SESSION['volunteer-key'])) {

            $_SESSION['volunteer-key'] = $_GET['key'];
          }
          $fetch_data = $database->getReference('volunteer')
            ->orderByKey()
            ->equalTo($_SESSION['volunteer-key'])
            ->getValue();
          if ($fetch_data > 0) {
            foreach ($fetch_data as $key => $row) {

              ?>
              <div class="input-box">
                <span class="details" id="name" name="name">Full Name</span>
                <input type="text" id="name" name="name" placeholder="<?php echo $row['name']; ?>" readonly><br>
              </div>

              <div class="input-box">
                <span class="details" id="age" name="age">Age</span>
                <input type="number" id="age" name="age" placeholder="<?php echo $row['age']; ?>" readonly><br>
              </div>

              <div class="input-box" id="email" name="email">
                <span class="details">E-mail</span>
                <input type="email" id="email" name="email" placeholder="<?php echo $row['email']; ?>" readonly><br>
              </div>

              <div class="input-box">
                <span class="details" id="contact_number" name="contact_number">Contact Number</span>
                <input type="tel" id="contact_number" name="contact_number" placeholder="<?php echo $row['contact']; ?>"
                  readonly><br>
              </div>
              <?php

            }
          }
          ?>
          <div class="flex-container">
            <div class="column">
              <button class="flex-button" type="submit" name="approve" value="Approve">Approve</button>
            </div>
            <div class="column">
              <button class="flex-button" type="submit" name="deny" value="Deny">Deny</button>
            </div>

          </div>

      </form>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>