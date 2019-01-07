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
        <div class="col-12" "col-md-3" style="background-color:#EAF2E3">
            <br>
    <label>To be entered in to win the brand new HP 2018 computer for your school, just fill out the following:</label>
<form action="?ctr=DataController" method="post">
  <div class="form-group">
    <label for="Classroom">Classroom</label>
    <input type="text" class="form-control" name="Classroom" placeholder="Ex. AB12" pattern="[A-Z]{2}[0-9]{2}" id="ClassroomField" required>
  </div>
  <div class="form-group">
    <label for="School">School</label>
    <input type="text" class="form-control" name="School" placeholder="Ex. Waimea" required>
  </div>
<div class="form-group">
    <label for="StudentEmail">Student Email</label>
    <input type="email" class="form-control" name="StudentEmail" placeholder="Ex. Student@School.com" required>
  </div>
    <div class="form-group">
    <label for="SchoolContact">School Contact Details</label>
    <input type="tel" class="form-control" name="SchoolContact" placeholder="Ex. 123456" pattern="[0-9]{7,}" id ="ContactField" required>
  </div>
    <div class="form-group">
    <label for="Question"><?php echo $_SESSION["Question"] ?> ?
        </label>
        <br>
      <input type="radio" name="Answer" value="<?php echo $_SESSION["OptionOne"] ?>"> <?php echo $_SESSION["OptionOne"] ?><br>
    <input type="radio" name="Answer" value="<?php echo $_SESSION["OptionTwo"] ?>"> <?php echo $_SESSION["OptionTwo"] ?><br>
    <input type="radio" name="Answer" value="<?php echo $_SESSION["OptionThree"] ?>" required> <?php echo $_SESSION["OptionThree"] ?><br>
    </div>
  <button type="submit" name="Send" value="Comp" class="btn btn-primary">Submit</button>
</form>
            
        </div>
    </div>
        </div>
    
        
    <?php require_once('FooterView.php') ?>
        
        <script>
        var classroomField = document.getElementById('ClassroomField');
            classroomField.oninvalid = function(event){
            event.target.setCustomValidity('Please enter 4 characters, two capital letters followed by two digits. ex. AB12');
        }
        classroomField.oninput = function(event){
            event.target.setCustomValidity('');
        }
        var contactField = document.getElementById('ContactField');
            contactField.oninvalid = function(event){
            event.target.setCustomValidity('Please enter a valid contact number');
        }
            contactField.oninput = function(event){
            event.target.setCustomValidity('');
        }
        </script>
    </body>
</html>
