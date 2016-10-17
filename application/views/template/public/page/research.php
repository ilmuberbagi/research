<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="page-header">
				<h4>Research Data</h4>
			</div>
			
			<form class="form-inline" method="GET" action="<?php echo site_url().'research/'.$param;?>">
				<div class="row toolbar">
					<div class="col-md-3">
						<div class="form-group">
							<label><input type="radio" name="param" value="grant" <?php echo $param == 'grant'?'checked':'';?>> Grant</label>
							<label><input type="radio" name="param" value="publication" <?php echo $param == 'publication'?'checked':'';?>> Publication</label>
						</div>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<select name="year" style="border:solid 1px #DDD; padding:10px; width:150px; font-size:0.9em">
								<option value="">- All Years -</option>
								<?php for($a = date('Y'); $a>=2000; $a--){?>
								<option value="<?php echo $a;?>" <?php echo $a==$year?'selected':'';?>><?php echo $a;?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<input type="text" name="key" value="<?php echo $key?$key:'';?>" placeholder="Keyword..."  style="border:solid 1px #DDD; padding:8px; font-size:0.9em;">
							<input type="submit" name="submit" class="btn btn-primary" value="View">
						</div>
					</div>
				</div>
			</form>
			<hr/>
			<table class="table table-condensed">
				<tr>
					<th>No.</th>
					<th>Title</th>
					<th>Author</th>
					<th>Year</th>
					<?php if($param == 'publication'){?>
					<th>Publisher</th>
					<th>Abstract</th>
					<?php } ?>
				</tr>
				<?php if(!empty($result)){ foreach($result as $r){ $offset++; ?>
				<tr>
					<td><?php echo $offset;?></td>
					<td><?php echo $param == 'grant'? $r['research_title']:$r['title'];?></td>
					<td><?php echo $param == 'grant'? $r['main_researcher']:$r['author'];?></td>
					<td><?php echo $param == 'grant'? $r['grant_year']:$r['pub_year'];?></td>
					<?php if($param == 'publication'){?>
					<td><?php echo $r['publisher'];?></td>
					<td><a class="btn btn-default btn-sm" href="#" data-toggle="modal" data-target="#modalAbstract" onclick="return get_abstract('<?php echo $r['pub_id'];?>')"><i class="fa fa-search"></i></a></td>
					<?php } ?>
				</tr>
				<?php }}else{?>
				<tr><td colspan="6">Belum ada data yang dapat ditampilkan.</td></tr>
				<?php } ?>
			</table>
			<?php echo $paging;?>
		</div>
		
		<div class="col-md-4 sidebar">
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
