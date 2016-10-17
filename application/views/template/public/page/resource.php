<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="page-header">
				<h4>Resources</h4>
			</div>

			<table class="table table-bordered table-striped">
				<tr>
					<th>No.</th>
					<th>Title</th>
					<th>View</th>
					<th>Download</th>
				</tr>
				<?php if(!empty($resources)){ $no=0; foreach($resources as $r){ $no++; ?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $r['resource_title'];?></td>
					<td align="right"><?php echo number_format($r['viewed']);?></td>
					<td align="center"><a target="_blank" href="<?php echo site_url().'download/resource/'.$r['resource_id'];?>"><i class="fa fa-download"></i></a></td>
				</tr>
				<?php }}else{?>
				<tr><td colspan="4">Belum ada data yang dapat ditampilkan.</td></tr>
				<?php } ?>
			</table>
		</div>
		
		<div class="col-md-4 sidebar">
			<!-- search box -->
			<div class="row">
				<div class="list-group">
					<div class="list-group-item">
						<form action="<?php echo site_url().'search';?>" method="GET">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Type something.." name="key">
								<span class="input-group-btn" id="basic-addon2">
									<button class="btn btn-warning" type="button"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			<div class="row">
				<br/>
				<div class="list-group-item title"><i class="fa fa-lock"></i> LOGIN</div>
				<div class="list-group-item">
					<div class="list-group-item">
						<form method="POST" action="<?php echo site_url().'login/auth/home';?>">
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" class="form-control" placeholder="Username">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control" placeholder="Password">
							</div>
							<div class="form-action">
								<input type="submit" name="submit" class="btn btn-block btn-warning" value="Login">
							</div>
						</form>
					</div>
				</div>
			</div>		
		</div>
		
	</div>
</div>
