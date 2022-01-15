
<div class="col-lg-3 col-md-4">
	<div class="side-dashboard dashboard-menu-btn-click">
		
		<div class="dashboard-avatar ">
		
			<div class="dashboard-avatar-thumb">
				<i class="fa fa-user" aria-hidden="true"></i>
			</div>
			
			<div class="dashboard-avatar-text">
					<?php $user = getUserInfoByid($conn, $_SESSION['user_id']);
						echo "<h4>".$user['first_name']."</h4>";
						echo "<p>".$user['user_email']."</p>";
					?>
			</div>
			
		</div>
		
		<?php 
			if(isset($_GET['menu'])){
				$menu=$_GET['menu'];
			}
			
			?>
		<div class="emp-dashboard-menu-btn dashboard-menu-btn hide"><i class="fa fa-bars" aria-hidden="true"></i><span>MENU</span></div>
		<div class="dashboard-menu">
			<ul>
				<li class="<?php if($menu=='dashboard'){ echo "active"; } ?>"><a href="dashboard.php?menu=dashboard"><i class="fas fa-th-large"></i>Dashboard</a></li>
				<li class="<?php if($menu=='books'){ echo "active"; } ?>"><a href="dashboard.php?menu=books"><i class="fa fa-book" aria-hidden="true"></i>All Books</a></li>
				<li class="<?php if($menu=='borrow-book'){ echo "active"; } ?>"><a href="dashboard.php?menu=borrow-book"><i class="fa fa-bookmark" aria-hidden="true"></i>Borrowed Books</a></li>
				<li class="<?php if($menu=='logout.php'){ echo "active"; } ?>"><a href="./logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
			</ul>
			
		</div>
	</div>
</div>



