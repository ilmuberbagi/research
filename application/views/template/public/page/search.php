<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="page-header">
				<h4>Search Result</h4>
			</div>
			
			<?php if(!empty($result)){ foreach ($result as $r){?>
				<div style="margin-bottom:10px; padding-bottom:5px; border-bottom:solid 1px #DDD">
					<a style="font-size:1.2em" href="<?php echo site_url().'news/read/'.$r['id'].'/'.gen_url($r['title']);?>"><?php echo $r['title'];?></a><br/>
					<div style="color:#006621"><?php echo site_url().'news/read/'.$r['id'].'/'.gen_url($r['title']);?></div>
					<div><?php echo substr(strip_tags($r['content']),0,200).'...';?></div>
				</div>	
			<?php }}else{ echo "You search - <b>".$key."</b> did not match any content";}?>
			<br/>
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
