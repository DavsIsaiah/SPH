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
// Include config file
require __DIR__ . '/vendor/autoload.php';
include('connection.php');
// Define the default content to display
$content = 'events';

// If the user has selected a different content, update the $content variable
if (isset($_POST['content'])) {
  $content = $_POST['content'];
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <title>Homepage</title>
  <link rel="stylesheet" href="style.css">
</head>

<style>
  @media (max-width: 576px) {
    .carousel-item img {
      width: auto !important;
      height: 200px;
      max-height: 200px;
    }
  }

  @media (min-width: 576px) and (max-width: 768px) {
    .carousel-item img {
      width: auto !important;
      height: 250px;
      max-height: 250px;
    }
  }

  @media (min-width: 992px) and (max-width: 1199px) {
    .carousel-item img {
      width: auto !important;
      height: 300px;
      max-height: 300px;
    }
  }

  .description {
    background-color: #c7f0ef;
    border-radius: 30px;
  }

  .testibg {
    background-color: #c7f0ef;
  }

  .announcement-img {
    max-height: 400px;
  }
</style>

<body>
  <?php require_once('header.php'); ?>
  <div class="container mt-5">
    <!-- Create a drop-down selection -->
    <div class="container-fluid">
      <div class="row justify-content-start mb-2">
        <div class="col-lg-3">
          <form method="post" action="" class="mb-0">
            <select class="form-select" name="content" id="content" onchange="this.form.submit()">
              <option value="events" <?php if ($content == 'events')
                echo 'selected'; ?>>Events</option>
              <option value="testimonials" <?php if ($content == 'testimonials')
                echo 'selected'; ?>>Testimonials</option>
            </select>
          </form>
        </div>
      </div>
      <div class="row justify-content-start">
        <div class="col-lg-3">
          <?php if ($content == 'events'): ?>
            <a href="add_event.php" class="btn btn-secondary">
              <i class="bi bi-plus-circle-fill"></i> Add Event
            </a>
          <?php elseif ($content == 'testimonials'): ?>
            <a href="add_testimonial.php" class="btn btn-secondary">
              <i class="bi bi-plus-circle-fill"></i> Add Testimonial
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Display the selected content -->
  <?php if ($content == 'events') { ?>
    <div class="container">
      <!-- other event-related code goes here -->
      <?php
      // Get the total number of announcements
      $ref_table = 'event';
      $fetch_data = $database->getReference($ref_table)->getValue();
      // Check if an announcement ID is set
      $events = array();
      if ($fetch_data > 0) {


        if (isset($_GET["id"])) {
          $event_id = $_GET["id"];
          // Make sure announcement ID is within range
        } else {
          $get_data = $database->getReference($ref_table)->orderByChild("event_id")->getValue();
          foreach ($get_data as $key => $row) {
            array_push($events, $row['event_id']);
          }
        }

        // Select the announcement and images from the database
        $events_copy = $events;
        foreach ($fetch_data as $key => $row) {
          $event_id = array_shift($events_copy);
          if (in_array($row['event_id'], $events)) {
            $event_name = $row['name'];
            $event_description = $row['description'];
            $pictures = array();
            // Output the announcement name and description once for announcements with multiple images
            echo "<div class='container'>
                    <div class='row'>
                      <div class='col-12 text-center'>
                        <h2>" . $event_name . "</h2>
                      </div>
                    </div>
                  </div>";
            // Collect all images associated with the announcement
            $ref_table = 'event_pic';
            $pic_data = $database->getReference($ref_table)->getValue();
            if($pic_data > 0){

              foreach ($pic_data as $key2 => $row2) {
                if ($row2['event_id'] == $event_id)
                array_push($pictures, $row2["picture_link"]);
              }
            }
            // Output the images in a single line and centered
            if (count($pictures) > 0) {
              echo "<div class='container mt-3'>
                      <div class='row'>
                        <div class='offset-lg-3 col-lg-6 text-center'>";
              if (count($pictures) == 1) {
                echo "<img src='" . $pictures[0] . "' class='img-fluid mx-auto mb-3 announcement-img' alt='Event Image'>";
              } else {
                echo "<div id='carouselExampleControls-$event_id' class='carousel slide col-12' data-bs-ride='carousel'>
                        <div class='carousel-inner m-0'>";
                $active = true;
                foreach ($pictures as $picture) {
                  if ($active) {
                    echo "<div class='carousel-item active'>
                            <div class='d-flex justify-content-center'>
                              <img src='" . $picture . "' class='mx-auto announcement-img' alt='Event Image'>
                            </div>
                          </div>";
                    $active = false;
                  } else {
                    echo "<div class='carousel-item'>
                            <div class='d-flex justify-content-center'>
                              <img src='" . $picture . "' class='mx-auto announcement-img' alt='Event Image'>
                            </div>
                          </div>";
                  }
                }
                echo "</div>
                      <button class='carousel-control-prev m-0' type='button' data-bs-target='#carouselExampleControls-$event_id' data-bs-slide='prev'>
                        <span class='carousel-control-prev-icon bg-dark rounded-circle' aria-hidden='true'></span>
                        <span class='visually-hidden'>Previous</span>
                      </button>
                      <button class='carousel-control-next m-0' type='button' data-bs-target='#carouselExampleControls-$event_id' data-bs-slide='next'>
                        <span class='carousel-control-next-icon bg-dark rounded-circle' aria-hidden='true'></span>
                        <span class='visually-hidden'>Next</span>
                      </button>
                    </div>";
              }
              echo "</div>
                  </div>
                </div>";
            }

            echo "<div class='container my-4'>
              <div class='row'>
                <div class='col-lg-10 text-center description'>
                  <p class='m-0 p-4'>" . $event_description . "</p>
                </div>
                <div class='col-lg-2 d-flex justify-content-center align-items-center'>
                  <a href='edit_event.php?id=$event_id' class='btn btn-secondary me-3 mt-2 mt-lg-0'>
                    <i class='bi bi-pencil-square' aria-hidden='true'></i> Edit
                  </a>
                  <a href='delete_event.php?id=$event_id' class='btn btn-danger mt-2 mt-lg-0 delete' >
                    <i class='bi bi-trash' aria-hidden='true'></i> Delete
                  </a>
                </div>
              </div>
            </div>";
          }
        }
      }
  }
  ?>
  </div>

  <?php if ($content == 'testimonials') { ?>
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h2>Testimonials</h2>
        </div>
      </div>
    </div>
    <?php
    // Retrieve testimonials data from database
    $ref_table = 'testimonials';
    $fetch_data = $database->getReference($ref_table)->getValue();
    if ($fetch_data > 0) {
      // Display testimonials data using Bootstrap 5.3
      foreach ($fetch_data as $key => $row) {
        $testi_id = $row['testi_id'];
        $testi_name = $row['testi_name'];
        $testi_description = $row['testi_description'];
        $testi_author = $row['testi_author'];
        $date_posted = date("M d, Y", strtotime($row['date_posted']));
        // Retrieve images for the testimonial, if any
        $ref_table = 'testimonial_pic';
        $pictures = array();
        $pic_data = $database->getReference($ref_table)->getValue();
        if ($pic_data > 0) {
          foreach ($pic_data as $key2 => $row2) {
            if ($row2['testi_id'] == $testi_id)
              array_push($pictures, $row2["picture_link"]);
          }
        }

        // Display testimonial with images, if any
        echo "<div class='container my-4'>
              <div class='row'>
                <div class='col-12'>
                  <div class='card testibg shadow mb-3'>
                    <div class='card-body px-5 py-4'>
                      <div class='d-flex justify-content-between align-items-center mb-3'>
                        <h5 class='card-title'>$testi_name</h5>
                        <div class='d-flex justify-content-end'>
                          <a href='edit_testimonial.php?id=$testi_id' class='btn btn-secondary me-3'>
                            <i class='bi bi-pencil-square' aria-hidden='true'></i>
                            <div class='d-block d-none d-md-inline'> Edit </div>
                          </a>
                          <a href='delete_testimonial.php?id=$testi_id' class='btn btn-danger me-3 delete'>
                            <i class='bi bi-trash' aria-hidden='true'></i>
                            <div class='d-block d-none d-md-inline'> Delete </div>
                          </a>
                        </div>
                      </div>
                      <h6 class='card-subtitle mb-2 text-muted'>$testi_author - $date_posted</h6>
                      <p class='card-text'>$testi_description</p>";

        if (count($pictures) > 0) {
          echo "<div class='container mt-3'>
                                <div class='row'>
                                  <div class='offset-lg-2 col-lg-8 text-center'>";
          if (count($pictures) == 1) {
            echo "<img src='" . $pictures[0] . "' class='img-fluid mx-auto mb-3 announcement-img' alt='Testimonial Image'>";
          } else {
            echo "<div id='carouselExampleControls-" . $testi_id . "' class='carousel slide col-12 mb-3' data-bs-ride='carousel'>
                                        <div class='carousel-inner'>";
            $active = true;
            foreach ($pictures as $picture) {
              if ($active) {
                echo "<div class='carousel-item active'>
                                            <div class='d-flex justify-content-center'>
                                              <img src='" . $picture . "' class='mx-auto announcement-img' alt='Testimonial Image'>
                                            </div>
                                          </div>";
                $active = false;
              } else {
                echo "<div class='carousel-item'>
                                            <div class='d-flex justify-content-center'>
                                              <img src='" . $picture . "' class='mx-auto announcement-img' alt='Testimonial Image'>
                                            </div>
                                          </div>";
              }
            }
            echo "</div>
                                      <button class='carousel-control-prev m-0' type='button' data-bs-target='#carouselExampleControls-" . $testi_id . "' data-bs-slide='prev'>
                                        <span class='carousel-control-prev-icon bg-dark rounded-circle' aria-hidden='true'></span>
                                        <span class='visually-hidden'>Previous</span>
                                      </button>
                                      <button class='carousel-control-next m-0' type='button' data-bs-target='#carouselExampleControls-" . $testi_id . "' data-bs-slide='next'>
                                        <span class='carousel-control-next-icon bg-dark rounded-circle' aria-hidden='true'></span>
                                        <span class='visually-hidden'>Next</span>
                                      </button>
                                    </div>";
          }
        }
        echo "</div>
                              </div>
                            </div>";
        echo "</div>
                        </div>
                      </div>
                    </div>
                  </div>";
      }
    } else {
      echo "No testimonials found.";
    }
    ?>
    </div>
  <?php } ?>

  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">

    </script>
  <script>
    $('.delete').click(function () { return confirm("are you sure?"); });
  </script>
</body>

</html>