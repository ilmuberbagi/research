		<div class="container">
			<div class="row">
				<div class="col-md-3 logo">
					<img src="<?php echo base_url().'assets/public/img/logo-ftui.jpg';?>" class="img-responsive">
				</div>
				<div class="col-md-8" align="right">
					<h3>Research and Community Engagement</h3>
					<h4>Faculty of Engineering Universitas Indonesia</h4>
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
						<li class="<?php echo $this->uri->segment(1) == 'about'? 'active':'';?>"><a href="<?php echo base_url().'about';?>">About</a></li>
						<li class="<?php echo $this->uri->segment(1) == 'news'? 'active':'';?>"><a href="<?php echo base_url().'news';?>">News</a></li>
						<li class="dropdown ">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Research Centers <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="http://www.uitrec.com/"><b>TREC </b>(Tropical Renewable Energy Center)</a></li>
								<li><a href="http://www.csidui.org/"><b>CSID </b>(Center for Sustainable Infrastructure Development)</a></li>
								<li><a href="#"><b>RCBE </b>(Research Center for Biomedical Engineering)</a></li>
								<li class="divider"></li>
								<li><a href="#">All Research Centers / Group</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Research Data <span class="caret"></span></a>
							<ul class="dropdown-menu multi-level">
								<li class="dropdown-submenu">
									<a href="#" tabindex="-1">By Field/Major</a>
									<ul class="dropdown-menu">
										<li><a href="#">Civil & Environmental</a></li>
										<li><a href="#">Mechanical & Naval</a></li>
										<li><a href="#">Electrical & Computer</a></li>
										<li><a href="#">Metallurgical & Material</a></li>
										<li><a href="#">Architecture & Interior Design</a></li>
										<li><a href="#">Chemical & Bioproccess</a></li>
										<li><a href="#">Industrial</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a href="#" tabindex="-1">By Education Level</a>
									<ul class="dropdown-menu">
										<li><a href="#">Undergraduate</a></li>
										<li><a href="#">Graduate</a></li>
										<li><a href="#">Doctorate</a></li>
									</ul>
								</li>
								<li role="presentation" class="divider"></li>
								<li><a href="#">Research Database Portal</a></li>
							</ul>
						</li>
						<li class=""><a href="#">Grants and Incentives</a></li>
						<li class=""><a href="#">Conferences/Seminars</a></li>
						<li class=""><a href="#">Data and Statistic</a></li>
						<li class=""><a href="#">Services</a></li>
						<li class=""><a href="<?php echo base_url().'contact';?>">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</nav>
