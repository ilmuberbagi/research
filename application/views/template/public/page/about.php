<div class="container">
	<div class="row">
		<div class="col-md-8">
			<?php if($this->uri->segment(1) == "about"){?>
				<?php if($this->uri->segment(2) == "research-centers"){?>
					<div class="page-header"><h4>Research Centers</h4></div>
					<?php echo $info[0]['research_centers']; ?>

				<?php }else if($this->uri->segment(2) == "research-groups"){?>
					<div class="page-header"><h4>Research Groups</h4></div>
					<?php echo $info[0]['research_groups']; ?>

				<?php }else if($this->uri->segment(2) == "researchers"){?>
					<div class="page-header"><h4>Researchers</h4></div>
					<?php echo $info[0]['researchers']; ?>
				<?php }else{?>
					<div class="page-header">
						<h4>Profil Unit Riset dan Pengembangan Masyarakat FTUI</h4>
					</div>
					<?php echo $info[0]['about']; ?>
					<div class="page-header">
						<h4>Visi &amp; Misi</h4>
					</div>
					<?php echo $info[0]['vision']; ?>
					<?php echo $info[0]['mission']; ?>
					<div class="page-header">
						<h4>Struktur Organisasi</h4>
					</div>
					<?php echo $info[0]['structure']; ?>
				<?php }?>
			<?php }else if($this->uri->segment(1) == "service"){?>
				<div class="page-header">
					<h4>Services</h4>
				</div>
				<?php echo $info[0]['service'] ? $info[0]['service']:'Description about service'; ?>
			<?php }else{?>
			<div class="page-header">
				<h4>Data and Statistics</h4>
				</div>
				<?php echo $info[0]['statistics'] ? $info[0]['statistics']:'Description about Data and statistics'; ?>
			<?php } ?>
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
