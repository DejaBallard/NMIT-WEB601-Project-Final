
<html>
    <head>
    <title>Home</title>
    <!-- ------------------ CSS ----------------- -->
    <?php require_once('CssView.php') ?>
    </head>
    
    <body>
<!-- --------- Add pop up ----------- -->
    <?php
    require_once("PopUpView.php")
    ?>
<!-- -------------------Navigation ---------------- -->
    <?php
    require_once("NavView.php")
    ?>
<!-- ------------------SlideShow ------------------- -->   
 <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active"> 
      <img class="d-block w-100" src="Images/SlideOne-Dragon.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="Images/SlideTwo-Wolf.jpg" alt="Second slide" style="background-color:lightgreen">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="Images/SlideThree-Eagle.jpg" alt="Third slide" style="background-color:lightblue">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br>
<!-- --------------Local Navigation ---------- -->
<div class="container">
    <div class="row">
        <div align="center" class="col-12" "local-heading" >
        <a class="local-heading">Featured</a>
    </div>
</div>
<br>
<!-- ----------Content ---------- -->
<div class="container">
    <div class="row">
        <!-- Plane -->
            <div align="center" class="col-4" "col-md-3" style="background-color:#EAF2E3" >
            <br>
            <a href="?cmd=plane&step=<?=$this->_PlaneModel->GetCurrentStep()?>">
            <!-- Replace with image -->
            <img src="Images/Plane.jpg" class="img-fluid">
            <div align="left">
            <br>Title:
            <br>Author:
            <br>Time:
            <br>Review:
            </div>
            <br>
            </a>
        </div>
        <!-- Swan -->
        <div align="center" class="col-4" "col-md-3" style="background-color:#EAF2E3" >
            <br>
            <a href="?cmd=swan&step=<?=$this->_SwanModel->GetCurrentStep()?>">
            <!-- Replace with image -->
            <img src="Images/Swan.jpg" class="img-fluid">
            <div align="left">
            <br>Title:
            <br>Author:
            <br>Time:
            <br>Review:
            </div>
            <br>
            </a>
        </div>
        <!-- Boat -->
        <div align="center" class="col-4" "col-md-3" style="background-color:#EAF2E3" >
            <br>
            <a href="?cmd=boat&step=<?=$this->_BoatModel->GetCurrentStep()?>">
            <img src="Images/Boat.jpg" class="img-fluid">
            <div align="left">
            <br>Title:
            <br>Author:
            <br>Time:
            <br>Review:
            </div>
            <br>
            </a>
        </div>
    </div>
</div>
        </div>
<!-- -----------Footer -------- --!>
    <?php
    require_once("FooterView.php")
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>
</html>