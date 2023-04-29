<?php

if (session_id() == "") {
  session_start();
}
if (!isset($_SESSION["user"])) {
  session_destroy();
  echo '<script>alert("You are not logged in!");
    window.location = "Homepage.php";
    </script>';
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
  <title>My Forms</title>
  <link rel="stylesheet" href="style2.css">
</head>

<style>

</style>

<body>
  <?php require_once('header.php'); ?>
  <!-- This is the code for title header -->
  <div class="container">
    <section class="title">
      <h1 class="text-center" style="text-shadow: 1px 1px 4px #000;  font-size: 40px;">
        <strong> Adoption</strong>
      </h1>
      <h1 class="text-center" style="text-shadow: 1px 1px 4px #000;  font-size: 40px; color:#fddc6a">
        <strong> Appointments</strong>
      </h1>
    </section>

    <!-- This is the code for the Adoption Apppointment Schedule -->

    <table>
      <thead>
        <tr>
          <th>Adoption Date</th>
          <th>Pet ID</th>
          <th>Adopter's Name</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <!--TODO: Recurse-->
        <?php
        require __DIR__ . '/vendor/autoload.php';
        include('connection.php');
        $ref_table = "adopt";
        $fetch_data = $database->getReference($ref_table)
          ->orderByChild('user')
          ->equalTo($_SESSION['user'])
          ->getValue();

        if ($fetch_data > 0) {
          foreach ($fetch_data as $key => $row) {


            ?>
            <tr>
              <td>
                <?php echo $row['date'] ?>
              </td>
              <td>
                <?php echo $row['pet_id'] ?>
              </td>
              <td>
                <?php echo $row['legal_name'] ?>
              </td>
              <td>
                <?php echo $row['status'] ?>
              </td>
            </tr>
            <?php
          }
        }
        ?>
      </tbody>
    </table>


    <!-- This is the code for the Volunteer Schedule -->

    <div class="container">
      <section class="title">
        <h1 class="text-center" style="text-shadow: 1px 1px 4px #000;  font-size: 40px;">
          <strong> Volunteer</strong>
        </h1>
        <h1 class="text-center" style="text-shadow: 1px 1px 4px #000;  font-size: 40px; color:#fddc6a">
          <strong> Schedule</strong>
        </h1>
      </section>


      <table>
        <thead>
          <tr>
            <th>Volunteer Date</th>
            <th>Volunteer's Name</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <!--TODO: Recurse-->
          <?php
          require __DIR__ . '/vendor/autoload.php';
          include('connection.php');
          $ref_table = "volunteer";
          $fetch_data = $database->getReference($ref_table)
            ->orderByChild('user')
            ->equalTo($_SESSION['user'])
            ->getValue();

          if ($fetch_data > 0) {
            foreach ($fetch_data as $key => $row) {
              ?>
              <tr>
                <td>
                  <?php echo $row['date'] ?>
                </td>

                <td>
                  <?php echo $row['name']?>
                </td>
                <td>
                  <?php echo $row['status'] ?>
                </td>
              </tr>
              <?php
            }
          }
          ?>

        </tbody>
      </table>

      <div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
          </script>
</body>

</html>