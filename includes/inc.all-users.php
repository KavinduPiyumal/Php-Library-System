<div class="dashboard-caption col-lg-9 col-md-4">
<?php $res_list = getApprovedUsers($conn); ?>


  
        <div class="dashboard-caption-header">
                <h4><i class="fa fa-user" aria-hidden="true"></i>All Users</h4>
            </div>

                 <div class="table-responsive mb-0"  data-pattern="priority-columns">
                        <table class="table  table-striped">
                            <thead>
                                <tr>
                                    <th>User id</th>
                                    <th data-priority="3">First Name</th>
                                    <th data-priority="3">Last Name</th>
                                    <th data-priority="3">User Email</th>
                                    <th data-priority="3">Approve State</th>
                                    <th data-priority="6">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                      <?php
                                        foreach ($res_list[0] as $res) {
                                             if($res['is_valid']==1){
                                                 $checked = "checked";
                                           }else{
                                                $checked = "";
                                           }
                                            echo '
                                                <tr>
                                                    <th><span>'.$res['user_id'].'</span></th>
                                                    <th><span>'.$res['first_name'].'</span></th>
                                                     <th><span>'.$res['last_name'].'</span></th>
                                                      <th><span>'.$res['user_email'].'</span></th>
                                                      <td><span><input type="checkbox" class="seekeractivecheck" id="'.$res['user_id'].'" name="" value="'.$res['user_id'].'" '.$checked.'></span></td>
                                                    <td>
                                                        <a href="admin-dashboard.php?menu=edit-user&id='.$res['user_id'].'" class="btn btn-warning">Edit</a>

                                                        <a href="admin-dashboard.php?menu=delete-user&id='.$res['user_id'].'" class="btn btn-danger">Delete</a>
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



