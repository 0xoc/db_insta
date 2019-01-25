<?php 
        session_start();

    require "helpers.php";
    if (isset($_POST['requestType'])){
        switch ($_POST['requestType']){
            case "save":{
                savePost($_SESSION['user_id'], $_POST['target']);
                break;
            }
    
            case "unsave":{
                unsavePost($_SESSION['user_id'], $_POST['target']);
                break;
            }
            case "unlike":{
                unlikePost($_SESSION['user_id'], $_POST['target']);
                break;
            }
    
            case "like":{
                likePost($_SESSION['user_id'], $_POST['target']);
                break;
            }
    
        }
    }

    $posts = getSavedPosts($_SESSION['user_id']);
?>
<!DOCTYPE <!DOCTYPE html>
<html>
<?php require "header.php" ?>
<body>
    <?php require "topBar.php"; ?>

    <div class="container">
        <div class="row">

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
    $singlePostIsSaved = isPostSaved($_SESSION['user_id'], $singlePosetId);

    ?>
    <div class="col-md-4 col-sm-12" style="margin-top: 20px;">

    <?php
    require "singlePost.php"; ?> 
</div>

    <?php
} ?>
</div>
</div>

<?php require "footer.php"; ?>


</body>
</html>