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

* {
  box-sizing: border-box;
}

  h1.name{
  font-size:4vw;
  font-weight: 900;
  color: #f9b532;
  text-shadow: 2px 2px #50390B;
  padding: 2%;
 }

 h1.sph{
    font-size:3vw;
    color: black;
    font-weight: 500;
 }


 .flex-container{
    padding: 5% 5%; 
    display: flex;
  }

  .item{
    float: left;
    margin: 0% 5%;
  }

  .history{
    float: left;
    font-size: 1.7vw;
    text-align: justify;
    line-height: 40px;
  }

  .flex-container1 {
    padding: 3% 3%; 
    display: flex;
    background-color: #FFDE7E;
    margin: 0%;
  }

  .flex-child{
    flex: 1;
    margin: 0% 15%;
  }

  .flex-child-img{
    float: left;
    width: 20%;
  }

  .flex-child-title{
    float: left;
    font-size:3vw;
    font-weight: 700;
    width: 30%;
    padding: 2%;
  }

  .flex-child-text{
    float: left;
    font-size:1.5vw;
    text-align: justify;
    width: 60%;
  }

  @media only screen and (max-width: 992px) {
    h1.name{
      font-size:5vw;
    }

    h1.sph{
      font-size:4vw;
    }

    p.history{
      font-size:1.5vw;
    }

    .flex-child-title{
      font-size:3vw;
    }
    .flex-child-text{
      font-size:1.3vw;
    }

  }

  @media only screen and (max-width: 768px) {
    h1.name{
      font-size:6vw;
    }

    h1.sph{
      font-size:4.5vw;
    }

    p.history{
      font-size:1.8vw;
      line-height: 30px;
    }

    img.history{
      width:100%;
    }

    .flex-child-title{
      font-size:3vw;
    }
    .flex-child-text{
      font-size:1.5vw;
    }
  }

  @media only screen and (max-width: 600px){

    h1.name{
      font-size:8vw;
    }

    h1.sph{
      font-size:6vw;
    }

  .flex-container{
    padding: 5% 5%; 
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }

  .item{
    margin: 0% 15%;
    width: 80%;
  }

  .history{
    padding: 2%;
    
    margin: 2%;
    text-align: justify;
  }
  p.history{
    font-size:3vw;
  }

  .flex-container1{
    display: flex;
    flex-wrap: wrap;
  }

  .flex-child-img{
    margin: 0% 17%;
    width: 75%;

  }

  .flex-child-title{
    margin: 0% 18%;
    font-size:8vw;
    align-content: center;
    width:100%;
    
  }

  .flex-child-text{
    margin: 0% 6% ;
    width:100%;
    font-size: 3vw;
  }
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


</style>

<body>
<?php require_once('header.php');?>
  <center>
  <h1 class="name">About Us</h1>
  <h1 class="sph">Sweet Pets Haven</p>
  </center>

  <section class = "hidden">
  <div class = "flex-container">
    <div class = "item">
    <img src="img/hist.jpg" class ="history" style = " margin: 0;width:100%;height:auto;">
    </div>

    <div class = "history">
    <p class = "history"> Sweet Pets Haven, a group of animal advocates headed by Ms. Joy Acosta, started in November 2021 with the goal of helping the strays by feeding them. They started to re-home strays and abused cats and dogs as their advocacy grew deeper. Started off with 28 dogs and 8 cats; and currently holding 180 dogs and 53 cats at the shelter in Trece Martirez Cavite. They are bound to transfer to a new shelter in Alfonso, Cavite. </p>
    </div>
  </div>
</section>

<section class = "hidden">
<div class = "flex-container1">
    <div class = "flex-child-img">
    <img src="img/dog.png" style = "width:80%;height:auto;">
    </div>

    <div class = "flex-child-title">
    <p>What We Do.</p>
    </div>

    <div class = "flex-child-text">
    <p class = "text"> Sweet Pets Haven RESCUES, REHABILITATES and REHOMES animals such as stray dogs and cats. We provide temporary homes for rescued animals until they found a new family. We also ensure the health and safety of the animals by feeding them and treating them from viruses. SPH seeks help to rehabilitate and provide the needs of their cats and dogs such as food, medicine, and shelter from volunteers, donations, sponsors, and opening adoptions for the animals. </p>
    </div>
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