<div class="dashboard-caption col-lg-9 col-md-4">
<?php $res_list = AllBooks($conn); ?>

 <div class="dashboard-caption-header">
                <h4><i class="fa fa-book" aria-hidden="true"></i>All Books</h4>
            </div>

                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                        <table id="tech-companies-1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Book id</th>
                                    <th data-priority="3">Book Title</th>
                                    <th data-priority="3">Book Category</th>
                                    <th data-priority="3">Book Author</th>
                                    <th data-priority="3">Book Description</th>
                                    <th data-priority="6">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($res_list[0] as $res) {
                                            
                                            echo '
                                                <tr>
                                                    <th><span>'.$res['book_id'].'</span></th>
                                                    <th><span>'.$res['book_title'].'</span></th>
                                                      <th><span>'.$res['book_category'].'</span></th>
                                                      <th><span>'.$res['book_author'].'</span></th>
                                                      <th><span>'.$res['book_description'].'</span></th>
                                                      
                                                    <td>
                                                        <a href="admin-dashboard.php?menu=edit-book&id='.$res['book_id'].'" class="btn btn-warning">Edit</a>

                                                        <a href="admin-dashboard.php?menu=delete-book&id='.$res['book_id'].'" class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            ';
                                        }
                                    ?>                                                               
                            </tbody>
                        </table>
                    </div>
<div class="text-center">
    <?php echo $res_list[1]; ?>
    </div>
</div>
                </div>
    
