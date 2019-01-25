<?php
    session_start();
    
    // helper functions
    require "helpers.php";

    $page = "home";         // page to show the user
    $userId = null;         // current user id

    $requestType = null;    // type of request to be proccesed


    // get page
    if (isset($_GET['page']) && !empty($_GET['page'])){
        $page = $_GET['page'];
    }

    // get user
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
        $userId = $_SESSION['user_id'];

    // get request
    if (isset($_POST['requestType']) && !empty($_POST['requestType']))
        $requestType = $_POST['requestType'];


    

    // proccess any request
    switch ($requestType){
        case "login":{
            login($_POST['username'], $_POST['password']);
            break;
        }

        case "logout":{
            logout();
            break;
        }

        case "register": {
            register($_POST['username'],$_POST['password'], $_POST['name'],$_POST['lastName']);
            break;
        } 
        case "sendPost": {
            sendPost($_POST['caption']);
            break;
        }
    }
?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <?php require "header.php" ?>
</head>
<body>

    <?php require "topBar.php" ?>

    <div class="container">
        <div class="row">
            <?php 
                if (!isset($_SESSION['user_id']))
                {   
                    if ($page == "register")
                        require "register.php";
                    else
                    // user not loged in
                    require "login.php";
                } else
                {    // user loged in
                    if($page == "home") 
                    {
                        require "post.php";
                        require "activity.php";
                    }
                    else if ($page == "profile")
                        require "profile.php";
                    else if ($page == "followers")
                        require "follower.php";
                    else if ($page == "addPost")
                        require "addPost.php";
                    else if ($page == "logout"){
                        logout();
                        require "logedOut.php";
                    } else if ($page == "newPost")
                        require "addPost.php";
                    else
                        echo "<h1>Not Found</h1>";
                }   
            ?>
        </div>
    </div>
 <!-- footer --> 
 <?php require "footer.php" ?>
</body>
</html>