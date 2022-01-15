<?php 
	if(isset($_POST['borrow'])){
		$status = BookBorrow($conn);
	}
	if(isset($_POST['search'])){
		$res_list= searchBooks($conn);
	}else{
		$res_list = getAllBooks($conn);
	}
	

?>


<div class="dashboard-caption col-lg-9 col-md-4">	
    <div class="dashboard-caption-header">
                <h4><i class="fa fa-book" aria-hidden="true"></i>All Books</h4>
            </div>
	<form method="POST" action="" enctype="multipart/form-data">
	<div class="row">
		<div class="col-lg-12">
				<div class="row">
						<div class="col-lg-2">
						<div id = "" class = "form-group">
							<input name="searchinput" type ="text" value="<?php echo $_POST['searchinput']; ?>" class = "form-control" placeholder="Book Title" required/>
						</div>
						</div>
						<div class="col-lg-2">
						<div id = "" class = "form-group">
							<input name="search" type ="submit" class = "form-control btn btn-success" id = "" value="Search"/>
						</div>
						</div>
				</div>
		</div>
	</div>
	</form>
            <div class="table-responsive mb-0" data-pattern="priority-columns">
                        <table class="table table-striped">
                            <thead>
                                <tr class="bg-primary">
                                     <th>Book Id</th>
                                    <th>Book Title</th>
                                    <th>Book Category</th>
                                     <th>Book Author</th>
                                      <th>Time Period</th>
                                    <th data-priority="6">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($res_list[0] as $res) { 
                                        	$BarrowBook = getBarrowBooksbyId($conn,$res['book_id']);
                                        	if(!empty($BarrowBook)){
                                        		$status="<span class='btn btn-light' style='cursor:default;'>Borrowed</span>";
                                        	}else{
                                        		$status="<button type = 'submit'  name='borrow' style='margin-left:10px' class ='btn btn-success'>Borrow</button>";
                                        	}
                                            echo '
                                                <tr>
                                                     <th><span">'.$res['book_id'].'</span></th>
                                                    <th><span ">'.$res['book_title'].'</span></th>
                                                    <th><span ">'.$res['book_category'].'</span></th>
                                                    <th><span ">'.$res['book_author'].'</span></th>
                                                     <th><span ">'.$res['time_period'].'Days</span></th>
                                                     
                                                   <td>
                                                     	<form method="POST" action="" enctype="multipart/form-data">
                                                     		<input type="hidden" id="" name="userid" value="'.$_SESSION['user_id'].'">
                                                     		<input type="hidden" id="" name="bookid" value="'.$res['book_id'].'">
                                                     		'.$status.'
                                                     	</form>	  
                                                    </td>
                                                </tr>
                                            ';
                                        }
                                    ?>                                                            
                            </tbody>
                        </table>
                    </div>
</div>
<div class="text-center">
	<?php echo $res_list[1]; ?>
</div>