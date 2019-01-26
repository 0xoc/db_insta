<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">INSTAGRAM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php?page=home">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="index.php?page=profile">Profile</a>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="userList.php">All users</a>
        </li>

        <li class="nav-item">
                <a class="nav-link" href="index.php?page=explore">explore</a>
        </li>
      
      <?php if (!isset($_SESSION['user_id'])) { ?>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=register">Register</a>
      </li>
      <?php } else { ?>

      <li class="nav-item">
            <a class="nav-link" href="index.php?page=newPost">New Post</a>
      </li>

      <li class="nav-item">
            <a class="nav-link" href="savedPosts.php">Saved Posts</a>
      </li>

      <li class="nav-item">
            <form action="index.php" method="POST" class="form-inline my-2 my-lg-0">
                <input type="hidden" name="LOGOUT" />
                <input type="submit" value="logout" class="btn btn-danger	 my-2 my-sm-0" />
            </form>
        </li>
      <?php } ?>
    </ul>
  </div>
</nav>