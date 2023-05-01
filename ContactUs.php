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
  <title>Contact Us | Sweet Pets Haven</title>
  <link rel="stylesheet" href="style.css">
</head>

<style>
  * {
    box-sizing: border-box;
  }

  h1.name {
    font-size: 4vw;
    font-weight: 900;
    color: #c499cf;
    text-shadow: 2px 2px #50390B;
    padding: 2%;
  }

  h3.text {
    font-size: 2vw;
    color: black;
    font-weight: 500;
  }

  .container {
    padding: 0% 10%;
    color: black;
    font-size: 1.2vw;
  }

  .person,
  .email,
  .contact {
    justify-content: center;
  }

  .person {
    margin-top: 6%;
  }

  .contact {
    margin-bottom: 10%;
  }

  .facebook {
    margin-top: 6%;
  }

  p.location {
    font-size: 2vw;
    font-weight: 600;
    color: black;
  }

  @media only screen and (max-width: 992px) {
    h1.name {
      font-size: 5vw;
    }

    p.location {
      font-size: 3vw;
    }

    iframe.location {
      width: 70%;
      height: 50%;
    }
  }

  @media only screen and (max-width: 768px) {
    h1.name {
      font-size: 6vw;
    }

    p.location {
      font-size: 3vw;
    }

    iframe.location {
      width: 70%;
      height: 50%;
    }

    @media only screen and (max-width: 600px) {
      h1.name {
        font-size: 8vw;
      }

      h3.text {
        font-size: 4vw;
        color: black;
        font-weight: 500;
      }

      .container {
        padding: 3% 10%;
        font-size: 3vw;
      }

      p.location {
        font-size: 4vw;
      }

    }

    .hidden {
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
  }
</style>

<body>
  <?php require_once('header.php'); ?>

  <center>
    <h1 class="name">Contact Us</h1>
  </center>

  <section class="hidden">
    <div class="container">

      <h3 class="text"> For inquiries, contact us at:</h3>

      <div class="person">
        <img src="img/woman.png" alt="logo" width="50" height="50" style="float:left;" />
        <p> <b> Contact Person: </b> Joy Acosta
        <p><br>
      </div>

      <div class="email">
        <img src="img/email.png" alt="logo" width="50" height="50" style="float:left;" />
        <p> <b> Email: </b> joyacosta960@gmail.com
        <p><br>
      </div>

      <div class="contact">
        <img src="img/phone.png" alt="logo" width="50" height="50" style="float:left;" />
        <p> <b> Mobile Number: </b> 0917 174 1075
        <p>
      </div>
      <br>
      <h3 class="text"> Visit our Facebook Account</h3>

      <div class="facebook">
        <a href="https://www.facebook.com/sweetpetshavenph"><img src="img/facebook.png" alt="logo" width="50" height="50"
            style="float:left;" /></a>
        <a href="https://www.facebook.com/sweetpetshavenph"><img src="img/search.png" alt="SPH Facebook" width="220"
            height="50""></a>
    </div>
  </div>
</section>
    <br>

    <hr> 

    <center>
    <section class = " hidden">
          <div class="location">
            <img src="map.png" alt="logo" width="50" height="50" style="margin-bottom: 3%;" />
            <p class="location"> <b> View our location at </b>
            <p>

              <iframe class="location"
                src="https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d1933.0534414316694!2d120.84759213707358!3d14.305222064744886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e6!4m3!3m2!1d14.3054296!2d120.84887669999999!4m3!3m2!1d14.3054274!2d120.84887959999999!5e0!3m2!1sen!2sph!4v1681897996898!5m2!1sen!2sph"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          </center>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <script>
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        console.log(entry)
        if (entry.isIntersecting) {
          entry.target.classList.add('show');
        } else {
          entry.target.classList.remove('show');
        }
      });
    });

    const hiddenElements = document.querySelectorAll('.hidden');
    hiddenElements.forEach((el) => observer.observe(el));
  </script>
</body>

</html>