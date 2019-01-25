<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <?php require "header.php" ?>
</head>
<body>

    <?php require "topBar.php" ?>

    <div class="container">
        <div class="row">
            <?php  require "profile.php" ?>
        </div>
        <div class="row">
        <?php require "login.php" ?>
        </div>
        <div class="row">
            <?php require "post.php" ?>
            <?php require "activity.php" ?>
        </div>
    </div>
 <!-- footer --> 
 <?php require "footer.php" ?>
</body>
</html>