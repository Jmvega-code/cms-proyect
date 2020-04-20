<hr>

<!-- Blog Comments -->


<!-- Posted Comments -->

<!-- Comment -->


<?php
          // FIND ALL COMMENTS QUERY
          $query = "SELECT * FROM comments";
          $select_comments = mysqli_query($connection, $query);
          
          while($row = mysqli_fetch_assoc($select_comments)){
              
              $comment_author = $row['comment_author'];
              $comment_content = $row['comment_content'];
              $comment_email = $row['comment_email'];
              $comment_status = $row['comment_status'];
              $comment_post_id = $row['comment_post_id'];
              $comment_date = $row['comment_date'];
              
              $comment_content = substr($comment_content, 0, 30);
              ?>

        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><?php echo $comment_author ?>
                <small><?php echo $comment_date ?></small>
            </h4>
            <?php echo $comment_content ?>
        </div>
</div>
<?php } ?>

<br>    

<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
    <form role="form">
        <div class="form-group">
            <label for="comment_author">Author</label>
            <input type="text" class="form-control" name="comment_author" id="">
        </div>
        <div class="form-group">
        <label for="comment_email">Email</label>
        <input type="email" class="form-control" name="comment_email" id="">
        </div>
        <div class="form-group">
        <label for="comment_content">Your Comment</label>
            <textarea class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<hr>


<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">Start Bootstrap
            <small>August 25, 2014 at 9:30 PM</small>
        </h4>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
    </div>
</div>

<!-- Comment -->
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">Start Bootstrap
            <small>August 25, 2014 at 9:30 PM</small>
        </h4>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        <!-- Nested Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Nested Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
        <!-- End Nested Comment -->
    </div>
</div>