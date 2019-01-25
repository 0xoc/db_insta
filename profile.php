
<div class="offset-lg-1 col-lg-10 col-md-12 " style="margin-top: 20px;">
<div class="card">
  <div class="card-header">
    <img class="profileAvatar" src="img/sampleAvatar.png" />
    <div class="profileInfo">
        <h4 class="display-4 profileName"  style="font-size:30px;"> Ali Parvizi </h4>
        <h4 class="display-4 profileName"  style="font-size:20px;"> 0 Follower </h4>
        <h4 class="display-4 profileName"  style="font-size:20px;"> 0 Following </h4>        
    </div>

    <a href="#" class="btn btn-primary followUnFollow">Follow</a>

  </div>
  <div class="card-body container">
    <div class="postContent">    
        <div class="row">
            <?php for($i = 0; $i < 4;$i++) { ?>
            <div class="col-md-4 col-sm-12">
            <div class="card  profilePost" style="">
                <img class="card-img-top" src="img/sampleAvatar.png" alt="Card image cap">
                <div class="card-body">
                     <h5 class="card-title">Card title</h5>
                     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
            </div>
            <?php } ?>
    </div>

  </div>
</div>
</div>
</div>