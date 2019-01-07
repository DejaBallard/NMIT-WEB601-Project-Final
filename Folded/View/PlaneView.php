<html>
    <head>
    <title> <?=$this->_title?></title>
    <!-- ------------------ CSS ----------------- -->    
    <?php require_once('CssView.php') ?>
        <script type="text/javascript" src="Scripts/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="Scripts/CommentScript.js"></script>
    </head>
    <body>
<!-- -------------------Navigation ---------------- -->
    <?php
    require_once('NavView.php')
    ?>


<!-- ----------- Heading --------- -->
    <?php
    require_once('HeadingView.php')
    ?>
<!-- -------Content ------------- -->
<?php
    if($this->_PlaneModel->GetCurrentStep())
    {
        include("PlaneDetails\\Guide".$this->_PlaneModel->GetCurrentStep().".php");
    }
    else
    {
        ?>
        <h2>there is a problem</h2>
        <?php
    }
        ?>
<!-- ----------- Selection ------------ -->
<br>
<br>
<div class="Container">
    <div class="row" align="center">
    <?php
    if(
        ($this->_PlaneModel->GetCurrentStep() < $this->_PlaneModel->_MaxStep)
        &&
        ($this->_PlaneModel->GetCurrentStep() > 1)
        )
    {
    ?>
    <div class="col-6">
    <a href="?ctr=PlaneController&cmd=prev">Prev Step</a>
        </div>
           <div class="col-6"> 
    <a href="?ctr=PlaneController&cmd=next">Next Step</a>
        </div>
    <?php
    }
    else if($this->_PlaneModel->GetCurrentStep() == $this->_PlaneModel->_MaxStep)
    {
    ?>
    <div class="col-6">
    <a href="?ctr=PlaneController&cmd=prev">Prev Step</a>
        </div>
    <?php
    }
    else if($this->_PlaneModel->GetCurrentStep() == 1)
    {
    ?>
        <div class="col-6"></div>        
           <div class="col-6"> 
    <a href="?ctr=PlaneController&cmd=next">Next Step</a>
        </div>
    <?php
    }
    ?>
        </div>
    </div>
    
    <br>   
                <?php
    require_once("CommentSectionView.php");
        ?>

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