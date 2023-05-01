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
$content = 'testimonials';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require __DIR__ . '/vendor/autoload.php';
  include('connection.php');
  if(isset($_POST['content']))
  $content = $_POST['content'];
  if ($content == 'events') {
    echo "<script>window.location.href='add_event.php';</script>";
    exit();
  }
  $ref_table = "testimonials";
  $name = $_POST['title'];
  $description = $_POST['description'];
  $author = $_POST['author'];

  $fetch_data = $database->getReference($ref_table)->orderByChild('testi_id')->limitToLast(1)->getValue();
  if ($fetch_data > 0) {
    foreach ($fetch_data as $key => $row) {
      $testi_id = $row['testi_id'] + 1;
    }
  } else {
    $testi_id = 1;
  }
  $postData = [
    'testi_description' => $description,
    'testi_name' => $name,
    'testi_author' => $author,
    'date_posted' => date('Y-m-d'),
    'testi_id' => $testi_id
  ];

  $database->getReference($ref_table)->push($postData);

  if (isset($_FILES['files'])) {
    $fileNames = array_filter($_FILES['files']['name']);
    if (!empty($fileNames)) {
      foreach ($_FILES['files']['name'] as $key => $val) {
        $name = time() . $_FILES['files']['name'][$key];
        $bucket->upload(
          file_get_contents($_FILES['files']['tmp_name'][$key]),
          [
            'name' => $name
          ]
        );
        $url = "https://firebasestorage.googleapis.com/v0/b/safepetshaven.appspot.com/o/" . $name . "?alt=media";
        $postData = [
          'testi_id' => (int) $testi_id,
          'picture_link' => $url
        ]; //this is the schema
        $database->getReference("testimonial_pic")->push($postData);
      }
    }
  }
  echo "<script>window.location = 'Announcements_admin.php';</script>";
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
  <title>Add Testimonial</title>
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
    background-color: #fddc6a;
    border-radius: 30px;
  }

  .testibg {
    background-color: #ffeba1;
  }

  .announcement-img {
    max-height: 400px;
  }
</style>

<body>
  <?php require_once('header.php'); ?>

  <div class="container mt-5">
    <div class='col-12 text-center'>
      <h2 class="mb-5">Create Testimonial</h2>
    </div>
    <div class="container-fluid description p-5">
      <div class="row justify-content-start mb-2">
        <div class="col-lg-3">
          <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
            enctype="multipart/form-data" class="mb-0">
            <select class="form-select" name="content" id="content" onchange="this.form.submit()">
              <option value="events" <?php if ($content == 'events')
                echo 'selected'; ?>>Events</option>
              <option value="testimonials" <?php if ($content == 'testimonials')
                echo 'selected'; ?>>Testimonials</option>
            </select>
          </form>
        </div>
        <div class="container mt-5">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
              <div class="form-container">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label for="title" class="form-label">Testimonial Title</label>
                    <input class="form-control mb-3" type="text" id="title" name="title" value="">
                    <label for="aut" class="form-label">Author</label>
                    <input class="form-control mb-3" type="text" id="aut" name="author" value="">
                    <label for="description" class="form-label">Description</label>
                    <div class="">
                      <textarea class="form-control" name="description" id="description" rows="5"
                        style="resize: none;"></textarea>
                      <div class="mt-3">
                        <label for="formFileMultiple" class="form-label">Upload images</label>
                        <input type="file" class="form-control" id="formFileMultiple" name="files[]" accept="image/*"
                          multiple>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn-secondary">Create Post</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>