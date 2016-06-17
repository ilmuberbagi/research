		<div class="row">
			<div class="col-md-12">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner" role="listbox">
						<?php if(!empty($slideshow)){ $no=0; foreach ($slideshow as $slide){ $no++;?>
						<div class="item <?php echo $no==1? 'active':'';?>">
							<img src="<?php echo $slide['img_url'];?>" alt="">
							<div class="carousel-caption">
								<h3><?php echo $slide['caption_title'];?></h3>
								<p><?php echo $slide['caption_text'];?></p>
							</div>
						</div>
						<?php }}?>
					</div>
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
				</div>
			</div>
		</div>

		<!-- content -->
		<div class="container">
			<div class="col-md-8">
				<div class="row">
					<div class="page-header">
						<h3><i class="fa fa-newspaper-o"></i> Recent News</h3>
					</div>
					<div class="row">
						<?php if(!empty($news)){ foreach($news as $n){?>
						<div class="col-md-6">
							<div class="thumbnail">
								<!-- img src="<?php echo $n['thumbnail_url'];?>" -->
								<div class="img-thumb-bg" style="background-image:url('<?php echo $n['thumbnail_url'];?>')"></div>
								<div class="caption">
									<a href="<?php echo site_url().'news/read/'.$n['news_id'];?>">
									<h4><?php echo $n['news_title'];?></h4></a>
									<p class="text-muted timestamp-home">
										<i class="fa fa-calendar"></i> <?php echo date('d/m/Y', strtotime($n['date_posted']));?>
										<i class="fa fa-clock-o"></i> <?php echo date('H:i', strtotime($n['date_posted']));?></p>
									<p><?php echo substr(strip_tags($n['news_content']), 0, 150);?></p>
									<p>
										<a href="<?php echo site_url().'news/read/'.$n['news_id'];?>">Read more...</a>
									</p>
								</div>
							</div>
						</div>
						<?php }}else{?>
						<strong>Belum ada berita yang dapat ditampilkan...</strong>
						<?php } ?>
					</div>
					<div class="row" align="center">
						<a class="btn btn-primary btn-lg" role="button" href="<?php echo site_url().'news';?>">All News</a>
					</div>
				</div>
			</div>
			<div class="col-md-4 right-column-home">
				<div class="row">
					<div class="page-header">
						<h4><i class="fa fa-video-camera"></i> Researcher Profiles</h4>
					</div>
					<?php if(!empty($video)){ foreach($video as $v){?>
					<div class="embed-responsive embed-responsive-16by9">
						<iframe id="youtube-home" class="embed-responsive-item" src="<?php echo $v['video_url'];?>" frameborder="0" allowfullscreen></iframe>
					</div><br/>
					<?php }}else{?>
						<strong>Belum ada video yang dapat ditampilkan...</strong>
					<?php } ?>
				</div>
				<div class="row" id="login">
					<div class="panel panel-default">
						<div class="panel-heading"><b><i class="fa fa-user"></i> User Login</b></div>
						<div class="panel-body">
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
									<input type="submit" name="submit" class="btn btn-danger" value="Login">
								</div>
						 	</form>
						</div>
					</div>
				</div>
			</div>
		</div>
