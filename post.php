<div class="col-lg-8 col-md-8 col-sm-12" style="margin-top: 20px;">
    <?php
    
        $posts = getFollowingPosts($_SESSION['user_id']);
    
    ?>

<?php for ($i = 0 ; $i < sizeof($posts); $i++) {
    // set the context
    $singlePostImage = $posts[$i]['imgPath'];  
    $singlePostCaption = $posts[$i]['caption'];
    $singlePostTime = $posts[$i]['date'];
    $singlePosetId  = $posts[$i]['postId'];
    $singlePostIsLiked = hasUserLiked($_SESSION['user_id'], $singlePosetId);
    $singlePostAuthor = $posts[$i]['name'] . " " . $posts[$i]['last_name'];
    $singlePostAvatar = $posts[$i]['avatarPath'];
    $singlePostAuthorId = $posts[$i]['userId'];
    $showAuthorInfo = true;
    
    require "singlePost.php";
} ?>
</div>