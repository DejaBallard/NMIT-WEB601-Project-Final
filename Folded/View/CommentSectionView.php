 <div class="Container">
        <div class="row">
                <div class="d-sm-none d-md-block col-md-2"></div>
                <div class="col-12 col-md-8">
                    <form action="?cmd=login" method="post">
                    <div class="form-group">
                        <label for="comment">Leave a Comment:</label>
                        <textarea class="form-control" rows="5" id="Comment" name="Comment"></textarea>
                    </div>
                    <?php
                        if(isset($_SESSION['AccountID'])): ?>
                    <div class="form-group">
                        <input name="Send" value="Submit" id="SubmitComment" class="btn btn-primary">
                    </div>
                    <?php else: ?>
                    <div class="form-group">
                        <button class="btn btn-primary">Login to comment</button>
                    </div>
                    <?php endif; ?>
                    </form>
                </div>
        </div>
    </div>
    <br>
    <div class="Container">
        <div class="row">
            <div class="d-sm-none d-md-block col-md-2"></div>
            <div class="col-12 col-md-8">
                <label>Comment Section</label>
                <div id="CommentDisplay" style="background-color:white;border: 1px solid lightgray;border-radius:5px;">
                
                </div>
            </div>
        </div>    
    </div>  