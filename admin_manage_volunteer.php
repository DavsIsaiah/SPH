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
if (isset($_POST['add'])) {
  $ref_table = "volunteer_dates";
  $fetch_data = $database->getReference($ref_table)->orderByChild('date')->equalTo($_POST['date'])->getValue();
  if ($fetch_data > 0 && !empty($fetch_data)) {
    echo "<script>alert('The date is already added!')</script>";
  } else {
    $postData = [
      'date' => $_POST['date']
    ];
    $database->getReference($ref_table)->push($postData);
    echo '<script>window.location = "admin_manage_volunteer.php";</script>';

  }
}
if (isset($_POST['delete'])) {
  $ref_table = "volunteer_dates";
  $fetch_data = $database->getReference($ref_table)->getValue();
  if ($fetch_data > 0) {
    foreach ($fetch_data as $key => $row) {
      if ($row['date'] == $_POST['date']) {
        $database->getReference("$ref_table/$key")->remove();
        echo '<script>window.location = "admin_manage_volunteer.php";</script>';

      }
    }
    echo "<script>alert('Date cannot be found!')</script>";
  } else {
    echo "<script>alert('Dates are empty!')</script>";
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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Manage Volunteers</title>
  <link rel="stylesheet" href="style2.css">
</head>

<style>
  h4 {
    text-align: center;
    margin-top: 50px;
    margin-bottom: 50px;
  }

  cont-volunteer-sched. {
    background-color: #fddc6a;
    width
  }

  #volunteer-date {
    text-align: center;
    margin-bottom: 50px;
  }

  .btn {
    background-color: blue;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
</style>

<body>
  <?php require_once('header.php'); ?>
  <!-- This is the code for title header -->

  <h4>Set Available Schedule for Volunteering</h4>

  <div class="input-box" id="volunteer-date">
    <form method="post">
      <h5 for="date">Add or Delete Dates:</h5>
      <input type="date" id="date" name="date"> &nbsp;
      <button type="submit" name="add"><i class="material-icons" style="font-size:19px">add_circle</i></button>
      <button type="submit" name="delete"><i class="material-icons" style="font-size:19px">delete_forever</i></button>
    </form>
    <br>
    <h5 for="dates">Available Dates:</h5>
    <select id="dates">
      <?php
      $ref_table = "volunteer_dates";
      $fetch_data = $database->getReference($ref_table)->getValue();
      if ($fetch_data > 0) {
        foreach ($fetch_data as $key => $row) {
          $dates = $row['date'];
          echo "<option value='$dates'>$dates</option>";
        }
      } else {
        echo "<option>No Dates Available</option>";
      }
      ?>

    </select>
  </div>

  <div class="container">
    <section class="title">
      <h1 class="text-center" style="text-shadow: 1px 1px 4px #000;  font-size: 30px;">
        <strong> Volunteer Schedule</strong>
      </h1>
    </section>


    <table>
      <thead>
        <tr>
          <th>Volunteer Date</th>
          <th>Volunteer's Name</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $ref_table = "volunteer";
        $fetch_data = $database->getReference($ref_table)->getValue();
        if ($fetch_data > 0) {
          foreach ($fetch_data as $key => $row) {
            ?>
            <tr>
              <!-- Volunteer Date -->
              <td>
                <p>
                  <?php echo $row['date']; ?>
                </p>
              </td>
              <!-- Volunteer Name -->
              <td>
                <p>
                  <?php echo $row['name']; ?>
                </p>
              </td>
              <!-- Status -->
              <td>
                <p>
                  <?php echo $row['status']; ?>
                </p>
              </td>
              <!-- Actions -->
              <td>
                <a href="admin_view_volunteer.php?key=<?php echo $key; ?>"><button id="view" class="btn">View</button></a>
              </td>
            </tr>
            <?php
          }
        }
        ?>
      </tbody>
    </table>

    <div>

      <div class="cont-volunteer-sched">

      </div>





      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>