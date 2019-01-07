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
        <div align="center" class="col-4" "col-md-4" style="background-color:lightgray" >
            Featured
        </div>
                <div align="center" class="col-4" "col-md-3" style="background-color:lightgray" >
            Top
        </div>
          <div align="center" class="col-4" "col-md-3" style="background-color:lightgray" >
            Continue Watching
        </div>
    </div>
</div>
<br> 
        
        <!-- -----------Footer -------- --!>
    <?php
    require_once("FooterView.php")
    ?>
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</html>