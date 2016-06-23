<aside class="main-sidebar">
		<section class="sidebar">
			<div class="user-panel">
				<div class="pull-left image">
					<img class="img-circle" src="<?php echo set_image($this->session->userdata('avatar'));?>" alt="">
				</div>
				<div class="pull-right info">
					<p><?php echo $this->session->userdata('name');?></p>
					<p></p><i class="fa fa-circle text-success"></i> <?php echo $this->session->userdata('status');?><p></p>
				</div>
			</div>
			
			<!-- search form (Optional) -->
			<form action="#" method="get" class="sidebar-form">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
						<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>
			
			<!-- Sidebar Menu -->
			<ul class="sidebar-menu">
				<li class="header">MAIN MENU</li>
				<li class="<?php echo $this->uri->segment(2) == ''? 'active':'';?>"><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
				
				<li class="treeview <?php echo $this->uri->segment(2) == 'news' || $this->uri->segment(2) == 'slideshow'|| $this->uri->segment(2) == 'about'|| $this->uri->segment(2) == 'contact'? 'active':'';?>">
					<a href="#"><i class="fa fa-globe"></i> <span>Web CMS</span> <i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url().'dashboard/information#about';?>"><i class="fa fa-arrow-circle-right"></i> About</a></li>
						<li><a href="<?php echo base_url().'dashboard/information#contact';?>"><i class="fa fa-arrow-circle-right"></i>  Contact</a></li>
						<li><a href="<?php echo base_url().'dashboard/news';?>"><i class="fa fa-arrow-circle-right"></i>  Post/News</a></li>
						<li><a href="<?php echo base_url().'dashboard/slideshow';?>"><i class="fa fa-arrow-circle-right"></i>  Slide Show</i></a></li>
					</ul>
				</li>
				<li class="treeview <?php echo $this->uri->segment(2) == 'research'? 'active':'';?>">
					<a href="#"><i class="fa fa-book"></i> <span>Research Database</span> <i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url().'dashboard/research/video';?>"><i class="fa fa-arrow-circle-right"></i> Research Video</a></li>
						<li><a href="<?php echo base_url().'dashboard/research/data';?>"><i class="fa fa-arrow-circle-right"></i>  Research Data</a></li>
						<li><a href="#"><i class="fa fa-arrow-circle-right"></i>  Grant Proposal</i></a></li>
					</ul>
				</li>
				
				<li><a href="#"><i class="fa fa-user"></i> <span>Account Management</span></a></li>
				<li><a href="<?php echo site_url().'dashboard/resources';?>"><i class="fa fa-file"></i> <span>File Management</span></a></li>
			</ul>
        </section>
	</aside>
	<?php #print_r($this->session->all_userdata());?>
