<?php 
    session_start();
    require "helpers.php";
    $postId = $_GET['postId'];
    
    if (isset($_POST['requestType'])){
        if (isset($_SESSION['user_id'])) {
            commentOnPost($_SESSION['user_id'], $_POST['target'],$_POST['comment']);
        } else {
            echo "login to comment";
        }
    }

    $comments = getPostComments($postId);
    $likes = getPostLikes($postId);

    
?>
<!DOCTYPE <!DOCTYPE html>
<html>
<?php require "header.php" ?>
<body>
    <?php require "topBar.php"; ?>

    <div class="container" style="margin-top:10px;">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Comments
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <?php for ($i = 0 ;$i < sizeof($comments) ; $i ++) { ?>
                                <li class="list-group-item">
                                    <a href="index.php?page=viewProfile&id=<?php echo $comments[$i]['userId']; ?>">
                                        <?php echo $comments[$i]['name'] . " " . $comments[$i]['last_name']; ?>
                                    </a> - 
                                    <?php echo $comments[$i]['commentText']; ?>
                                </li>
                            <?php  } ?>                    
                        </ul>
                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="newComment">Enter comment</label>
                                <textarea class="form-control" name="comment" id="newComment" rows="3"></textarea>
                            </div>
                            <input type="hidden" name="requestType" value="newComment" />
                            <input type="hidden" name="target" value="<?php echo $postId; ?>" />
                            <button type="submit" class="btn btn-primary mb-2">comment</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                    <div class="card">
                            <div class="card-header">
                                Likes
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <?php for ($i = 0 ;$i < sizeof($likes) ; $i ++) { ?>
                                        <li class="list-group-item">
                                            <a href="index.php?page=viewProfile&id=<?php echo $likes[$i]['userId']; ?>">
                                                <?php echo $likes[$i]['name'] . " " . $likes[$i]['last_name']; ?>
                                            </a>
                                        </li>
                                    <?php  } ?>                    
                                </ul>
                            </div>
                        </div>
            </div>
        </div>
    </div>

<?php require "footer.php"; ?>
</body>
</html>