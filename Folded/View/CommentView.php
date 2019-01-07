<?php 
  require_once("Model/CommentModel.php");
  
  // Open a connection to the Messages store.
  $ComModel = new CommentModel();

  // Open Data resource (via SQL Query in MessageModel)
  $ComModel->GetComments();

  // Show all messages - loop while there is a NextMessage
  while( $row = $ComModel->NextMessage()){
      // Popping back into HTML
      // this would be better as a list ...
      ?>
        <div style="padding-bottom:10px;padding-left:5px">
        <b><?="[".$row['DATE(com_timestamp)']."] ".$row['acc_name'].":"?></b>
        <?=$row['com_comment']?>
        </div>
<?php
  }// end of messages display
  
  // Make sure the data resource is free
  $ComModel->FreeMessages();
 
?>

