<div class="content-wrapper">
	<section class="content-header">
		<h1>Dashboard <small>CMS Research FTUI</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		</ol>
	</section>

	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-globe"></i> Layanan Online</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<!-- member -->
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-aqua">
							<div class="inner">
								<h3><?php echo number_format($count_slide);?></h3>
								<p>Active Slide</p>
							</div>
							<div class="icon">
								<i class="fa fa-image"></i>
							</div>
							<a href="<?php echo base_url().'dashboard/slideshow';?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- articles -->
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-green">
							<div class="inner">
								<h3><?php echo number_format($count_news);?></h3>
								<p>News</p>
							</div>
							<div class="icon">
								<i class="fa fa-newspaper-o"></i>
							</div>
							<a href="<?php echo base_url().'dashboard/news';?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- quotes -->
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-yellow">
							<div class="inner">
								<h3><?php echo number_format($count_video);?></h3>
								<p>Video</p>
							</div>
							<div class="icon">
								<i class="fa fa-video-camera"></i>
							</div>
							<a href="<?php echo base_url().'dashboard/research/video';?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>

					<!-- journal -->
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-red">
							<div class="inner"><h3>About</h3><p>Manage Info Page</p></div>
							<div class="icon"><i class="fa fa-book"></i></div>
							<a href="<?php echo base_url().'dashboard/information';?>" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>