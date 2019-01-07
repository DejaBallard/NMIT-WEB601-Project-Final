<?php
//---------- Models ----------
require_once("Model/CompModel.php");
$_compModel = new CompModel();
$_compModel->SelectID();
?>

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
                <div class="col-12 col-md-6" style="background-color:#EAF2E3">
                    <h2>Congratulations! You have been entered!</h2>
                    <p>Below is the information being sent</p>
                    
                    <label>Entry No.</label><br>
                    <?php echo $_compModel->GetValue("EntryId"); ?>
                    <br>
                    
                    <label>Classroom: </label><br>
                    <?php echo $_compModel->GetValue("Classroom");?>
                    <br>
                    
                    <label>School: </label><br>
                    <?php echo $_compModel->GetValue("School");?>
                    <br>
                    
                    <label>Student Email: </label><br>
                    <?php echo $_compModel->GetValue("StudentEmail");?>
                    <br>
                    
                    <label>School Contact: </label><br>
                    <?php echo $_compModel->GetValue("SchoolContact");?>
                    <br>
                    
                    <label>Question Asked:</label><br>
                    <?php echo $_compModel->GetValue('Question'); ?>
                    <br>
                    
                    <label>Question Choice: </label><br>
                    <?php echo $_compModel->GetValue("UserAnswer");?>
                    
                </div>
                <div class="col-md-6 d-sm-none d-md-block" align="center">
                    <img src="Images/ComputerComp.jpg">
                </div>
            </div>
        </div>
<!-- ----------- Footer ------------- -->
        <?php require_once('FooterView.php') ?>
    </body>
</html>
