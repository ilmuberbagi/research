		<!-- start image slider -->
		<div class="row" style="background-color:#EEE">
			<div class="col-md-12">
				<div class="container">
					<div class="row">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner" role="listbox">
								<?php if(!empty($slideshow)){ $no=0; foreach ($slideshow as $slide){ $no++;?>
								<div class="item <?php echo $no==1? 'active':'';?>">
									<img src="<?php echo $slide['img_url'];?>" alt="<?php echo $slide['caption_title'] !== "" ? $slide['caption_title']:'Slideshow';?>">
									<!-- div class="carousel-caption">
										<h3><?php echo $slide['caption_title'];?></h3>
										<p><?php echo $slide['caption_text'];?></p>
									</div -->
								</div>
								<?php }}?>
							</div>
							<!-- Controls -->
							<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
							<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end image slider -->

		<!-- content -->
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div class="page-header">
							<h4><i class="fa fa-newspaper-o"></i> Recent News</h4>
						</div>
						<div class="page-body">
							<?php if(!empty($news)){ foreach($news as $n){?>
							<div class="col-md-6 col-sm-6 col-xs-12" style="margin-bottom:10px; min-height:380px">
								<div class="thumbnail img-responsive">
									<div class="img-thumb-bg" style="background-image:url('<?php echo $n['thumbnail_url'];?>')"></div>
								</div>
								<div class="caption">
									<a href="<?php echo site_url().'news/read/'.$n['news_id'].'/'.gen_url($n['news_title']);?>">
									<h5><?php echo $n['news_title'];?></h5></a>
									<p class="text-muted timestamp-home">
										<i class="fa fa-calendar"></i> <?php echo date('d/m/Y', strtotime($n['date_posted']));?>
										<i class="fa fa-clock-o"></i> <?php echo date('H:i', strtotime($n['date_posted']));?></p>
									<p><?php echo substr(strip_tags($n['news_content']), 0, 150);?>...</p>
								</div>
							</div>
							<?php } ?>
							<div style="clear:both"><a class="btn btn-warning" href="<?php echo site_url().'news';?>">All News</a></diV>
							<?php }else{?>
							<strong>Belum ada berita yang dapat ditampilkan...</strong>
							<?php } ?>
						</div>
					</div>
				</div>

				<div class="col-md-4 sidebar">
					<!-- search box -->
					<div class="row">
						<div class="list-group">
							<div class="list-group-item">
								<form action="<?php echo site_url().'search';?>" method="GET">
									<div class="input-group">
										<input type="text" class="form-control" name="key" placeholder="Type something..">
										<span class="input-group-btn" id="basic-addon2">
											<button class="btn btn-warning" type="button"><i class="fa fa-search"></i></button>
										</span>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="row">
						<ul class="nav nav-tabs title" role="tablist">
							<li class="active" role="presentation"><a href="#publication" aria-controls="settings" role="tab" data-toggle="tab">RECENT PUBLICATIONS</a></li>
							<li role="presentation"><a href="#grant" aria-controls="messages" role="tab" data-toggle="tab">GRANTS</a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<!-- publication -->
							<div role="tabpanel" class="tab-pane active" id="publication">
								<?php if(!empty($publication)){ $no=0; foreach($publication as $g){ $no++;?>
									<div class="list-group-item data">
										<div class="row">
											<div class="col-md-2 col-sm-2 col-xs-2 big">
												<div class="date"><?php echo date('d', strtotime($g['date_input']));?></div>
												<div><?php echo date('M', strtotime($g['date_input']));?></div>
												<div><?php echo date('Y', strtotime($g['date_input']));?></div>
											</div>
											<div class="col-md-10 col-sm-10 col-xs-10">
												<div class="item-title" data-toggle="modal" data-target="#modalAbstract" onclick="return get_abstract('<?php echo $g['pub_id'];?>')" style="cursor:pointer"><?php echo $g['title'];?></div>
												<div class="author">Authors : <?php echo $g['author'];?></div>
											</div>
										</div>
									</div>
								<?php }}else{?>
									<div class="list-group-item">No data available</div>
								<?php } ?>
								<div class="list-group-item"><a href="<?php echo site_url().'research/publication';?>">Browse All Publications &raquo;</a></div>
							</div>
							<div role="tabpanel" class="tab-pane" id="grant">
								<?php if(!empty($grant)){ $no=0; foreach($grant as $g){ $no++; ?>
									<div class="list-group-item data">
										<div class="row">
											<div class="col-md-2 col-sm-2 col-xs-2 big">
												<div class="date"><?php echo date('d', strtotime($g['date_input']));?></div>
												<div><?php echo date('M', strtotime($g['date_input']));?></div>
												<div><?php echo date('Y', strtotime($g['date_input']));?></div>
											</div>
											<div class="col-md-10 col-sm-10 col-xs-10">
												<b><?php echo $g['research_title'];?></b>
												<div class="author">Authors : <?php echo $g['main_researcher'];?></div>
											</div>
										</div>
									</div>
								<?php }}else{?>
									<div class="list-group-item">No data available</div>
								<?php } ?>
								<div class="list-group-item"><a href="<?php echo site_url().'research/grant';?>">Browse All Grants &raquo;</a></div>
							</div>
						</div>
					</div>

					<div class="row">
						<BR/>
						<div class="list-group-item title"><i class="fa fa-video-camera"></i> LATEST VIDEOS</div>
						<div class="list-group-item">
							<?php if(!empty($video)){ foreach($video as $v){?>
							<div class="list-group-item">
								<a href="<?php echo site_url().'videos/read/'.$v['video_id'].'/'.gen_url($v['video_title']);?>">
									<img src="<?php echo getYoutubeImage($v['video_url']);?>" class="img-responsive" alt="<?php echo $v['video_title'] ==''? 'Video Thumbnail': $v['video_title'];?>">
								</a>
							</div>
							<?php }?>
							<p><a href="<?php echo site_url().'videos';?>" class="btn btn-warning btn-block btn-sm">Index video</a></p>
							<?php }else{?>
								<strong>Belum ada video yang dapat ditampilkan...</strong>
							<?php } ?>
						</div>
					</div>
					
					<div class="row">
						<br/>
						<div class="list-group-item title"><i class="fa fa-lock"></i> LOGIN</div>
						<div class="list-group-item">
							<div class="list-group-item">
								<form method="POST" action="<?php echo site_url().'login/auth/home';?>" class="form">
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
							<div class="list-group-item">
								<p><a href="<?php echo site_url().'register';?>" class="pull-right">Register new researcher &raquo;</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- modal abstract -->
		<div class="modal fade" tabindex="-1" role="dialog" id="modalAbstract">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header" style="border-bottom:solid 2px #444; background-color:#fed602;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="titlePub" style="color:#FFF; font-size:14px; font-weight:bold; line-height:18px"></h4>
			  </div>
			  <div class="modal-body" style="padding:30px; padding-top:10px; max-height:400px; overflow:auto; text-align:justify;">
			  	<div class="row">
			  		<div class="col-md-12">			  			
					  	<table style="width:100%">
					  		<tr>
					  			<th>Authors</th>
					  			<th width="20">:</th>
					  			<td id="authors"></td>
					  		</tr>
					  		<tr>
					  			<th width="130">Publication Name</th>
					  			<th width="20">:</th>
					  			<td id="publication_name"></td>
					  		</tr>
					  		<tr>
					  			<th valign="top">Abstract</th>
					  			<th valign="top" width="20">:</th>
					  			<td id="abstract"></td>
					  		</tr>
					  	</table>
					  	<hr>
					 </div>
					 <div class="col-md-6">
					  	<table class="">
					  		<tr>
					  			<th width="75">Publisher</th>
					  			<th width="20">:</th>
					  			<td id="publisher"></td>
					  		</tr>
					  		<tr>
					  			<th>ISSN</th>
					  			<th width="20">:</th>
					  			<td id="issn"></td>
					  		</tr>
					  		<tr>
					  			<th>Page</th>
					  			<th width="20">:</th>
					  			<td id="page"></td>
					  		</tr>
					  		<tr>
					  			<th>Volume</th>
					  			<th width="20">:</th>
					  			<td id="volume"></td>
					  		</tr>
					  		<tr>
					  			<th>Year</th>
					  			<th width="20">:</th>
					  			<td id="year"></td>
					  		</tr>
					  	</table>
					 </div>
					 <div class="col-md-6">
					  	<table class="">
					  		<tr>
					  			<th width="120">Impact Factor (JCR)</th>
					  			<th width="20">:</th>
					  			<td id="impact_factor"></td>
					  		</tr>
					  		<tr>
					  			<th>SJR</th>
					  			<th width="20">:</th>
					  			<td id="sjr"></td>
					  		</tr>
					  		<tr>
					  			<th>Ranking Quartile</th>
					  			<th width="20">:</th>
					  			<td id="ranking"></td>
					  		</tr>
					  		<tr>
					  			<th>Website</th>
					  			<th width="20">:</th>
					  			<td id="website"></td>
					  		</tr>
					  	</table>
					 </div>
			  	</div>
			  </div>
			  <div class="modal-footer" style="background-color:#DDD">
				<button type="button" class="btn btn-default btn-outline btn-sm" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div>
