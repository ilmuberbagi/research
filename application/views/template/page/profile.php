<div class="content-wrapper">
	<section class="content-header">
		<h1>Researcher <small> Profile</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'dashboard/profile';?>">Profile</a></li>
			<li class="active"><?php echo $this->session->userdata('name');?></li>
		</ol>
	</section>
	
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-body">
						<div class="col-md-12">
							<table class="table">
								<tr>
									<td rowspan="8" width="20%"><img src="<?php echo set_image($user[0]['avatar']);?>" class="img-responsive"></td>
									<th width="20%">Researcher Name</th>
									<td><?php echo $user[0]['name'];?></td>
								</tr>
								<tr>
									<th width="20%">Email</th>
									<td><?php echo $user[0]['email'];?></td>
								</tr>
								<tr>
									<th width="20%">Phone</th>
									<td><?php echo $user[0]['phone'];?></td>
								</tr>
								<tr>
									<th width="20%">Department</th>
									<td><?php echo $user[0]['department_name'];?></td>
								</tr>
								<tr>
									<th width="20%">Functional Position</th>
									<td><?php echo $user[0]['functional'];?></td>
								</tr>
								<tr>
									<th width="20%">Status</th>
									<td><?php echo ucwords($user[0]['role_name']);?></td>
								</tr>
								<tr class="grey">
									<th width="20%">Register Date</th>
									<td><?php echo date('d/m/Y H:i', strtotime($user[0]['date_create']));?></td>
								</tr>
								<tr class="grey">
									<th width="20%">Last Login</th>
									<td><?php echo $user[0]['last_login'] ? date('d/m/Y H:i', strtotime($user[0]['last_login'])):'-------';?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</form>
		</div>
	</section>
</div>