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
<div class="container">
    <div class="row">
        <div align="center" class="col-12">
            <div class="main"><h1>Profile Settings</h1>
            </div>
        </div>
    </div>
</div>
<br>  
         <div class="container">
    <div class="row">
        <div class="col-3" "col-md-3" style="background-color:#EAF2E3" >
            <br>
<form action="?ctr=ProfileController" method="post">
    <div class="form-group">  
        <button type="submit" name="Send" value="Profile" class="btn btn-block btn-primary">Profile Settings</button>
    </div>
        <div class="form-group">  
        <button type="submit" name="Send" value="Guide" class="btn btn-block btn-primary">Saved Guides</button>
    </div>
        <div class="form-group">  
        <button type="submit" name="Send" value="Upload" class="btn btn-block btn-primary">Manage Uploads</button>
    </div>
    <?php if($_SESSION['AccountType'] =='Teacher'): ?>
    <div class="form-group">  
        <button type="submit" name="Send" value="Teacher" class="btn btn-block btn-primary">Teacher Setting</button>
    </div>
    <?php endif; ?>
</form>
<form action="?ctr=DataController" method="post">
  <div class="form-group">  
  <button type="submit" name="Send" value="LogOut" class="btn btn-block btn-primary">Log Out</button>
    </div>
    </form>            
</div>
        <div class="col-9" "col-md-3" style="background-color:#E3E0DB" >
            <br>
            <?php include("ProfileDetails\\User".$this->_ProfileModel->GetCurrentPage().".php"); ?>
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