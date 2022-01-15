<div class="dashboard-caption col-lg-9 col-md-4">
<?php 
    if(isset($_GET['id'])){
        $bookinfo = getBookByid($conn, $_GET['id']);
    }
    if(isset($_POST['save_user'])){
        $status = updatebook($conn,$_GET['id']);
    }
?>
<form action="" method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-lg-12">
          <div class="dashboard-caption-header">
                <h4><i class="fa fa-pencil" aria-hidden="true"></i>Edit Book</h4>
            </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">

                <div class="form-group">
                   <label class = "control-label">Book Title:</label>
                        <input type = "text" class = "form-control" name="book_title" value="<?php echo $bookinfo['book_title']; ?>" placeholder="Book Title" required readonly/>
                </div>      

                <div class="form-group">
                    <label class = "control-label">Book Author:</label>
                        <input type = "text" class = "form-control" name="book_author" value="<?php echo $bookinfo['book_author']; ?>" placeholder="Book Author" required/>
                </div>
                 
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">

               <div class="form-group">
                   <label class = "control-label">Book Category:</label>
                        <input type = "text" class = "form-control" name="book_category" value="<?php echo $bookinfo['book_category']; ?>" placeholder="Book Category" required/>
                </div>
                   <div class="form-group">
                   <label class = "control-label">Time Period:</label>
                        <input type = "number" class = "form-control" value="<?php echo $bookinfo['time_period']; ?>" name="time_period" placeholder="Time Period" required/>
                </div>
                
              
            </div>
        </div>
    </div>
    <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
                 <div class="form-group">
                    <label>Book Description</label>
                    <div>
                        <textarea name="book_description" class="form-control summernote" rows="8"><?php echo $bookinfo['book_description']; ?></textarea>
                    </div>
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
		      <input type="submit" name="save_user" class="btn btn-success mr-1" value="Save Book">
              
            </div>
        </div>
   	</div>
</div>
</form>
</div>