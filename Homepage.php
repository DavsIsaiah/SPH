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
  <title>Homepage | Sweet Pets Haven</title>
  <link rel="stylesheet" href="style.css">

</head>

<style>
.container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  width: 70%;
  padding: 10 10 10 10;
}

body{
  font-size: 1.1em;
  overflow-x: hidden;
}

.header {
  width: 100%;
  margin-left: -10px;
  transform: scale(1.02);
}

.header-m{
    display:none;
  }
.sub-text{
  text-align: center;
}
.pop-text{
  text-shadow: 2px 2px #50390B;
  font-weight: 900; color: #f9b532;
  font-size: 3.5em;
  padding: 10 10 10 10;
  text-align: center;
}

.yellow-container{
  background-color: #FFDE7E;
  padding: 20px;
  width: 500px;
  border-radius: 50px;
  box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
  margin: auto;
  margin-top: 50px;
  margin-bottom: 50px;
 }

 .title{
  text-align: center;
  color: #9B4C0E;
 }

 .text{
  margin-top: 20px;
  color: black;
  font-weight: 400;
  text-align: justify;
 }

/* styles for mobile view */
@media screen and (max-width: 768px) {
  .pop-text{
    text-shadow: 2px 2px #50390B;
    font-weight: 900; color: #f9b532;
    font-size: 2em;
  }
  body{
    font-size: 1em;
  }
  .container {
    width: 80%;
  }
  .yellow-container{
    width: 300px;
  }
  .header-m{
    display:block;
    width: 105%;
    margin-left: -10px;
    transform: scale(1.02);
  }
  .header{
    display:none;
  }
}

</style>

<body>
<?php require_once('header.php');?>
<img src="img/header2.png" class="header">
<img src="img/header1.png" class = "header-m">


<h1 class="pop-text">Sweet Pets Haven</h1>
<div class="container">
    <p class="sub-text"> Sweet Pets Haven (SPH) is a foster house and rehab shelter for rescued cats
      and dogs in Cavite. SPH promotes responsible rescuing and rehoming through
      adoption instead of buying, selling, or breeding pets. SPH aims to help the rescue of
      cats and dogs through volunteers, donations, sponsors, and opening adoptions for the
      animals. Assistance is being sought for helping the dogs through willing donors and
      volunteers available to visit the animal shelter. SPH needs more support to prevent
      and fight against the sickness of cats and dogs being surrendered to the shelter or
      those being encountered by volunteers. After treating cats and dogs from viruses such
      as distemper or parvo, new owners are sought for them.</p>
</div>

<section class = "hidden">
    <div class = "yellow-container">
      <h2 class ="title"> Vision and Mission</h2>
      <p class = "text"> To rescue, rehabilitate and rehome animals in crisis, ensure healthy pets through education, advocacy and inspire a community where the animal-human bond is celebrated and nurtured.</p>
    </div>
</section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    <script>
      const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry)=>{
        console.log(entry)
        if(entry.isIntersecting){
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