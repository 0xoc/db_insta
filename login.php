
<div class="offset-md-3 col-md-6" style="margin-top: 20px;">
<div class="card">
  <div class="card-header">
    <h4 class="display-4 authorName"  style="font-size:30px;"> Login </h4>
  </div>
  <form action="#" method="POST" >
  <div class="card-body">
    <div class="postContent">    
    <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username" name="username">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
    </div>
    </div>

  </div>
  <div class="card-footer" >
      <input type="hidden" name="requestType" value="login" />
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</div>
</div>