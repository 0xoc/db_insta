<div class="card">
  <!--div class="card-header">
    <img class="postAuthorAvatar" src="<?php //echo $singlePostAvatar; ?>" />
    <h4 class="display-4 authorName"  style="font-size:30px;"> <?php //echo $singlePostAuthor; ?> </h4>
  </div-->
  <div class="card-body">
    <div class="postContent">    
        <img src="<?php echo $singlePostImage; ?>" class="img-fluid" />
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
      <form action="#" method="POST" >
            <input type="hidden" name="requestType" value="commnet" />
            <input type="hidden" name="target" value="<?php echo $singlePosetId; ?>" />
            <input type=image src=img/comment.png class=" postFooterImg"/>
        </form>

      <img src="img/bookmark_black.png" class="ima-fluid postFooterImg" style="float:left;"  />
   
  </div>
</div>