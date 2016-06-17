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
			<div class="col-md-12">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#about" data-toggle="tab">About</a></li>
						<li><a href="#visimisi" data-toggle="tab">Vision & Mission</a></li>
						<li><a href="#organization" data-toggle="tab">Organization Structure</a></li>
						<li><a href="#contact" data-toggle="tab">Contact</a></li>
					</ul>
					<div class="tab-content">
						<!-- about -->
						<div class="active tab-pane" id="about">
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
						<div class="tab-pane" id="visimisi">  
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

						<div class="tab-pane" id="organization">
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

						<div class="tab-pane" id="contact">
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
					</div>
				</div>
			</div>
			</form>
		</div>
	</section>
</div>