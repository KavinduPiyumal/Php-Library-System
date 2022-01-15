<div class="dashboard-caption col-lg-9 col-md-4">
<?php $res_list = getBarrowedBooks($conn); ?>

<div class="dashboard-caption-header">
                <h4><i class="fa fa-bookmark" aria-hidden="true"></i>All Barrowed Books</h4>
            </div>
                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                        <table id="tech-companies-1" class="table table-striped">
                            <thead>
                                <tr>
                                     <th>Book id</th>
                                    <th data-priority="3">Book Title</th>
                                    <th data-priority="3">Barrowed User</th>
                                    <th data-priority="3">Book Author</th>
                                    <th data-priority="3">Time Period</th>
                                   <th data-priority="3">Barrowed Date</th>
                                   
                                </tr>
                                </thead>
                                <tbody>
                                   <?php
                                        foreach ($res_list[0] as $res) {
                                            
                                            echo '
                                                <tr>
                                                     <th><span>'.$res['book_id'].'</span></th>
                                                    <th><span>'.$res['book_title'].'</span></th>
                                                      <th><span>'.$res['first_name'].'</span></th>
                                                      <th><span>'.$res['book_author'].'</span></th>
                                                      <th><span>'.$res['time_period'].' Days</span></th>
                                                      <th><span>'.$res['date'].'</span></th>
                                                      
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