<?php if($this->uri->segment(2)== "read" ){?>

	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="page-header">
					<h3><?php echo $videos[0]['video_title']; ?></h3>
				</div>
				<?php #print_r($videos);?>
				<p class="text-muted"><i class="fa fa-calendar"></i> <?php echo date('d/m/Y', strtotime($videos[0]['last_updated'])); ?> <i class="fa fa-clock-o"></i> <?php echo date('H:i', strtotime($videos[0]['last_updated']));?> Authored By: Administrator</p>
				<div class="embed-responsive embed-responsive-16by9">
					<iframe id="youtube-home" class="embed-responsive-item" src="<?php echo $videos[0]['video_url'];?>" frameborder="0" allowfullscreen></iframe>
				</div>
				<?php echo $videos[0]['video_description']; ?>
			</div>
			
			<!-- popular news -->
			<div class="col-md-4 sidebar">
				<div class="list-group">
				<a href="#" class="list-group-item title">Popular News</a>
				<?php if(!empty($popular)){ foreach ($popular as $on) {?>				
					<a href="<?php echo site_url("news/read/".$on['news_id'].'/'.gen_url($on['news_title'])); ?>" class="list-group-item">
						<div class="img-thumb-list" style="background-image:url('<?php echo $on['thumbnail_url'];?>')"></div>
						<?php echo $on['news_title']; ?>
					</a>
				<?php }} ?>				
				</div>			
			</div>
			
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-8">
				<h5 class="text-warning">Other Videos</h5>
				<div class="row">
					<?php if(!empty($other_videos)){ foreach ($other_videos as $on) {?>
					<div class="col-md-4">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe id="youtube-home2" class="embed-responsive-item" src="<?php echo $on['video_url'];?>" frameborder="0" allowfullscreen></iframe>
						</div>
						<p><a href="<?php echo site_url().'videos/read/'.$on['video_id'].'/'.gen_url($on['video_title']);?>">Watch Detail</a></p>
					</div>
					<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

<?php }else{?>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="page-header">
					<h4><i class="fa fa-video-camera"></i> Videos</h4>
				</div>
				<div class="page-content">
					<div class="row">
						<?php if(!empty($videos)){ foreach($videos as $n){ ?>
							<div class="col-md-6">
								<h4 class="media-heading"><?php echo $n['video_title'];?></h4>
								<p class="text-muted timestamp-news"><i class="fa fa-calendar"></i> <?php echo date('d/m/Y', strtotime($n['last_updated']));?> <i class="fa fa-clock-o"></i> <?php echo date('H:i', strtotime($n['last_updated']));?> Authored By: Administrator</p>
								<?php echo substr($n['video_description'],0,200); ?>
								
								<div class="embed-responsive embed-responsive-16by9">
									<iframe id="youtube-home" class="embed-responsive-item" src="<?php echo $n['video_url'];?>" frameborder="0" allowfullscreen></iframe>
								</div><br/>

								<br>
								<a href="<?php echo site_url("/videos/read/".$n['video_id'].'/'.gen_url($n['video_title'])); ?>"><b>read more...</b></a>	
							</div>
						<?php } ?>
						<?php echo $paging;?>
						<?php } ?>
					</div>
				</div> 
			</div> 
			
			<!-- popular news -->
			<div class="col-md-4" style="background:#EEE">
				<div class="list-group">
				<a href="#" class="list-group-item title">Popular News</a>
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
<?php } ?>