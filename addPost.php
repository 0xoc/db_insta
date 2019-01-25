<?php

    $allUserInfo = getUserById($_SESSION['user_id']);
?>

<div class="offset-lg-1 col-lg-10 col-md-12 " style="margin-top: 20px;">
<div class="card">
  <div class="card-header">
    <img class="postAuthorAvatar" src="<?php echo $allUserInfo['avatarPath']; ?>" />
    <h4 class="display-4 authorName"  style="font-size:30px;"> <?php echo $allUserInfo['name'] . " " . $allUserInfo['last_name']; ?> </h4>
  </div>
  <div class="card-body">
    <div class="postContent">    
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="postCaption">Caption</label>
                <input type="text" class="form-control" id="postCaption" name="caption" placeholder="Post Caption">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">post image</label>
                <input type="file" class="form-control-file" name="img" id="exampleFormControlFile1">
            </div>
            <input type="hidden" name="requestType" value="sendPost" />
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>

  </div>
</div>
</div>