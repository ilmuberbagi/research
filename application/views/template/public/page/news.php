<?php if($this->uri->segment(2)== "read" ){?>

	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="page-header">
					<h3><?php echo $news[0]['news_title']; ?></h3>
				</div>
				<p class="text-muted"><i class="fa fa-calendar"></i> <?php echo date('d/m/Y', strtotime($news[0]['last_updated'])); ?> <i class="fa fa-clock-o"></i> <?php echo date('H:i', strtotime($news[0]['date_posted']));?> Authored By: Administrator</p>
				<?php echo $news[0]['news_content']; ?>
			</div>
		
			<!-- popular news -->
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
					<div class="list-group">
						<a href="#" class="list-group-item title"><i class="fa fa-newspaper-o"></i> Popular News</a>
						<?php if(!empty($popular)){ foreach ($popular as $on) {?>				
							<a href="<?php echo site_url("news/read/".$on['news_id'].'/'.gen_url($on['news_title'])); ?>" class="list-group-item">
								<div class="img-thumb-list" style="background-image:url('<?php echo $on['thumbnail_url'];?>')"></div>
								<?php echo $on['news_title']; ?>
							</a>
						<?php }} ?>				
					</div>
				</div>			
			</div>
		</div>
		<hr/>
		
		<div class="row">
			<div class="col-md-8">
				<h5 class="text-warning">Other News</h5>
				<div class="list-group">
				<?php if(!empty($other_news)){ foreach ($other_news as $on) {?>				
				<a href="<?php echo site_url("news/read/".$on['news_id'].'/'.gen_url($on['news_title'])); ?>" class="list-group-item">
					<i class="fa fa-arrow-circle-right"></i> <?php echo $on['news_title']; ?>
				</a>
				<?php }} ?>				
				</div>
			</div>
		</div>
	</div>

<?php }else{?>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="page-header">
					<?php if($this->uri->segment(1) == 'news'){ $url = 'news'?>
						<h4><i class="fa fa-newspaper-o"></i> News</h4>
					<?php }else if($this->uri->segment(1) == 'grant'){ $url = 'grant'?>
						<h4><i class="fa fa-newspaper-o"></i> Grant and Incentives</h4>
					<?php }else{ $url = 'conferences'?>
						<h4><i class="fa fa-newspaper-o"></i> Conferences and Seminars</h4>
					<?php } ?>
				</div>
				<?php if(!empty($news)){ foreach($news as $n){ ?>
					<div class="media">
						<div class="media-body">
							<h4 class="media-heading"><?php echo $n['news_title'];?></h4>
							<p class="text-muted timestamp-news"><i class="fa fa-calendar"></i> <?php echo date('d/m/Y', strtotime($n['last_updated']));?> <i class="fa fa-clock-o"></i> <?php echo date('H:i', strtotime($n['last_updated']));?> Authored By: Administrator</p>
							
							<div class="img-thumb-list-2" style="background-image:url('<?php echo $n['thumbnail_url'];?>')"></div>							
							<?php echo substr(strip_tags($n['news_content']), 0, 300); ?>
							<br>
							<a href="<?php echo site_url($url."/read/".$n['news_id'].'/'.gen_url($n['news_title'])); ?>"><b>read more...</b></a>	
						</div>
					</div>
					<hr/>
				<?php } ?>
				<?php echo $paging;?>
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
<?php } ?>