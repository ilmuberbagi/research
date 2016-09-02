		<div class="container">
			<div class="row">
				<div class="col-md-3 logo">
					<img src="<?php echo base_url().'assets/public/img/logo-ftui.jpg';?>" class="img-responsive" alt="logo-ftui">
				</div>
				<div class="col-md-9" align="right">
					<img src="<?php echo base_url().'assets/public/img/rce.jpg';?>" class="img-responsive" alt="rpm-ftui">
				</div>
			</div>
		</div>
		
		<nav class="navbar navbar-default navbar-static-top">
			<div class="container" align="center">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="<?php echo $this->uri->segment(1) ? '':'active';?>"><a href="<?php echo base_url();?>">Home</a></li>
						<li class="<?php echo $this->uri->segment(1) == 'about' && $this->uri->segment(2) == "" ? 'active':'';?>"><a href="<?php echo base_url().'about';?>">About</a></li>
						<li class="<?php echo $this->uri->segment(1) == 'news'? 'active':'';?>"><a href="<?php echo base_url().'news';?>">News</a></li>
						<li class="dropdown <?php echo ($this->uri->segment(1) == 'about' && in_array($this->uri->segment(2), array('research-centers','research-groups'))) ||  $this->uri->segment(1) == 'researchers' ? 'active':'';?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Research Profiles <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo site_url().'about/research-centers';?>">Research Centers</a></li>
								<li><a href="<?php echo site_url().'about/research-groups';?>">Research Groups</a></li>
								<li><a href="<?php echo site_url().'researchers';?>">Researchers</a></li>
							</ul>
						</li>
						<li class="<?php echo $this->uri->segment(1) == 'grant'? 'active':'';?>"><a href="<?php echo site_url().'grant';?>">Grants and Incentives</a></li>
						
						<li class="<?php echo $this->uri->segment(1) == 'conferences'? 'active':'';?>"><a href="<?php echo site_url().'conferences';?>">Conferences/Seminars</a></li>
						
						<li class="dropdown <?php echo $this->uri->segment(1) == 'statistics' || $this->uri->segment(1) == 'research' ? 'active':'';?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Data <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo site_url().'research/publication';?>">List of Publications</a></li>
								<li><a href="<?php echo site_url().'research/grant';?>">List of Grants</a></li>
								<li><a href="<?php echo site_url().'statistics';?>">Statistics</a></li>
							</ul>
						</li>
						
						
						</li>
						<li class="<?php echo $this->uri->segment(1) == 'service'? 'active':'';?>"><a href="<?php echo site_url().'service';?>">Services</a></li>
						<li class="<?php echo $this->uri->segment(1) == 'resources'? 'active':'';?>"><a href="<?php echo site_url().'resources';?>">Resources</a></li>
						<li class="<?php echo $this->uri->segment(1) == 'contact'? 'active':'';?>"><a href="<?php echo base_url().'contact';?>">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</nav>
