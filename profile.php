<?php
    $userInfo = getUserById($profileUserId);
    $followers = getUserFollowerCount($profileUserId);
    $followings = getUserFollowingCount($profileUserId);
    $posts = getUserPost($profileUserId);

?>
<div class="offset-lg-1 col-lg-10 col-md-12 " style="margin-top: 20px;">
<div class="card">
  <div class="card-header">
    <img class="profileAvatar" src="<?php echo $userInfo['avatarPath']; ?>" />
    <div class="profileInfo">
        <h4 class="display-4 profileName"  style="font-size:30px;"> <?php echo $userInfo['name'] . " " . $userInfo['last_name']; ?> </h4>
        <a href="follower.php?type=followers&user=<?php echo $userInfo['id']; ?>" class="display-4 profileName"  style="font-size:20px;"> <?php echo $followers; ?> Follower </a>
        <a href="follower.php?type=followings&user=<?php echo $userInfo['id']; ?>" class="display-4 profileName"  style="font-size:20px;"> <?php echo $followings; ?> Following </a>        
    </div>

    <?php if($profileUserId != $_SESSION['user_id']){   // other page
        if (isFollowing($_SESSION['user_id'], $profileUserId)){ // is following this ?>
            <form action="#" method="POST" >
                <input type="hidden" name="requestType" value="unfollowUser" />
                <input type="hidden" name="target" value="<?php echo $userInfo['id']; ?>" />
                <input type="submit" value="Unfollow" class="btn btn-primary followUnFollow" />
            </form>
    <?php } else { // not following ?>
        <form action="#" method="POST" >
            <input type="hidden" name="requestType" value="followUser" />
            <input type="hidden" name="target" value="<?php echo $userInfo['id']; ?>" />
            <input type="submit" value="Follow" class="btn btn-primary followUnFollow" />
        </form>
    <?php }
    } else {    // self page ?>
        <a href="#" class="btn btn-primary followUnFollow">Edit profile</a>
    <?php } ?>

  </div>
  <div class="card-body container">
    <div class="postContent">    
        <div class="row">
            <?php for($i = 0; $i < sizeof($posts);$i++) { 
                // set context variables
                $singlePostImage = $posts[$i]['imgPath'];  
                $singlePostCaption = $posts[$i]['caption'];
                $singlePostTime = $posts[$i]['date'];
                $singlePosetId  = $posts[$i]['id'];
                $singlePostIsLiked = hasUserLiked($_SESSION['user_id'], $singlePosetId);
                $showAuthorInfo = false;
                $singlePostIsSaved = isPostSaved($_SESSION['user_id'], $singlePosetId);
            ?>
            <div class="col-md-4 col-sm-12">
            <?php require "singlePost.php"; ?>
            </div>
            <?php } ?>
    </div>

  </div>
</div>
</div>
</div>