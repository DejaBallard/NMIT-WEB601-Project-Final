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
         <div class="container">
    <div class="row">
        <div class="col-6" "col-md-3" style="background-color:#EAF2E3" >
<form action="?ctr=DataController" method="post">
  <div class="form-group">
    <label for="Email">Email</label>
    <input type="email" class="form-control" name='Email'id="Email" placeholder="Enter Email">
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" name='Password' id="Password" placeholder="Enter Password">
  </div>
    <?php if(isset($_SESSION['LoginError'])): ?> <span><?php echo $_SESSION['LoginError'] ?><br></span><?php endif ?>
  <button type="submit" name="Send" value="LogIn" class="btn btn-primary">Submit</button>
            </form>            
        </div>
    </div>
</div>   
        
<?php unset($_SESSION['LoginError']);?>         
        
        
        
        
        
        
        
        
        
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