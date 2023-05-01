<?php
if (session_id() == "") {
  session_start();
}
if (!isset($_SESSION['admin'])) {
  session_destroy();
  echo "<script>
    alert('You are not allowed here.');
    window.location = 'Homepage.php';
    </script>";
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Our Animals</title>
  <link rel="stylesheet" href="style3.css">
  <link rel="stylesheet" href="animal-style.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php require_once('header.php'); ?>
  <br><br>

  <center>
    <h1 class="align-items-center; " style = "text-shadow: 2px 2px #50390B; font-size:4vw; font-weight: 900; color: #f0bdfc;"><b>Pets for Adoption</b></h1>
   
    <p style = "margin: 0% 15%; line-height: 30px;">At Sweet Pets Haven, we have a variety of lovable pets waiting for their forever homes. Our animals come in all shapes and sizes, from playful kittens and puppies to senior dogs and cats in need of a cozy retirement home. </br></br>

    We pride ourselves on ensuring that all of our animals are healthy, happy, and ready to join a loving family. 
    Our adoption process involves an initial meeting with the pet to ensure that it's the right fit for your lifestyle and household. 
    We also provide guidance on how to properly care for your new pet, as well as ongoing support after adoption. </p>
  </center>

  <br><br>


  <h1>&ensp; Dogs</h1>
  <a href="Add_Dog.php">
    <button><i class="fa fa-plus"></i> Add Dog </button>
  </a>
  <br>
  <br>
  <div class="shadow-sm border rounded p-4">
    <div class="dog-slider-container mt-3">
      <div class="dog-slider-wrapper">
        <div class="dog-slider">
          <?php
          // Include config file
          require __DIR__ . '/vendor/autoload.php';
          include('connection.php');

          $ref_table = 'dog_images';
          $fetch_data = $database->getReference($ref_table)->getValue();
          if ($fetch_data > 0) {

            foreach ($fetch_data as $key => $row) {
              echo '<link rel="stylesheet" href="slider.css">';
              echo '<div class="dog-slider-item">';
              echo '<div class="slider-hover">';
              echo '<a href="edit_pet.php?imageSrc=' . urlencode($row['url']) . "&petID=" . $row['pet_id'] . '&cat=false">';
              echo '<img src="' . $row['url'] . '">';
              echo '<div class="hover-overlay">';
              echo '<h3>Edit Pet</h3>';
              echo '</div></a></div>';
              echo '<center>';
              echo '<h3><br><mark class="name-tag">' . $row['name'] . '</mark></h3>';
              echo '</center>';
              echo '</div>';
            }
          }
          ?>
        </div>
      </div>
      <button class="dog-slider-button dog-slider-button-left" onclick="SlideLeft()">&#8249;</button>
      <button class="dog-slider-button dog-slider-button-right" onclick="SlideRight()">&#8250;</button>
    </div>
  </div>

  <script>
    const dogSliderWrapper = document.querySelector('.dog-slider-wrapper');
    const dogSliderItems = document.querySelectorAll('.dog-slider > div');
    const dogSliderButtonLeft = document.querySelector('.dog-slider-button-left');
    const dogSliderButtonRight = document.querySelector('.dog-slider-button-right');
    const dogSlideWidth = dogSliderItems[0].offsetWidth + 20; // Width of a slide + margin
    const dogTotalPages = dogSliderItems.length;
    // const dogSlidesPerPage = 5; // Number of slides per row
    let dogCurrentPage = 1;
    // let dogTotalPages = Math.ceil(dogSliderItems.length / dogSlidesPerPage);
    // Function to slide to the left
    function SlideLeft() {
      if (dogCurrentPage === 1) {
        dogCurrentPage = dogTotalPages;
      } else {
        dogCurrentPage--;
      }
      dogupdateSliderPosition();
    }
    // Function to slide to the right
    function SlideRight() {
      if (dogCurrentPage === dogTotalPages) {
        dogCurrentPage = 1;
      } else {
        dogCurrentPage++;
      }
      dogupdateSliderPosition();
    }

    // Function to update the slider position
    function dogupdateSliderPosition() {
      const newPosition = -1 * (dogCurrentPage - 1) * dogSlideWidth;
      dogSliderWrapper.style.transform = `translateX(${newPosition}px)`;
    }

    // event listeners for the left and right buttons
    dogSliderButtonLeft.addEventListener('click', SlideLeft);
    dogSliderButtonRight.addEventListener('click', SlideRight);

    // Initialize slider position
    dogupdateSliderPosition();
  </script>


  <br><br>

  <h1>&ensp; Cats</h1>
  <a href="Add_Cat.php">
    <button><i class="fa fa-plus"></i> Add Cat </button>
  </a>
  <br>
  <br>
  <div class="shadow-sm border rounded p-4">
    <div class="cat-slider-container mt-3">
      <div class="cat-slider-wrapper">
        <div class="cat-slider">
          <?php
          $ref_table = 'cat_images';
          $fetch_data = $database->getReference($ref_table)->getValue();
          if ($fetch_data > 0) {
            foreach ($fetch_data as $key => $row) {
              echo '<link rel="stylesheet" href="slider.css">';
              echo '<div class="cat-slider-item">';
              echo '<div class="slider-hover">';
              echo '<a href="edit_pet.php?imageSrc=' . urlencode($row['url']) . "&petID=" . $row['pet_id'] . '&cat=true">';
              echo '<img src="' . $row['url'] . '" alt="' . '">';
              echo '<div class="hover-overlay">';
              echo '<h3>Edit Pet</h3>';
              echo '</div></a></div>';
              echo '<center>';
              echo '<h3><br><mark class="name-tag">' . $row['name'] . '</mark></h3>';
              echo '</center>';
              echo '</div>';
            }
          }
          ?>
        </div>
      </div>
      <button class="cat-slider-button cat-slider-button-left" onclick="dwnSlideLeft()">&#8249;</button>
      <button class="cat-slider-button cat-slider-button-right" onclick="dwnSlideRight()">&#8250;</button>
    </div>
  </div>

  <script>
    const catSliderWrapper = document.querySelector('.cat-slider-wrapper');
    const catSliderItems = document.querySelectorAll('.cat-slider > div');
    const catSliderButtonLeft = document.querySelector('.cat-slider-button-left');
    const catSliderButtonRight = document.querySelector('.cat-slider-button-right');
    const catSlideWidth = catSliderItems[0].offsetWidth + 20; // Width of a slide + margin
    const catTotalPages = catSliderItems.length;
    // const catSlidesPerPage = 5; // Number of slides per row

    let catCurrentPage = 1;
    // let catTotalPages = Math.ceil(catSliderItems.length / catSlidesPerPage);

    // Function to slide to the left
    function dwnSlideLeft() {
      if (catCurrentPage === 1) {
        catCurrentPage = catTotalPages;
      } else {
        catCurrentPage--;
      }
      catupdateSliderPosition();
    }

    // Function to slide to the right
    function dwnSlideRight() {
      if (catCurrentPage === catTotalPages) {
        catCurrentPage = 1;
      } else {
        catCurrentPage++;
      }
      catupdateSliderPosition();
    }

    // Function to update the slider position
    function catupdateSliderPosition() {
      const newPosition = -1 * (catCurrentPage - 1) * catSlideWidth;
      catSliderWrapper.style.transform = `translateX(${newPosition}px)`;
    }

    // event listeners for the left and right buttons
    catSliderButtonLeft.addEventListener('click', dwnSlideLeft);
    catSliderButtonRight.addEventListener('click', dwnSlideRight);

    // Initialize slider position
    catupdateSliderPosition();
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>