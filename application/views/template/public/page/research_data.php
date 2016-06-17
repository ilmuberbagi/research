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
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-8">
				<h4 class="text-warning">Other News</h4>
				<div class="list-group">
				<?php if(!empty($other_news)){ foreach ($other_news as $on) {?>				
				<a href="<?php echo site_url("news/read/".$on['news_id']); ?>" class="list-group-item"><?php echo $on['news_title']; ?></a>
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
					<h3><i class="fa fa-newspaper-o"></i> News</h3>
				</div>
				<?php if(!empty($news)){ foreach($news as $n){ ?>
					<div class="media">
						<div class="media-body">
							<h4 class="media-heading"><?php echo $n['news_title'];?></h4>
							<p class="text-muted timestamp-news"><i class="fa fa-calendar"></i> <?php echo date('d/m/Y', strtotime($n['last_updated']));?> <i class="fa fa-clock-o"></i> <?php echo date('H:i', strtotime($n['last_updated']));?> Authored By: Administrator</p>
							<?php echo substr(strip_tags($n['news_content']), 0, 300); ?>
							<br>
							<a href="<?php echo site_url("/news/read/".$n['news_id']); ?>"><b>read more...</b></a>	
						</div>
						<div class="media-right">
							<?php if($n['thumbnail_url'] != ""){ ?>
								<a href="#"><img class="media-object img-thumbnail" src="<?php echo $n['thumbnail_url'];?>" alt="<?php echo $n['news_title'];?>"></a>
							<?php } ?>
						</div>
					</div>
					<hr/>
				<?php } } ?>
			</div> 
		</div>
	</div>
<?php } ?>