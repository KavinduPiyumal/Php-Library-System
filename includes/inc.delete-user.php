<div class="dashboard-caption col-lg-9 col-md-4">
<?php
    if(isset($_GET['id'])){
        $getUserInfo = getUserInfoByid($conn, $_GET['id']);
    }

    if(isset($_POST['delete_user'])){
        $status = deleteUser($conn, $_GET['id']);
    }
?>

<form action="" method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-lg-12">
          <div class="dashboard-caption-header">
                <h4><i class="fa fa-trash" aria-hidden="true"></i>Delete User</h4>
         </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="form-group">
                    <label>Your are going to delete User : </label>
                    <?php echo $getUserInfo['first_name']; ?>
                </div>  
                
                <hr>
                <?php echo $status; ?>

                <div class="col-lg-12">
                     <input type="submit" name="delete_user" class="btn btn-danger mr-1" value="Delete User">
                     <a class="btn btn-success mr-1" href="admin-dashboard.php?menu=all-users">Back</a>
                </div>        

            </div>
        </div>
    </div>   
   
</div>
</form>
            
</div>