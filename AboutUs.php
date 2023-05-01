<?php
if (session_id() == "") {
  session_start();
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
  <title>About Us | Sweet Pets Haven</title>
  <link rel="stylesheet" href="style.css">
</head>

<style>

     /* Set the container to be a flexbox */
     .container {
      margin-top: 40px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      width:65%;
    }

    .hidden{
      opacity: 0;
      transform: translateY(20vh);
      visibility: hidden;
      transition: opacity 0.6s ease-out, transform 1.2s ease-out;
      will-change: opacity, visibility;
    }
    .show {
      opacity: 1;
      transform: none;
      visibility: visible;
    }
    
      /* Add extra margin when device is set to mobile */
    @media (max-width: 768px) {
        .extra-margin {
        margin-bottom: 40px;
      }
    }
    body{
      font-size: 1.1em;
    }
    /* Set the width of the containers based on the device */
    .left-container {
      width: 100%;
      
    }
    
    @media only screen and (min-width: 768px) {
      .left-container {
        width: 60%;
        padding: 5 5 5 5;
      }
    }
    
    .right-container {
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    
    @media only screen and (min-width: 768px) {
      .right-container {
        width: 40%;
        padding: 5 5 5 5;
      }
    }
    /* three columns */
    .dog-img{
      width:200px;
      border-radius: 30px;
      text-align: center;
    }

    .container-2{
      background-color: #f0bdfc;
      margin-top: 40px;
      display: flex;
      flex-wrap: wrap;
      margin-bottom: 30px;
      padding: 10 10 10 10;
    }

/* Set the width of the columns based on the device */
.left-column {
  width: 100%;
}

@media only screen and (min-width: 768px) {
  .left-column {
    width: 15%;
    padding: 10 10 10 10;
  }
}

.center-column {
  width: 100%;
}

@media only screen and (min-width: 768px) {
  .center-column {
    width: 15%;
    padding: 10 10 10 10;
  }
}

.right-column {
  width: 100%;
}

@media only screen and (min-width: 768px) {
  .right-column {
    width: 70%;
    padding: 10 10 10 10;
  }
}
.half-round{
  background-color: #fddc6a;
  border-radius: 50px 50px 0px 0px;
  margin-bottom: -50px;
  padding: 30 30 30 30;
}


.pop-text{
  text-shadow: 2px 2px #50390B;
  font-weight: 900; color: #f0bdfc;
  font-size: 3em;
}

/* styles for mobile view */
@media screen and (max-width: 768px) {
    .pop-text{
    text-shadow: 2px 2px #50390B;
    font-weight: 900; color: #f0bdfc;
    font-size: 2em;
  }
}
.center{
  text-align: center;
  margin-top: 50px;
  margin-bottom: 50px;
}
.history{
  margin: auto;
  width:300px;
  height:auto;
}

</style>

<body>
<?php require_once('header.php');?>

<section class="hidden">
  <div class="hidden">
  <div class="center">
    <h1 class="pop-text"><b>About us</b></h1>
    <h2>Sweet Pets Haven</h2>
  </div>
    <div class="container">

      <div class="left-container extra-margin">

  
        <p style="text-align: justify;">Sweet Pets Haven, a group of animal advocates headed by Ms. Joy Acosta, started in November 2021 with the goal of helping the strays by feeding them.
          They started to re-home strays and abused cats and dogs as their advocacy grew deeper.
          Started off with 28 dogs and 8 cats; and currently holding 180 dogs and 53 cats at the shelter in Trece Martirez Cavite.
          They are bound to transfer to a new shelter in Alfonso, Cavite.</p>
      </div>


      <div class="right-container extra-margin">
      <img src="img/hist.jpg" class ="history">
      </div>
    </div>
  </div>
</section>

<section class="hidden">
  <div class="hidden">
    <div class="container-2">
      <div class="container">
        <div class="left-column extra-margin">
        <img src="img/dog.png" style = "width:80%;height:auto;">
        </div>
        <div class="center-column extra-margin">
          <br>
        <h3 style="text-align: center;"> <b>What We Do. </b> </h3>

        </div>
        <div class="right-column extra-margin" style="display: flex; justify-content: center; align-items: center;">
        <p class = "text"> Sweet Pets Haven RESCUES, REHABILITATES and REHOMES animals such as stray dogs and cats.
          We provide temporary homes for rescued animals until they found a new family.
          We also ensure the health and safety of the animals by feeding them and treating them from viruses.
          SPH seeks help to rehabilitate and provide the needs of their cats and dogs such as food,
          medicine, and shelter from volunteers, donations, sponsors, and opening adoptions for the animals. </p>

      
        </div> 
      </div>
    </div>
  </div>
</section>


  <script>
      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          console.log(entry)
          if (entry.isIntersecting) {
            entry.target.classList.add('show');
            observer.unobserve(entry.target); // Stop observing the element
          } else {
            entry.target.classList.remove('show');
          }
        });
      });

      const hiddenElements = document.querySelectorAll('.hidden');
      hiddenElements.forEach((el) => observer.observe(el));

  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>