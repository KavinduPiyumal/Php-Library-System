
<div class="col-lg-3 col-md-4">
	<div class="side-dashboard">
		
		<div class="dashboard-avatar">
		
			<div class="dashboard-avatar-thumb">
				<i class="fa fa-key" aria-hidden="true"></i>
			</div>
			
			<div class="dashboard-avatar-text">

					<?php $user = getAdminInfoByid($conn, $_SESSION['admin_id']);
						echo "<h4>".$user['firstname']."</h4>";
					?>
					<p style="text-transform:none;">Admin Menu</p>
			</div>
			
		</div>
		
		<?php 
			if(isset($_GET['menu'])){
				$menu=$_GET['menu'];
			}
			
			?>
		<div class="dashboard-menu">
			<ul>
				<li class="<?php if($menu=='dashboard'){ echo "active"; } ?>"><a href="admin-dashboard.php?menu=dashboard"><i class="fas fa-th-large"></i>Dashboard</a></li>
				<li class="<?php if($menu=='add-user'){ echo "active"; } ?>"><a href="admin-dashboard.php?menu=add-user"><i class="fa fa-user-plus" aria-hidden="true" style="margin-right: 10px;"></i>Add User</a></li>
				<li class="<?php if($menu=='all-users'){ echo "active"; } ?>"><a href="admin-dashboard.php?menu=all-users"><i class="fa fa-user" aria-hidden="true"></i>All Users</a></li>
				<li class="<?php if($menu=='pending-users'){ echo "active"; } ?>"><a href="admin-dashboard.php?menu=pending-users"><i class="fa fa-hourglass-start" aria-hidden="true"></i>Pending Users</a></li>
				<li class="<?php if($menu=='add-book'){ echo "active"; } ?>"><a href="admin-dashboard.php?menu=add-book"><i class="fa fa-plus-square" aria-hidden="true"></i>Add Book</a></li>
				<li class="<?php if($menu=='all-books'){ echo "active"; } ?>"><a href="admin-dashboard.php?menu=all-books"><i class="fa fa-book" aria-hidden="true"></i>All Books</a></li>
				<li class="<?php if($menu=='borrowed-books'){ echo "active"; } ?>"><a href="admin-dashboard.php?menu=borrowed-books"><i class="fa fa-bookmark" aria-hidden="true"></i>Borrowed Books</a></li>
				<li class="<?php if($menu=='logout.php'){ echo "active"; } ?>"><a href="./logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
			</ul>
			
		</div>
	</div>
</div>