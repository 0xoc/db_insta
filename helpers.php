<?php
    require "db.php";

    function login($user, $pass){
        global $conn;
        $user = htmlentities($user);
        $pass = htmlentities($pass);

        $query = "SELECT `id` FROM `user` WHERE `username` = \"$user\" and `password` = \"$pass\"; ";

        $result = $conn->query($query);

        $data = $result->fetch_assoc();

        if (isset($data) && !empty($data))      // user info currect
            $_SESSION['user_id'] = $data['id'];

    }

    function logout(){
        if (isset($_SESSION['user_id']))
            unset($_SESSION['user_id']);
    }


    function getUserById($id){
        global $conn;

        $query = "SELECT * FROM `user` WHERE `id` = $id;";

        $result = $conn->query($query);
        if ($result->num_rows == 1){
            return $result->fetch_assoc();
        } else {
            echo "Failde to get user";
        }
    }

    function getUserFollowerCount($id){
        global $conn;

        $query = "SELECT COUNT(*) as followers FROM `followings` WHERE `rhsUserId` = $id;";

        $result = $conn->query($query);

        return $result->fetch_assoc()['followers'];
    }

    function getUserFollowingCount($id){
        global $conn;

        $query = "SELECT COUNT(*) as followings FROM `followings` WHERE `lhsUserId` = $id;";

        $result = $conn->query($query);

        return $result->fetch_assoc()['followings'];
    }

    function getUserPosts($id){
        global $conn;

        $query = "SELECT COUNT(*) as followings FROM `followings` WHERE `lhsUserId` = $id;";

        $result = $conn->query($query);

        return $result->fetch_assoc()['followings'];
    }


    function getUserPost($id){
        global $conn;

        $query = "SELECT * FROM `post` WHERE `author` = $id; ";

        $posts = array();

        $result = $conn->query($query);

        while ($row = $result->fetch_assoc()){
            array_push($posts,$row);
        }
        return $posts;
    }

    function isFollowing($id, $target){
        global $conn;

        $query = "SELECT * FROM `followings` WHERE `lhsUserId` = $id and `rhsUserId` = $target; ";

        $result = $conn->query($query);

        if ($result->num_rows > 0)
            return true;
        return false;
    }

    function followUser($id, $target){
        global $conn;

        $query = "INSERT INTO `followings`(`lhsUserId`, `rhsUserId`) VALUES ($id, $target)";

        if ($conn->query($query) === TRUE){
            // done
        } else {
            echo "Could not follow";
        }
    }

    function unfollowUser($id, $target){
        global $conn;

        $query = "DELETE FROM `followings` WHERE `lhsUserId` = $id  AND `rhsUserId` = $target";

        if ($conn->query($query) === TRUE){
            // done
        } else {
            echo "Could not unfollow";
        }
    }

    function hasUserLiked($id, $target){
        global $conn;

        $query = "SELECT * FROM `likes` WHERE `userId` = $id AND `postId` = $target;";
        $result = $conn->query($query);
        
        if ($result->num_rows > 0)
            return true;
        return false;
    }


    function likePost($id, $target){
        global $conn;
        $query = "INSERT INTO `likes`(`userId`, `postId`) VALUES ($id, $target);";

        if ($conn->query($query) === TRUE){
            // liked
        } else {
            echo "Could not like";
        }
    }

    function unlikePost($id, $target){
        global $conn;
        $query = "DELETE FROM `likes` WHERE `userId` = $id AND `postId` = $target";

        if ($conn->query($query) === TRUE){
            // liked
        } else {
            echo "Could not unlike";
        }
    }

    function uploadLatestPhoto($img, $base, $un){
        echo $base;
        if (!file_exists("img/" . $base))
            mkdir("img/" . $base, 0777);

            $target_dir = "img/" . $base . "/" ;
            $target_file = $target_dir . basename($_FILES[$img]['name']);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $target_file = $target_dir . $un . ".". $imageFileType;
            
            
            // Check if file already exists
            if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        return $target_file;
    } 

    function register($username, $password, $name,$lastName){
        global $conn;

        $register_query = "INSERT INTO `user`(`name`, `last_name`, `username`, `password`) VALUES (\"$name\",\"$lastName\", \"$username\", \"$password\");";
        
        if ($conn->query($register_query) === TRUE) {
            // CREATE THE IMAGE NOW
            $query = "UPDATE `user` SET `avatarPath` = \"". uploadLatestPhoto("img", $conn->insert_id, $conn->insert_id) ."\" WHERE `username` = \"$username\";";

            if ($conn->query($query) === TRUE){
                // register done
            } else {
                echo "failed";
            }
        }
            
    }


    function sendPost($cap){
        global $conn;
        $query = "INSERT INTO `post`( `caption`, `author`) VALUES (\"$cap\",". $_SESSION['user_id']." );";
        
        if ($conn->query($query) === TRUE) {
            // CREATE THE IMAGE NOW
            $query = "UPDATE `post` SET `imgPath` = \"". uploadLatestPhoto("img", $_SESSION['user_id'] . "/posts", $conn->insert_id) ."\" WHERE `id` = " . $conn->insert_id;

            if ($conn->query($query) === TRUE){
                echo "image uploaded";
            } else {
                echo "failed";
            }
        }

    }


    function allUsers(){
        global $conn;

        $query = "SELECT * FROM `user`;";

        $users = array();

        $result = $conn->query($query);

        while ($row = $result->fetch_assoc()){
            array_push($users, $row);
        }

        return $users;
    }
?>