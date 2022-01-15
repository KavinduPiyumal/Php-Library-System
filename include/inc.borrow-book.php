<?php
	if(isset($_POST['return'])){
		$status = BookReturn($conn);
	}
	$res_list = getBarrowedBooksbyUser($conn,$_SESSION['user_id']);	
?>


<div class="dashboard-caption col-lg-9 col-md-4">   
    <div class="dashboard-caption-header">
                <h4><i class="fa fa-bookmark" aria-hidden="true"></i>Borrowed Books</h4>
            </div>
	  
                    <div class="table-responsive mb-0"  data-pattern="priority-columns">
                        <table class="table  table-striped">
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
                                        foreach ($res_list as $res) { 
                                        	
                                            echo '
                                                <tr>
                                                    <th><span class="co-name">'.$res['book_id'].'</span></th>
                                                    <th><span class="co-name">'.$res['book_title'].'</span></th>
                                                    <th><span class="co-name">'.$res['book_category'].'</span></th>
                                                    <th><span class="co-name">'.$res['book_author'].'</span></th>
                                                    <th><span class="co-name">'.$res['time_period'].'Days</span></th>
                                                     
                                                   <td>
                                                     	<form method="POST" action="" enctype="multipart/form-data">
                                                     		<input type="hidden" id="" name="userid" value="'.$_SESSION['user_id'].'">
                                                     		<input type="hidden" id="" name="bookid" value="'.$res['book_id'].'">
                                                     		<button type = "submit"  name="return" class ="btn btn-danger">Return</button>
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