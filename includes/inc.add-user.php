<div class="dashboard-caption col-lg-9 col-md-4">
<?php 
    if(isset($_POST['save_user'])){
        $status = userRegistration($conn);
    }
?>

<form class="custom-validation" action="" method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-lg-12">
          <div class="dashboard-caption-header">
                <h4><i class="fa fa-user-plus" aria-hidden="true" style="margin-right: 10px;"></i>Add User</h4>
            </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">

                <div class="form-group">
                   <label class = "control-label">First Name:</label>
                        <input type = "text" class = "form-control" id = "username" name="firstname" placeholder="First Name" required/>
                </div>      

                <div class="form-group">
                    <label class = "control-label">Last Name:</label>
                        <input type = "text" class = "form-control" id = "username" name="lastname" placeholder="Last Name" required/>
                </div>
                 <div class="form-group">
                   <label class = "control-label">Email:</label>
                        <input type = "text" class = "form-control" id = "username" name="email" placeholder="Email" required/>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">

               <div id ="" class = "form-group">
                        <label class = "control-label">Password:</label>
                        <input type = "password" class = "form-control" id ="" name="password" placeholder="Password" required/>
                    </div>
                    <div id ="" class = "form-group">
                        <label class = "control-label">Confirm Password:</label>
                        <input type = "password" class = "form-control"  name="cpassword" placeholder="Confirm Password" required/>
                    </div>
                
              
            </div>
        </div>
    </div>

 
    <div class="col-lg-12">
         <?php echo $status; ?>
    </div>

    <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
		      <input type="submit" name="save_user" class="btn btn-success mr-1" value="Save User">
              
            </div>
        </div>
   	</div>
</div>
</form>
</div>