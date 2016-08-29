<div class="content-wrapper">
	<section class="content-header">
		<h1>Researcher <small> Profile</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'dashboard/profile';?>">Profile</a></li>
			<li class="active"><?php echo $this->session->userdata('name');?></li>
		</ol>
	</section>
	<?php if($this->uri->segment(4) == "edit"){?>
		<section class="content">
			<form action="<?php echo site_url().'dashboard/update/profile';?>" method="POST">
			<input type="hidden" name="user_id" value="<?php echo $user[0]['user_id'];?>">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-body">
							<div class="col-md-2">
								<img src="<?php echo set_image($user[0]['avatar']);?>" class="img-responsive" data-toggle="modal" data-target="#modalProfile" style="cursor:pointer; margin:auto">
								<hr/>
								<div style="text-align:center">
									<label>Registered</label><br/>
									<?php echo date('d/m/Y H:i', strtotime($user[0]['date_create']));?><br/>
									<label>Last Login</label><br/>
									<?php echo date('d/m/Y H:i', strtotime($user[0]['last_login']));?>
								</div><br/>
								<a href="<?php echo site_url().'dashboard/profile/'.$this->session->userdata('user_id').'/edit';?>" class="btn btn-block btn-primary"><i class="fa fa-edit"></i> Edit Profile</a>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="user_id" class="form-control" value="<?php echo $user[0]['user_id'];?>" readonly>
								</div>
								<div class="form-group">
									<label>Researcher Name</label>
									<input type="text" name="name" class="form-control" value="<?php echo $user[0]['name'];?>">
								</div>
								<div class="form-group">
									<label>NIDN/NUP</label>
									<input type="text" name="user_code" class="form-control" value="<?php echo $user[0]['user_code'];?>">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" value="<?php echo $user[0]['email'];?>">
								</div>
								<div class="form-group">
									<label>Phone</label>
									<input type="phone" name="phone" class="form-control" value="<?php echo $user[0]['phone'];?>">
								</div>
								<div class="form-group">
									<label>Department</label>
									<select name="department_id" class="form-control">
									<?php if(!empty($departments)){foreach($departments as $a){?>
										<option value="<?php echo $a['department_id'];?>" <?php echo $a['department_id'] == $user[0]['department_id'] ? 'selected':'';?>><?php echo $a['department_name'];?></option>
									<?php }} ?>
									</select>
								</div>
								<div class="form-group">
									<label>Functional</label>
									<input type="text" name="functional" class="form-control" value="<?php echo $user[0]['functional'];?>">
								</div>
							</div>
							
							<div class="col-md-5">
								<div class="form-group">
									<label>Research Interest</label>
									<input type="text" name="research_interest" class="form-control" value="<?php echo $user[0]['research_interest'];?>">
								</div>
								<div class="form-group">
									<label>Link Research Gate</label>
									<input type="text" name="link_research_gate" class="form-control" value="<?php echo $user[0]['link_research_gate'];?>">
								</div>
								<div class="form-group">
									<label>Link Google Scholar</label>
									<input type="text" name="link_google_scholar" class="form-control" value="<?php echo $user[0]['link_google_scholar'];?>">
								</div>
								<div class="form-group">
									<label>Link Scopus</label>
									<input type="text" name="link_scopus" class="form-control" value="<?php echo $user[0]['link_scopus'];?>">
								</div>
								<div class="form-group">
									<label>Index Scholar</label>
									<input type="text" name="index_scholar" class="form-control" value="<?php echo $user[0]['index_scholar'];?>">
								</div>
								<div class="form-group">
									<label>Index Scopus</label>
									<input type="text" name="index_scopus" class="form-control" value="<?php echo $user[0]['index_scopus'];?>">
								</div>
								<hr/>
								<div class="form-group">
									<input type="submit" name="submit" class="btn btn-primary" value="Update Profile">
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
		</section>
	<?php }else{?>
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-body">
							<div class="col-md-2">
								<img src="<?php echo set_image($user[0]['avatar']);?>" class="img-responsive" data-toggle="modal" data-target="#modalProfile" style="cursor:pointer; margin:auto">
								<hr/>
								<div style="text-align:center">
									<label>Registered</label><br/>
									<?php echo date('d/m/Y H:i', strtotime($user[0]['date_create']));?><br/>
									<label>Last Login</label><br/>
									<?php echo date('d/m/Y H:i', strtotime($user[0]['last_login']));?>
								</div><br/>
								<a href="<?php echo site_url().'dashboard/profile/'.$this->session->userdata('user_id').'/edit';?>" class="btn btn-block btn-primary"><i class="fa fa-edit"></i> Edit Profile</a>
							</div>
							<div class="col-md-5">
								<table class="table">
									<tr>
										<th width="">Username</th>
										<td><?php echo $user[0]['user_id'];?></td>
									</tr>
									<tr>
										<th>Researcher Name</th>
										<td><?php echo $user[0]['name'];?></td>
									</tr>
									<tr>
										<th>NIDN/NUP</th>
										<td><?php echo $user[0]['user_code'];?></td>
									</tr>
									<tr>
										<th>Email</th>
										<td><?php echo $user[0]['email'];?></td>
									</tr>
									<tr>
										<th>Phone</th>
										<td><?php echo $user[0]['phone'];?></td>
									</tr>
									<tr>
										<th>Department</th>
										<td><?php echo $user[0]['department_name'];?></td>
									</tr>
									<tr>
										<th>Functional Position</th>
										<td><?php echo $user[0]['functional'];?></td>
									</tr>
								</table>
							</div>
							
							<div class="col-md-5">
								<table class="table">
									<tr>
										<th width="200px">Research Interest</th>
										<td><?php echo $user[0]['research_interest'] ? $user[0]['research_interest']:'-----';?></td>
									</tr>
									<tr>
										<th>Link Research Gate</th>
										<td><?php echo $user[0]['link_research_gate'] ? $user[0]['link_research_gate']:'-----';?></td>
									</tr>
									<tr>
										<th>Link Google Scholar</th>
										<td><?php echo $user[0]['link_google_scholar'] ? $user[0]['link_google_scholar']:'-----';?></td>
									</tr>
									<tr>
										<th>Link Scopus</th>
										<td><?php echo $user[0]['link_scopus'] ? $user[0]['link_scopus']:'-----';?></td>
									</tr>
									<tr>
										<th>Index Scholar</th>
										<td><?php echo $user[0]['index_scholar'] ? $user[0]['index_scholar']:'-----';?></td>
									</tr>
									<tr>
										<th>Index Scopus</th>
										<td><?php echo $user[0]['index_scopus'] ? $user[0]['index_scopus']:'-----';?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
		</section>
	<?php } ?>
</div>