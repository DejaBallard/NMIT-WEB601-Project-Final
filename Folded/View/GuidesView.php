<html>
    <head>
    <title> <?=$this->_title?></title>
    <!-- ------------------ CSS ----------------- -->    
    <?php require_once('CssView.php') ?>
    </head>
    
    <body>
<!-- -------------------Navigation ---------------- -->
    <?php
    require_once("NavView.php")
    ?>

<!-- ----------- Heading --------- -->
    <?php
    require_once('HeadingView.php')
    ?>
<!-- ----------------- Local Navigation ------------ -->
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