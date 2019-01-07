<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
        var background = $('#Ad');
        var content =$('#AdContent');
        background.show();
        //zIndex set to 1031 as bootstrap, fixed top nav is 1030
        background.animate({height: '2.5%', opacity: '0.4',zIndex:'1031'}, "slow");
        background.animate({width: '100%', opacity: '0.4'}, "slow");
        background.animate({right: '0px'},"fast");
        background.animate({height: '100%', opacity:'0.8'},"fast");
        background.animate({height: '95%', opacity:'0.85'},"fast");
        background.animate({height: '100%', opacity:'0.90'},"fast",function(){ content.fadeIn();});
$("button").click(function(){
                   content.fadeOut(['fast']);
        background.animate({height: '2.5%', opacity: '0.8'}, "fast");
        background.animate({width: '0%', opacity: '0.4'}, "slow");
    });
});
</script>


<div id="Ad" style="background:#B45050;height:0px;width:0px;position:fixed;display:none">
</div>
<br>
<div class="container" align= "center">
<div class="row">
    <div class="col-lg-2"></div>
            <div class="col-lg-8" id="AdContent" style= "display:none;background:#F8F9FA;z-index:1032;">
                <div style="position:absolute;right:1%;top:1%;"><button class="btn btn-primary">X</button></div>
                <br>
                <br>
                <h1>Enter to Win!</h1>
                <b>Folded is giving a chance for all students to win a brand new set of computers for your school</b>
                <b>Click the computer below to enter!</b>
                <br>
                <br>
                <a href="?cmd=comp" ><img src="Images/ComputerComp.jpg"></a>
                <br>
                <br>
                <br>
            </div>
    <div class="col-lg-2"></div>
    </div>
</div>
