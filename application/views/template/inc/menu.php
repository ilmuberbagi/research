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
				<li class="<?php echo $this->uri->segment(2) == '' && $this->uri->segment(1) == 'dashboard'? 'active':'';?>"><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
				
				<?php if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2){?>
					<li class="treeview <?php echo $this->uri->segment(2) == 'slideshow'|| $this->uri->segment(2) == 'information' ? 'active':'';?>">
						<a href="#"><i class="fa fa-globe"></i> <span>Web CMS</span> <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url().'dashboard/information?tab=about';?>"><i class="fa fa-arrow-circle-right"></i> About</a></li>
							<li><a href="<?php echo base_url().'dashboard/information?tab=visimisi';?>"><i class="fa fa-arrow-circle-right"></i>  Visi & Misi</a></li>
							<li><a href="<?php echo base_url().'dashboard/information?tab=organization';?>"><i class="fa fa-arrow-circle-right"></i>  Organization</a></li>
							<li><a href="<?php echo base_url().'dashboard/information?tab=services';?>"><i class="fa fa-arrow-circle-right"></i>  Services</a></li>
							<li><a href="<?php echo base_url().'dashboard/information?tab=contact';?>"><i class="fa fa-arrow-circle-right"></i>  Contact</a></li>
							<li><a href="<?php echo base_url().'dashboard/information?tab=rcenters';?>"><i class="fa fa-arrow-circle-right"></i>  Research Centers</a></li>
							<li><a href="<?php echo base_url().'dashboard/information?tab=rgroups';?>"><i class="fa fa-arrow-circle-right"></i>  Research Groups</a></li>
							<li><a href="<?php echo base_url().'dashboard/information?tab=statistics';?>"><i class="fa fa-arrow-circle-right"></i>  Data and Statistics</a></li>
							<li><a href="<?php echo base_url().'dashboard/slideshow';?>"><i class="fa fa-arrow-circle-right"></i>  Slide Show</i></a></li>
						</ul>
					</li>
					
					<li class="<?php echo $this->uri->segment(2) == 'news'? 'active':'';?>"><a href="<?php echo site_url().'dashboard/news';?>"><i class="fa fa-users"></i> <span>Post/News</span></a></li>
					
					<li class="treeview <?php echo $this->uri->segment(2) == 'research' || $this->uri->segment(1) == 'publication' || $this->uri->segment(1) == 'grants' ? 'active':'';?>">
						<a href="#"><i class="fa fa-book"></i> <span>Research Database</span> <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url().'grants';?>"><i class="fa fa-arrow-circle-right"></i>  Grant</a></li>
							<li><a href="<?php echo base_url().'publication';?>"><i class="fa fa-arrow-circle-right"></i>  Publication</a></li>
							<li></li>
							<li><a href="<?php echo base_url().'grants/action/input';?>"><i class="fa fa-arrow-circle-right"></i>  Input Grant</a></li>
							<li><a href="<?php echo base_url().'publication/action/input';?>"><i class="fa fa-arrow-circle-right"></i>  Input Publication</a></li>
							<li></li>
							<li><a href="<?php echo base_url().'dashboard/research/video';?>"><i class="fa fa-arrow-circle-right"></i> Research Video</a></li>
						</ul>
					</li>
					
					
					<li class="<?php echo $this->uri->segment(2) == 'account'? 'active':'';?>"><a href="<?php echo site_url().'dashboard/account';?>"><i class="fa fa-users"></i> <span>Account Management</span></a></li>
					<li class="<?php echo $this->uri->segment(2) == 'resources'? 'active':'';?>"><a href="<?php echo site_url().'dashboard/resources';?>"><i class="fa fa-file"></i> <span>File Management</span></a></li>
				<?php }else{?>

					<li class="<?php echo $this->uri->segment(2) == 'profile' && $this->uri->segment(1) == 'dashboard'? 'active':'';?>"><a href="<?php echo base_url().'dashboard/profile';?>"><i class="fa fa-user"></i> <span>Profile</span></a></li>
					<!-- publication -->
					<li class="treeview <?php echo $this->uri->segment(1) == 'publication'? 'active':'';?>">
						<a href="#"><i class="fa fa-book"></i> <span>Publication</span> <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url().'publication';?>"><i class="fa fa-arrow-circle-right"></i> Publication Data</a></li>
							<li><a href="<?php echo base_url().'publication/action/input';?>"><i class="fa fa-arrow-circle-right"></i> Input Data</a></li>
							<li><a href="<?php echo base_url().'publication/action/import';?>"><i class="fa fa-arrow-circle-right"></i> Import Data</a></li>
						</ul>
					</li>
					<li class="treeview <?php echo $this->uri->segment(1) == 'grants'? 'active':'';?>">
						<a href="#"><i class="fa fa-book"></i> <span>Grant</span> <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url().'grants';?>"><i class="fa fa-arrow-circle-right"></i> Grant Data</a></li>
							<li><a href="<?php echo base_url().'grants/action/input';?>"><i class="fa fa-arrow-circle-right"></i> Input Data</a></li>
							<li><a href="<?php echo base_url().'grants/action/import';?>"><i class="fa fa-arrow-circle-right"></i> Import Data</a></li>
						</ul>
					</li>
				<?php } ?>
			</ul>
        </section>
	</aside>
	<?php #print_r($this->session->all_userdata());?>
