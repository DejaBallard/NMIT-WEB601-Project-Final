<html>
    <head>
    <title> <?=$this->_title?></title>
    <!-- ------------------ CSS ----------------- -->    
    <?php require_once('CssView.php') ?>
    </head>
    <!-- When Body loads, run hide function -->
    <body onload="hide()">
<!-- -------------------Navigation ---------------- -->
    <?php
    require_once("NavView.php")
    ?>

<!-- ----------- Heading --------- -->
    <?php
    require_once('HeadingView.php')
    ?>
<!-- ------- Content ---- -->
<div class="container">
    <div class="row">
        <!-- Folded Signup -->
        <div class="col-6" "col-md-3" style="background-color:#EAF2E3" >            
            <form action="?ctr=DataController" method="post">
                <div class="form-group">
                    <label for="Email">Email</label>
                    <?php if(isset($_SESSION['EmailError'])): ?> <span><br><?php echo $_SESSION['EmailError'] ?></span><?php endif ?>
                    <input type="email" class="form-control" id="Email" name="Email" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="Password">Display Name</label>
                    <input type="text" class="form-control" id="DisplayName" name="DisplayName" placeholder="Enter Display Name">
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" id="password" name="Password" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <label for="RPassword">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <label for="Question">Account Type:</label>
                    <br>
                    <input type="radio" name="AccountType" onclick="hide()" value="General"> General<br>
                    <input type="radio" name="AccountType" onclick="hide()" value="Teacher"> Teacher<br>
                    <input type="radio" name="AccountType" onclick="show()" value="Student"> Student<br>
                </div>
                <div class="form-group" id="TeacherCode">
                    <label for="Question">Teacher Code:</label>
                    <br>
                    <input type="text" name="TeacherCode" placeholder="Enter Code">
                </div>  
                <button type="submit" name="Send" value="SignUp" class="btn btn-primary">Submit</button>
            </form>            
        </div>
    </div>
</div>
<?php unset($_SESSION['EmailError']);?>   
        
        
        
<!-- -----------Footer -------- --!>
    <?php
    require_once("FooterView.php")
    ?>
     <!-- Optional JavaScript -->
    <!-- https://www.webdeveloper.com/forum/d/265221-text-box-to-appear-only-when-radio-button-selected -->
<script>
    function show(){
            var x = document.getElementById("TeacherCode");
            x.style.display = "block";
    }function hide(){
        var x = document.getElementById("TeacherCode");
        x.style.display = "none";
    }
</script>
        
<!-- https://codepen.io/diegoleme/pen/surIK -->
    <script>
    var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
        </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>
</html>