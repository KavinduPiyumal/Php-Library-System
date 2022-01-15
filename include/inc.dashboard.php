


<div class="dashboard-caption col-lg-9 col-md-4">
			
			<div class="dashboard-caption-header">
				<h4><i class="fas fa-th-large"></i>User Dashboard</h4>
			</div>
			
			<div class="dashboard-caption-wrap">
			
				<!-- Overview -->
				<div class="row custom-row">
					<div class="col-lg-3 col-md-6 col-sm-12 custom-md-6">
						<div class="dashboard-stat widget-1">
							<div class="dashboard-stat-content"><h4><?php echo getBooksCounts($conn); ?></h4> <span>All Books</span></div>
							<div class="dashboard-stat-icon"><i class="fa fa-book" aria-hidden="true"></i></div>
						</div>	
					</div>
					
					<div class="col-lg-3 col-md-6 col-sm-12 custom-md-6">
						<div class="dashboard-stat widget-2">
							<div class="dashboard-stat-content"><h4><?php echo getBorrowBooksCounts($conn); ?></h4> <span>Books Borrowed</span></div>
							<div class="dashboard-stat-icon"><i class="fa fa-bookmark" aria-hidden="true"></i></div>
						</div>	
					</div>
					
				
			</div>
			
		</div>