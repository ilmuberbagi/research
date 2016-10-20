<div class="container">
	<div class="row">
		<div class="col-md-8" style="margin-bottom:20px; clear:both">			
			<div class="row" style="padding:10px; border-bottom:solid 1px #DDD; margin-bottom: 10px;">
				<div class="col-md-6">
					<h4>Researchers</h4>
				</div>
				<div class="col-md-6 pull-right">
					<form method="GET" action="<?php echo site_url().'researchers';?>">
						<div class="input-group">
							<select name="department" class="form-control">
								<option value="">-- All Department --</option>
								<?php if (!empty($department)){ foreach ($department as $d){?>
									<option value="<?php echo $d['department_id'];?>" <?php echo $d['department_id'] == $dep ? 'selected':'';?>><?php echo $d['department_name'];?></option>
								<?php } } ?>
							</select>
							<span class="input-group-btn" id="basic-addon2">
								<input class="btn btn-primary" type="submit" name="submit" value="Go!">
							</span>
						</div>
					</form>
				</div>			
				<hr/>
			</div>
			<?php 
				if(!empty($result)){ 
					echo '<table style="width:100%">';
					foreach (array_chunk($result, 2) as $row){
						echo "<tr>";
						foreach ($row as $r){
							echo "<td width='50%' valign='top'>";
			?>
							<!-- div class="col-md-6" style="height:250px; overflow:auto; margin-bottom:100px;" -->
							<table style="width:100%; margin-bottom:50px; padding:10px">
								<tr><td rowspan="4" valign="top" width="100"><img src="<?php echo $r['avatar']?$r['avatar']:site_url().'assets/img/user.jpg';?>" width="80" class="img-responsive img">						
								<a href="<?php echo $r['link_google_scholar'];?>" target="_blank"><img src="<?php echo site_url().'assets/public/img/gs.png';?>" class="img-responsive" alt="Google Scholar" width="80"></a>
								<a href="<?php echo $r['link_research_gate'];?>" target="_blank"><img src="<?php echo site_url().'assets/public/img/researchgate.png';?>" class="img-responsive" alt="Google Scholar" width="80"></a>
								</td><th width="100" valign="top">Name</th><td><a href="#" onClick="return profile_preview('<?php echo $r['user_id'];?>')" data-toggle="modal" data-target="#modalProfile" title="Click to view biography" style="cursor:pointer"><?php echo $r['name'];?></a></td></tr>
								<tr><th>Department</th><td><?php echo $r['department_name'];?></td></tr>
								<tr><th valign="top">Expertise</th><td><?php echo $r['expertise'];?></td></tr>
								<tr><th valign="top">Research<br/>Interest</th><td><?php echo $r['research_interest'];?></td></tr>
							</table>
							<!-- /div -->
			<?php 		echo "</td>";
					}
						echo "</tr>";
					}
			?>
			</table>
			<?php }else{ echo "<div class='col-md-12'>No researchers registered.</div>";}?>

			<div style="clear:both; padding-top:10; border-top:solid 1px #DDD">
				<span class="pull-left"><?php echo $paging;?></span>
				<span class="pull-right"><i>Total Researchers: <b><?php echo number_format($total);?></b></i></span>
			</div>
			
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

<div class="modal fade" tabindex="-1" role="dialog" id="modalProfile">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:solid 2px #444; background-color:#fed602;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="titleProfile" style="color:#FFF"></h4>
      </div>
      <div class="modal-body" id="contentProfile" style="padding:30px; padding-top:10px; max-height:400px; overflow:auto; text-align:justify;">
      </div>
      <div class="modal-footer" style="background-color:#DDD">
        <button type="button" class="btn btn-default btn-outline" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div style="clear:both; height:200px"></div>