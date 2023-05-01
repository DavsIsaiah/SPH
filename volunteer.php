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
  <title>Volunteer | Sweet Pets Haven</title>
  <link rel="stylesheet" href="style.css">

<style>

    /* Set the container to be a flexbox */
    .container {
      margin-bottom: 50px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      width: 70%;
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
    body {
      font-size: 1.1em;
      position: relative;
    }

    .jumbo {
      padding-top: 40;
      padding-bottom: 20;
      text-align: center;
    }



    /* Set the width of the containers based on the device */
    .left-container {
      width: 100%;
    }
    
    @media only screen and (min-width: 768px) {
      .left-container {
        width: 70%;
      }
    }
    
    .right-container {
      width: 100%;
    }
    
    @media only screen and (min-width: 768px) {
      .right-container {
        width: 30%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
      }
    }

    /* Set the width of the containers based on the device */
        .left-container2 {
      width: 100%;
    }
    
    @media only screen and (min-width: 768px) {
      .left-container2 {
        width: 40%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
      }
    }
    
    .right-container2 {
      width: 100%;
    }
    
    @media only screen and (min-width: 768px) {
      .right-container2 {
        width: 50%;
      }
    }

    
    /* Set the width of the containers based on the device */
    .left-container3 {
      width: 100%;
    }
    
    @media only screen and (min-width: 768px) {
      .left-container3 {
        width: 60%;
      }
    }
    
    .right-container3 {
      width: 100%;
    }
    
    @media only screen and (min-width: 768px) {
      .right-container3 {
        width: 40%;
      }
    }

    /* three columns */
    .dog-img{
      width:200px;
      border-radius: 30px;
      text-align: center;
    }

    .container-2{
      background-color: gray;
      margin-top: 40px;
      display: flex;
      flex-wrap: wrap;
      margin-bottom: 30%;
      padding-bottom: 40px;
    }


    footer {
      background-color: #f0bdfc;
      padding: 20px;
      padding-top: 30;
      text-align: center;
      font-size: 16px;
      color: #333;
      width: 100%;
    }

    .foot-container {
      max-width: 960px;
      margin: 0 auto;
      margin-top: 10px; /* add margin-top to push container down */
    }

    .right-container3.extra-margin {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }


  .title{
    text-shadow: 2px 2px #50390B;
    font-weight: 900;
    color: #f0bdfc;
    font-size: 3em;
  }
  @media screen and (max-width: 768px) {
    .title{
      font-size: 2.2em;
    }
  }
</style>
</head>

<body>
<?php require_once('header.php');?>
  

  <div class="jumbo">
    <h3>Let us help those who can't help themselves.</h3>
    <h1 class="title"><b>JOIN OUR GROWING VOLUNTEER PROGRAM</b></h1>  
  </div>


<section class="hidden">
  <div class="hidden">
    <div class="container">
      <p style="text-align: center;">Are you an animal lover looking for a meaningful way to give back to your community? <br>
      Do you want to experience being a volunteer in an animal shelter and to experience taking care of rescued cats & dogs in just a short period of time? <br><br>
      Consider volunteering at our local animal shelter, <b>Sweet Pets Haven!</b> </p><br><br><br>
      <hr>
      <div class="left-container extra-margin">
      <h3 style = "color: #f0bdfc;"> <b><br><br>🐱 Help Us So That We Can Help Them 🐶 </b> </h3>
      <h4> Some of the tasks you may be involved in include: </h4> 
      <br>
        <p>• Walking dogs and providing them with exercise and attention</p>
        <p>• Playing with cats and providing them with love and affection</p>
        <p>• Cleaning cages and enclosures to ensure a safe and healthy environment for our animals</p> 
        <p>• Assisting with feeding and watering our animals</p> 
        <p>• Helping with adoption process and promoting our animals to potential adopters</p> 
        <p>• Providing general support to our staff and other volunteers</p> 
      </div>


      <div class="right-container extra-margin">
        <div style="width: 90%; height: auto; display: flex; justify-content: center; align-items: center;">
        <img src="img/volunteer1.jpg" alt="GCash QR code" style = " margin: 0;width:100%;height:auto;" >
        

        </div>
      </div>

    </div>
  </div>
</section>

<section class="hidden">
  <div class="hidden">
    <div class="container">
      
      <div class="left-container2 extra-margin">
        <div style="width: 90%; height: auto;  display: flex; justify-content: center; align-items: center;">
          <img src="img/volunteer2.jpg" alt="Volunteer" style = " margin: 0;width:100%;height:auto;">

        </div>
      </div>


      <div class="right-container2 extra-margin">
        <h3 style = "color: #f0bdfc;"> <b>Join our paw-some team and make a furry difference! 🐾</b> </h3>
        <br>
        <p style = "text-align: justify;" >No prior experience is necessary - we will provide you with all the training and support you need to succeed in your role. All we ask is that you are reliable, committed, and passionate about animal welfare.</p>
        <p style = "text-align: justify;">Volunteering at our animal shelter is not only a rewarding way to help animals in need, but it's also a great way to meet like-minded people and make new friends. Plus, you'll get plenty of snuggles and kisses from our furry friends!</p>
      </div>

    </div>
  </div>
</section>


<section class="hidden">
  <div class="hidden">
    <div class="container">
      
      <div class="left-container3 extra-margin">
      <h3 style = "color: #f0bdfc;"> <b>How to become a Volunteer </b> </h3>
        <br>

        <h3>❶ APPLY ONLINE</h3>
        <h3>❷ ATTEND A VOLUNTEER ORIENTATION</h3>
        <h3>❸ BEGIN VOLUNTEERING</h3> 
        <a href="volunteer-apply.php"><button> Apply Now! </button></a>
      </div>


      <div class="right-container3 extra-margin">
        <div style="width: 90%; height: auto; display: flex; justify-content: center; align-items: center;">
            <img src="img/volunteer3.jpg" alt="Volunteer" style = " margin: 0;width:100%;height:auto;">

          </div>
      </div>
      
      <p style = "text-align: center;"><br><br><br>If you're interested in volunteering, please visit our website or stop by the shelter to fill out an application. We can't wait to have you on our team!</p>
  </div>
  </div>
</section>

<footer>
  <div class="foot-container">
    <p><b>For more information about volunteering, contact us at</b></p>
    <p>joyacosta@gmail.com</p>
  </div>
</footer>


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