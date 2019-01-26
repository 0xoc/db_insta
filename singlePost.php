<div class="card" style="margin:10px;">
  <div class="card-header">
      <?php if ($showAuthorInfo) { ?>
        <a href="index.php?page=viewProfile&id=<?php echo $singlePostAuthorId; ?>">
        <img class="postAuthorAvatar" src="<?php echo $singlePostAvatar; ?>" />
        <h4 class="display-4 authorName"  style="font-size:30px;"> <?php echo $singlePostAuthor; ?> </h4>
      </a>
      <?php } ?>
  </div>
  <div class="card-body">
    <div class="postContent">
        <a href="postInfo.php?postId=<?php echo $singlePosetId; ?>">
            <img src="<?php echo $singlePostImage; ?>" class="img-fluid" />
        </a>
        <p class="card-text"><?php echo $singlePostCaption; ?></p>
    </div>

  </div>
  <div class="card-footer" > 
      <?php if ($singlePostIsLiked) { ?>
        <form action="#" method="POST" >
            <input type="hidden" name="requestType" value="unlike" />
            <input type="hidden" name="target" value="<?php echo $singlePosetId; ?>" />
            <input type=image src=img/like_red.png class=" postFooterImg"/>
      </form>
      <?php } else { ?>
        <form action="#" method="POST">
            <input type="hidden" name="requestType" value="like" />
            <input type="hidden" name="target" value="<?php echo $singlePosetId; ?>" />
            <input type=image src=img/like_black.png class=" postFooterImg"/>
        </form>
      <?php } ?>
        <a href="postInfo.php?postId=<?php echo $singlePosetId; ?>">
            <img src="img/comment.png" class="ima-fluid postFooterImg" style="float:left;"  />
        </a>


        <?php if ($singlePostIsSaved) { ?>
        <form action="#" method="POST" >
            <input type="hidden" name="requestType" value="unsave" />
            <input type="hidden" name="target" value="<?php echo $singlePosetId; ?>" />
            <input type=image src=img/bookmark_red.png class=" postFooterImg"/>
      </form>
      <?php } else { ?>
        <form action="#" method="POST">
            <input type="hidden" name="requestType" value="save" />
            <input type="hidden" name="target" value="<?php echo $singlePosetId; ?>" />
            <input type=image src=img/bookmark_black.png class=" postFooterImg"/>
        </form>
      <?php } ?>
     <small> <?php echo $singlePostTime; ?></small>
  </div>
</div>