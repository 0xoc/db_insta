
<div class="col-lg-4 col-md-4 d-sm-none d-md-block d-none " style="margin-top: 20px;">
<div class="card">
  <div class="card-header">
    <h4 class="display-4 authorName"  style="font-size:30px;">Activity</h4>
  </div>
  <div class="card-body">
    <div class="postContent">    
        <p class="card-text"> 
        <ul class="list-group list-group-flush">

        <?php 

          $likecomments = getLikeAndCommentActivities($_SESSION['user_id']);
          $follows = getFollowingsActivity($_SESSION['user_id']);

            for ($i = 0; $i < sizeof($likecomments) ; $i++) {
          ?>
            <li class="list-group-item"> 
              <a href="index.php?page=viewProfile&id=<?php echo $likecomments[$i]['AC_ID']; ?>">
                <?php echo $likecomments[$i]['AC_NAME'] ." " . $likecomments[$i]['AC_LAST_NAME']; ?>
              </a>
              <?php echo $likecomments[$i]['type']; ?>

              <a href="postInfo.php?postId= <?php echo $likecomments[$i]['P_ID']; ?>"> 
                <?php echo $likecomments[$i]['P_CAPTION']; ?>
              </a>
            </li>
          <?php } ?>



          <?php for ($i = 0; $i < sizeof($follows) ; $i++) { ?>
            <li class="list-group-item"> 
              <a href="index.php?page=viewProfile&id=<?php echo $follows[$i]['AC_ID']; ?>">
                <?php echo $follows[$i]['AC_NAME'] ." " . $follows[$i]['AC_LAST_NAME']; ?>
              </a>
              Followed
              <a href="index.php?page=viewProfile&id=<?php echo $follows[$i]['AT_ID']; ?>">
                <?php echo $follows[$i]['AT_NAME'] ." " . $follows[$i]['AT_LAST_NAME']; ?>
              </a>
            </li>
          <?php } ?>

          
          </ul>
         </p>
    </div>

  </div>
</div>
</div>