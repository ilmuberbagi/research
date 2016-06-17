	<header class="main-header">
		<a href="index2.html" class="logo">
			<span class="logo-mini"><b>FTUI</b></span>
			<span class="logo-lg"><b>Research </b>FTUI</span>
		</a>
		<nav class="navbar navbar-static-top" role="navigation">
			<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>
          
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
				
					<li class="dropdown messages-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o"></i><span class="label label-success">0</span></a>
						<ul class="dropdown-menu">
							<li class="header">Belum ada pesan masuk</li>
							<li class="footer"><a href="#">Lihat semua pesan</a></li>
						</ul>
					</li>

					<li class="dropdown notifications-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-users"></i>
							<span class="label label-warning">0</span>
						</a>
						<ul class="dropdown-menu">
							<li class="header">Belum ada member baru</li>
							<li class="footer"><a href="#">Lihat semua member</a></li>
						</ul>
					</li>
					
					<li class="dropdown tasks-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-flag-o"></i>
							<span class="label label-danger">0</span>
						</a>
						<ul class="dropdown-menu">
							<li class="header">Belum ada artikel baru</li>
							<li class="footer"><a href="#">Lihat semua artikel</a></li>
						</ul>
					</li>

					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img class="user-image" src="<?php echo set_image($this->session->userdata('avatar'));?>" alt="">
							<span class="hidden-xs"><?php echo $this->session->userdata('name');?></span>
						</a>
						<ul class="dropdown-menu">
							<li class="user-header">
								<img class="img-circle link" src="<?php echo set_image($this->session->userdata('avatar'));?>" data-toggle="modal" data-target="#modalProfile" style=" cursor:pointer">
								<p><?php echo $this->session->userdata('name').'<small>Last Login : '.date('d/m/Y H:i', strtotime($this->session->userdata('last_login'))).'</small>';?></p>
							</li>
							<li class="user-body">
								<a href="<?php echo base_url().'dashboard/edit/password';?>" class="btn"><i class="fa fa-key"></i> Change Password</a>
							</li>
							<li class="user-footer">
								<div class="pull-left"><a href="<?php echo base_url().'dashboard/profile';?>" class="btn btn-default btn-flat">Profile</a></div>
								<div class="pull-right"><a href="<?php echo base_url().'login/signout';?>" class="btn btn-default btn-flat">Sign out</a></div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- modal profile -->
	<div class="modal inmodal" id="modalProfile" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content animated bounceInDown">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true"><i class="fa fa-remove"></i></span><span class="sr-only">Close</span></button>
					<img class="img-circle link" src="<?php echo set_image($this->session->userdata('avatar'));?>"  style="max-width:100px;">
					<h4 class="modal-title">Change Photo</h4>
					<div>Change profile photo</div>
				</div>
				<form name="formdelete" action="<?php echo base_url().'dashboard/update/avatar';?>" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label>Choose image</label>
						<input type="file" name="userfile" class="btn btn-default" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="reset" name="reset" value="Cancel" class="btn btn-white" data-dismiss="modal">
					<input type="submit" name="move" value="Update" class="btn btn-success action">
				</div>
				</form>
			</div>	
		</div>
	</div>

	<?php $this->load->view('template/inc/menu');?>
