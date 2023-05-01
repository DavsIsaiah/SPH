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
  <title>Adoption Appointments</title>
  <link rel="stylesheet" href="style2.css">
  <link rel="stylesheet" href="style.css">
</head>

<style>
th {
  background-color: #f0bdfc;
  color: black;
  height: 61px;
}
tbody {
  background-color: #c499cf;
  color: black;
}
</style>

<body>
  <?php require_once('header.php'); ?>


  <!-- This is the code for title header -->
  <div class="container">
    <section class="title">
      <h1 class="text-center" style="text-shadow: 1px 1px 4px #000;  font-size: 40px;">
        <strong> Adoption</strong>
      </h1>
      <h1 class="text-center" style="text-shadow: 1px 1px 4px #000;  font-size: 40px; color:#f0bdfc">
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
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require __DIR__ . '/vendor/autoload.php';
        include('connection.php');
        $ref_table = "adopt";
        $fetch_data = $database->getReference($ref_table)
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
              <td><a href="manage-adoption-form.php?key=<?php echo $key; ?>"><button>View</button></a></td>
            </tr>
            <?php
          }
        }
        ?>

      </tbody>
    </table>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
      </script>
</body>

</html>