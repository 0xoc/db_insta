<div class="offset-lg-1 col-lg-10 col-md-12 " style="margin-top: 20px;">
<div class="card">
    
    <div class="card-header">
        <h4 class="display-4 profileName"  style="font-size:30px;"> Register </h4>     
    </div>
    
    <div class="card-body container">
    <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="userName">Username</label>
                <input type="text" class="form-control" id="userName"  name ="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
            </div>

            <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name"  name ="name" placeholder="name">
            </div>

            <div class="form-group">
                    <label for="lastName">Last name</label>
                    <input type="text" class="form-control" id="lastName"  name ="lastName" placeholder="lastName">
            </div>
            <div class="form-group">
                <label for="img">Upload Avatar</label>
                <input type="file" class="form-control-file" id="img" name="img">
            </div>

            <input type="hidden" name="requestType" value="register" />
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</div>
</div>
