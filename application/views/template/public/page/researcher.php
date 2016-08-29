<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="page-header">
				<h4>Researchers</h4>
				<div class="btn-group pull-right">
					<button type="button" class="btn btn-default">Sort By</button>
					<button aria-expanded="false" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
						<span class="sr-only">Toggle Dropdown</span>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li><a href="<?php echo site_url().'researchers?sort=name';?>">Name</a></li>
						<li><a href="<?php echo site_url().'researchers?sort=department';?>">Department</a></li>
					</ul>
				</div>
			</div>
			
			<?php if(!empty($result)){ foreach ($result as $r){?>
				<div class="col-md-6">
					<table style="width:100%; margin-bottom:50px; padding:10px">
						<tr><td rowspan="4" valign="top" width="75"><img src="<?php echo $r['avatar']?$r['avatar']:site_url().'assets/img/user.jpg';?>" width="60" class="img-responsive img">
						<a href="#" data-toggle="modal" data-target="#modalProfile" onclick="return profile_preview('<?php echo $r['name'].'`'.$r['profile'];?>)" class="btn btn-xs btn-warning">Profile</a>
						</td><th width="100">Name</th><td><?php echo $r['name'];?></td></tr>
						<tr><th>Department</th><td><?php echo $r['department_name'];?></td></tr>
						<tr><th>Expertise</th><td><?php echo $r['research_interest'];?></td></tr>
						<tr><th>Research Interest</th><td><?php echo $r['research_interest'];?></td></tr>
					</table>
				</div>
			<?php }}else{ echo "No Researchers registered.";}?>
			<br/>
		</div>
		
		<div class="col-md-4 sidebar">
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

<div class="modal fade" tabindex="-1" role="dialog" id="modalProfile">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="titleProfile"></h4>
      </div>
      <div class="modal-body" id="contentProfile">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
