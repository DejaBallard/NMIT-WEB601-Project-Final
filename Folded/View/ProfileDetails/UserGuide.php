<?php 
  require_once("Model/ProfileModel.php");
  
  // Open a connection to the Messages store.
  $ProModel = new ProfileModel();


  // Open Data resource (via SQL Query in MessageModel)
  $ProModel->GetSavedGuides();
?>
<div class="row">
<?php
  // Show all messages - loop while there is a NextMessage
  while( $row = $ProModel->NextGuide()){
      // Popping back into HTML
      // this would be better as a list ...
      ?>
        <div class="col-12 col-md-4"style="padding-bottom:10px;padding-left:5px;font-size:25px;" align="Center">
            <br>
        <a href="?cmd=<?=$row['tra_guide']?>&step=<?=$row['tra_page_no']?>">
            <b><?="Guide: ".$row['tra_guide']?></b>
            <br> <?="Step: ".$row['tra_page_no']?>
            </a>
        </div>
<?php
  }// end of messages display
  ?>
</div>
<?php
  // Make sure the data resource is free
  $ProModel->FreeGuide();
 
?>