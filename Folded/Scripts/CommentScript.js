
$ (function() {
    
    // Show any messages so far when the page loads
    $.get("?ctr=DataController&Send=SubmitComment",function( data ) {
          $( "#CommentDisplay" ).html( data );
         
    });
    //When the user clicks submit. Post the information to the controller
    $("#SubmitComment").click(function(){
        console.log("button click");
        $.post("?ctr=DataController",
            {
                Comment: $("#Comment").val(),
                Send:"SubmitComment"
            },
            //Then update the comment display with the new data
            function(data, status){
                $("#CommentDisplay").html(data);
            }
         );
          
    });
    
}); 