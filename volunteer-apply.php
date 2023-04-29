<?php
if (session_id() == "") {
  session_start();
}
if (!isset($_SESSION['user'])) {
  session_destroy();
  echo "<script>
  alert('You cannot volunteer when not logged in.');
  window.location = 'Homepage.php';
  </script>";
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form data
  $name = isset($_POST['name']) ? $_POST['name'] : '';
  $age = isset($_POST['age']) ? $_POST['age'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $contact_number = isset($_POST['contact_number']) ? $_POST['contact_number'] : '';
  $volunteer_date = isset($_POST['volunteer_date']) ? $_POST['volunteer_date'] : '';


  // Add more validation rules here as needed
  // Check if all fields are filled out
  if (empty($name) || empty($age) || empty($email) || empty($contact_number) || empty($volunteer_date)) {
    ?>
    <script>
      alert("Please fill out all fields in the form.");
      window.history.back();
    </script>
    <?php
    exit();
  }

  // Check if age is a number
  if (!is_numeric($age)) {
    ?>
    <script>
      alert("Age must be a number. Please enter a valid age.");
      window.history.back();
    </script>
    <?php
    exit();
  }

  // Validate email address format
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    ?>
    <script>
      alert("Please enter a valid email address.");
      window.history.back();
    </script>
    <?php
    exit();
  }

  // Check if contact number is valid
  if (!preg_match('/^\+?[0-9]{10,}$/', $contact_number)) {
    ?>
    <script>
      alert("Please enter a valid contact number.");
      window.history.back();
    </script>
    <?php
    exit();
  }

  require __DIR__ . '/vendor/autoload.php';
  include('connection.php');

  // Insert the form data into the database if there are no errors
  if (empty($errors)) {

    $postData = [
      'name' => $name,
      'age' => $age,
      'email' => $email,
      'contact' => $contact_number,
      'user' => $_SESSION['user'],
      'date' => $volunteer_date,
      'status' => "Pending"
    ]; //this is the schema
    $ref_table = "volunteer";
    $database->getReference($ref_table)->push($postData);
    ?>
    <script>
      alert("Volunteer data inserted successfully");
      header("Location: Homepage.php");
    </script>
    <?php
  } else {
    // Display errors to the user (optional)
    foreach ($errors as $error) {
      echo "<p>$error</p>";
    }
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
  <title>Volunteer</title>
  <link rel="stylesheet" href="style2.css">
</head>

<style>

</style>

<body>
  <?php require_once('header.php'); ?>
  <!-- This is the code for title header -->
  <div class="container title">
    <h1 class="text-center " style="text-shadow: 1px 1px 4px #000; font-size: 40px;"><strong>VOLUNTEER</strong></h1>
    <h1 class="text-center " style="text-shadow: 1px 1px 4px #000; font-size: 40px;"><strong>APPLICATION</strong></h1>
    <h1 class="text-center " style="text-shadow: 1px 1px 4px #000;font-size: 40px; color:#fddc6a;"><strong>FORM</strong>
    </h1>
  </div>




  <!-- This is the code for the forms -->
  <div class="container">
    <div class="form_title">Sweet Pets Haven Volunteer</div>
    <div class="content">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="user-details">

          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" id="name" name="name" value="<?php echo $_SESSION['fname']." ".$_SESSION['lname']?>" required readonly><br>
          </div>

          <div class="input-box">
            <span class="details">Age</span>
            <input type="number" id="age" name="age" placeholder="Enter your age"  required><br>
          </div>

          <div class="input-box">
            <span class="details">E-mail</span>
            <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']?>"  required readonly><br>
          </div>

          <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="tel" id="contact_number" name="contact_number" value="<?php echo $_SESSION['mobile']?>"
              required readonly><br>
          </div>

          <div class="input-box">
            <span class="details">Volunteer Date</span>
            <select id="volunteer_date" name="volunteer_date" style="border:solid 1px #f9b532;" required>
              <option>Select a date</option>
              <?php
              require __DIR__ . '/vendor/autoload.php';
              include('connection.php');
              $ref_table = 'volunteer_dates';
              $fetch_data = $database->getReference($ref_table)->getValue();
              if ($fetch_data > 0) {
                foreach ($fetch_data as $key => $row) {
                  $dates = $row['date'];
                  echo "<option value='$dates'>$dates</option>";
                }
                ?>
              </select><br>
            </div>
          </div>
          <?php

              }
              ?>
        <br />

        <div class="button">
          <input type="submit" value="Submit">
        </div>
      </form>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>