<?php 
    require "helpers.php";

    $users = 0;

    $userId = $_GET['user'];
    $type = $_GET['type'];


    if ($type == "followers")
        $users = getFollowers($userId);
    else
        $users= getFollowings($userId);
?>
<!DOCTYPE <!DOCTYPE html>
<html>
<?php require "header.php" ?>
<body>
    <?php require "topBar.php"; ?>

<ul class="list-group list-group-flush">
    <?php for ($i = 0 ; $i < sizeof($users); $i++) { ?>
        <li class="list-group-item"><?php echo $users[$i]['name'] . " " . $users[$i]['last_name']; ?>
        <a href="index.php?page=viewProfile&id=<?php echo $users[$i]['id']; ?>"> View Profile </a>
    </li>
    <?php } ?>
</ul>

<?php require "footer.php"; ?>
</body>
</html>