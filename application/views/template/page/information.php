<div class="content-wrapper">
	<section class="content-header">
		<h1>Page Info <small>About Research Page</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Information</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			
			<form method="POST" action="<?php echo site_url().'dashboard/update/information';?>">
			<input type="hidden" name="id" value="<?php echo $info[0]['id'];?>">
			<input type="hidden" name="page" value="<?php echo current_url();?>">
			<input type="hidden" name="tab" value="<?php echo $_GET['tab'];?>">
			<div class="col-md-12">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="<?php echo $_GET['tab'] == 'about' ? 'active':'';?>"><a href="#about" data-toggle="tab">About</a></li>
						<li class="<?php echo $_GET['tab'] == 'visimisi' ? 'active':'';?>"><a href="#visimisi" data-toggle="tab">Vision & Mission</a></li>
						<li class="<?php echo $_GET['tab'] == 'organization' ? 'active':'';?>"><a href="#organization" data-toggle="tab">Organization Structure</a></li>
						<li class="<?php echo $_GET['tab'] == 'services' ? 'active':'';?>"><a href="#service" data-toggle="tab">Services</a></li>
						<li class="<?php echo $_GET['tab'] == 'contact' ? 'active':'';?>"><a href="#contact" data-toggle="tab">Contact</a></li>
						<li class="<?php echo $_GET['tab'] == 'rcenters' ? 'active':'';?>"><a href="#rcenters" data-toggle="tab">Research Centers</a></li>
						<li class="<?php echo $_GET['tab'] == 'rgroups' ? 'active':'';?>"><a href="#rgroups" data-toggle="tab">Research Groups</a></li>
						<li class="<?php echo $_GET['tab'] == 'statistics' ? 'active':'';?>"><a href="#statistics" data-toggle="tab">Data and Statistics</a></li>
					</ul>
					<div class="tab-content">
						<!-- about -->
						<div class="tab-pane <?php echo $_GET['tab'] == 'about' ? 'active':'';?>" id="about">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<textarea name="about" class="form-control description">
										<?php echo $info[0]['about'];?></textarea>
									</div>
									<div class="form-action">
										<input type="submit" class="btn btn-primary" value="Save" name="submit">
									</div>
								</div>
							</div>
						</div>

						<!-- visimisi -->
						<div class="tab-pane <?php echo $_GET['tab'] == 'visimisi' ? 'active':'';?>" id="visimisi">  
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<textarea name="vision" class="form-control description">
										<?php echo $info[0]['vision'];?></textarea>
									</div>
									<div class="form-action">
										<input type="submit" class="btn btn-primary" value="Save" name="submit">
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane <?php echo $_GET['tab'] == 'organization' ? 'active':'';?>" id="organization">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<textarea name="structure" class="form-control description">
										<?php echo $info[0]['structure'];?></textarea>
									</div>
									<div class="form-action">
										<input type="submit" class="btn btn-primary" value="Save" name="submit">
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane <?php echo $_GET['tab'] == 'services' ? 'active':'';?>" id="service">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<textarea name="service" class="form-control description">
										<?php echo $info[0]['service'];?></textarea>
									</div>
									<div class="form-action">
										<input type="submit" class="btn btn-primary" value="Save" name="submit">
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane <?php echo $_GET['tab'] == 'contact' ? 'active':'';?>" id="contact">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<textarea name="contact" class="form-control description">
										<?php echo $info[0]['contact'];?></textarea>
									</div>
									<div class="form-action">
										<input type="submit" class="btn btn-primary" value="Save" name="submit">
									</div>
								</div>
							</div>
						</div>
						
						<div class="tab-pane <?php echo $_GET['tab'] == 'rcenters' ? 'active':'';?>" id="rcenters">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<textarea name="research_centers" class="form-control description">
										<?php echo $info[0]['research_centers'];?></textarea>
									</div>
									<div class="form-action">
										<input type="submit" class="btn btn-primary" value="Save" name="submit">
									</div>
								</div>
							</div>
						</div>
						
						<div class="tab-pane <?php echo $_GET['tab'] == 'rgroups' ? 'active':'';?>" id="rgroups">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<textarea name="research_groups" class="form-control description">
										<?php echo $info[0]['research_groups'];?></textarea>
									</div>
									<div class="form-action">
										<input type="submit" class="btn btn-primary" value="Save" name="submit">
									</div>
								</div>
							</div>
						</div>
						
						<div class="tab-pane <?php echo $_GET['tab'] == 'statistics' ? 'active':'';?>" id="statistics">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<textarea name="statistics" class="form-control description">
										<?php echo $info[0]['statistics'];?></textarea>
									</div>
									<div class="form-action">
										<input type="submit" class="btn btn-primary" value="Save" name="submit">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
	</section>
</div>