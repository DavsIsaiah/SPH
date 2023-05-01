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
  <title>Donate | Sweet Pets Haven</title>
  <link rel="stylesheet" href="style.css">
</head>

<style>

    /* Set the container to be a flexbox */
    .container {
      margin-top: 40px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      width: 80%;
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
        margin-bottom: 30px;
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
        width: 70%;
        padding: 5 5 5 5;
      }
    }
    
    .right-container {
      width: 100%;
    }
    
    @media only screen and (min-width: 768px) {
      .right-container {
        width: 30%;
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
    width: 25%;
  }
}

.center-column {
  width: 100%;
}

@media only screen and (min-width: 768px) {
  .center-column {
    width: 25%;
  }
}

.right-column {
  width: 100%;
}

@media only screen and (min-width: 768px) {
  .right-column {
    width: 25%;
  }
}
.half-round{
  background-color: #f0bdfc;
  border-radius: 50px 50px 0px 0px;
  margin-bottom: -50px;
  padding: 20 20 20 20;
}

#scrollBtn {
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 9999;
  background-color:  #c499cf;
  color: white;
  padding: 15px 20px;
  border: none;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
}

/* styles for mobile view */
@media screen and (max-width: 768px) {
  #scrollBtn {
    display: none;
  }
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

</style>

<body>
<?php require_once('header.php');?>

<button id="scrollBtn">Scroll down</button>

<section class="hidden">
  <div class="hidden">
    <div class="container">

      <div class="left-container extra-margin">
        <h3>Help us. Help more animals.</h3>
        <h1 class="pop-text"><b>DONATE to SPH Sweet Pets Haven.</b></h1> <br><br>
        <p><b>GCASH</b></p>
        <p>Account Number: 09171741075</p>
        <p>Account Name: Joy A.</p>
        <br>
        <p><b>Paypal</b></p>
        <p>Account Email: joyacosta960@gmail.com</p>
        <br>
        <p><b>BDO Savings</b></p>
        <p>Account Number: 012320090696</p>
        <p>Account Name: Joy Acosta</p>
        <br>
      </div>


      <div class="right-container extra-margin">
        <p>Log in to GCash and tap <b>PAY QR</b>.</p>
        <p>Scan Our QR code.</p>
        <p>Input the total amount and tap Next.</p>
        <p>Review all details then tap on Pay.</p>

        <div style="width: 300px; height: 300px; display: flex; justify-content: center; align-items: center;">
          <img src="img/qr.png" alt="GCash QR Code" style="width: 300px; height: 300px; display: flex; justify-content: center; align-items: center;">

        </div>
      </div>
    </div>
  </div>
</section>

<section class="hidden">
  <div class="hidden">
    <div class="container half-round">
    <h2 style="margin: auto 0;"> <b> DONATE IN KIND </b></h2>
    </div>

    <div class="container-2">
      <div class="container">
        <div class="left-column extra-margin">
          <h3 style="text-align: center;"> <b>ANIMAL NEEDS </b> </h3>
          <br>
          <p>• Rice</p>
          <p>• Dog Food</p>
          <p>• Cat Food</p>
          <p>• Medicine</p>
          <p>• Vitamins</p>
          <p>• Saw Dust</p>
          <p>• Vegetables</p>
        </div>
        <div class="center-column extra-margin">
        <h3 style="text-align: center;"> <b>SHELTER NEEDS </b> </h3>
        <br>
          <p>• Dog cage</p>
          <p>• Cat cage</p>
          <p>• Steel matting Needs</p>
          <p>• Plywood Needs</p>
          <p>• Yero Needs</p>
          <p>• Elevated matting</p>
          <p>• Dishwashing liquid</p>
          <p>• Chlorine/bleach</p>
          <p>• Detergent powder</p>
          <p>• hollow blocks</p>
          <p>• Cement</p>
          <p>• Buhangin</p>

        </div>
        <div class="right-column extra-margin" style="display: flex; justify-content: center; align-items: center;">
          <img src="img/donate.jpg" alt="" class="dog-img" style="width: 300px">
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


<script>
 const scrollBtn = document.getElementById("scrollBtn");

scrollBtn.addEventListener("click", function () {
  if (scrollBtn.innerHTML === "Scroll down") {
    window.scrollBy({
      top: window.innerHeight,
      behavior: "smooth"
    });
  } else {
    window.scroll({
      top: 0,
      behavior: "smooth"
    });
  }
});

window.addEventListener("scroll", function () {
  if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
    scrollBtn.innerHTML = "Scroll up";
  } else {
    scrollBtn.innerHTML = "Scroll down";
  }
});


function scrollDown() {
  window.scrollBy({
    top: window.innerHeight,
    behavior: "smooth"
  });
}
</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>