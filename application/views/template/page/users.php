<div class="content-wrapper">
	<section class="content-header">
		<h1>Account <small>Management</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Account Management</li>
		</ol>
	</section>

	<section class="content usetooltip">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-users"></i> &nbsp; Users</h3>
				<div class="box-tools pull-right">
					<a class="btn btn-default" href="#<?php #echo base_url().'dashboard/create/resources';?>"><i class="fa fa-plus-circle"></i></a>
				</div> 
			</div>
			<div class="box-body">
				<table  class="table table-striped table-hover data-member">
				<thead>
					<th>No</th>
					<th>Name</th>
					<th>Email</th>
					<th>Department</th>
					<th>Role</th>
					<th>Status</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php 
					if(!empty($users)){ $no=0; foreach($users as $a){ $no++;
				?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $a['name'];?></td>
					<td><?php echo $a['email'];?></td>
					<td><?php echo $a['department_name'];?></td>
					<td><?php echo $a['role_name'];?></td>
					<td><?php echo $a['status'] == 1 ? '<span class="label label-success">Aktif</span>':'<span class="label label-default">Inactive</span>';?></td>
					<td>
						<span class="btn-group">
							<a href="<?php echo site_url().'dashboard/profile/'.$a['user_id'];?>" class="btn btn-sm btn-default" data-tooltip="tooltip" title="Detail user"><i class="fa fa-search"></i></a>
							<a href="#" class="btn btn-sm btn-default"  data-toggle="modal" data-target="#modalStatus" onclick="return status_user('<?php echo $a['user_id'].'#'.$a['status'];?>')" data-tooltip="tooltip" title="Change status"><i class="fa fa-check-circle"></i></a>
							<a href="#" class="btn btn-sm btn-default"  data-toggle="modal" data-target="#modalDelete" onclick="return delete_user('<?php echo $a['user_id'];?>')" data-tooltip="tooltip" title="Delete user"><i class="fa fa-trash"></i></a>
							<a href="#" class="btn btn-sm btn-default"  data-toggle="modal" data-target="#modalReset" onclick="return reset('<?php echo $a['user_id'].'#'.($a['user_code'] !== "" ? $a['user_code']:'123456');?>')" data-tooltip="tooltip" title="Reset Password"><i class="fa fa-refresh"></i></a>
						</span>
					</td>
				</tr>
				<?php }}?>
				</tbody>
				</table>
			</div>
		</div>
	</section>
</div>


<!-- modal delete -->
<div class="modal inmodal" id="modalDelete" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated bounceInDown">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true"><i class="fa fa-remove"></i></span><span class="sr-only">Close</span></button>
				<i class="fa fa-user modal-icon"></i>
				<h4 class="modal-title">Delete User</h4>
				<div>Remove user from list.</div>
			</div>
			<form name="formdelete" action="<?php echo base_url().'dashboard/delete/user';?>" method="POST">
			<div class="modal-body">
				<input type="hidden" name="user_id" id="user_id">
				<div class="msg"></div>
			</div>
			<div class="modal-footer">
				<input type="reset" name="reset" value="Cancel" class="btn btn-white" data-dismiss="modal">
				<input type="submit" name="move" value="Remove" class="btn btn-danger action">
			</div>
			</form>
		</div>	
	</div>
</div>

<!-- modal status -->
<div class="modal inmodal" id="modalStatus" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated bounceInDown">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true"><i class="fa fa-remove"></i></span><span class="sr-only">Close</span></button>
				<i class="fa fa-check-circle modal-icon"></i>
				<h4 class="modal-title">Status User</h4>
				<div>Active or inactive user status.</div>
			</div>
			<form name="formdelete" action="<?php echo base_url().'dashboard/update/user_status';?>" method="POST">
			<div class="modal-body">
				<input type="hidden" name="user_id" id="user_id_status">
				<input type="hidden" name="status" id="status">
				<div class="msg"></div>
			</div>
			<div class="modal-footer">
				<input type="reset" name="reset" value="Cancel" class="btn btn-white" data-dismiss="modal">
				<input type="submit" name="move" value="Change" class="btn btn-warning action">
			</div>
			</form>
		</div>	
	</div>
</div>

<!-- modal reset -->
<div class="modal inmodal" id="modalReset" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated bounceInDown">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true"><i class="fa fa-remove"></i></span><span class="sr-only">Close</span></button>
				<i class="fa fa-refresh modal-icon"></i>
				<h4 class="modal-title">Reset Password</h4>
				<div>Reset default password.</div>
			</div>
			<form name="formdelete" action="<?php echo base_url().'dashboard/update/reset_password';?>" method="POST">
			<div class="modal-body">
				<input type="hidden" name="user_id" id="user_pass_id">
				<input type="hidden" name="password" id="password">
				<div class="msg"></div>
			</div>
			<div class="modal-footer">
				<input type="reset" name="reset" value="Cancel" class="btn btn-white" data-dismiss="modal">
				<input type="submit" name="move" value="Reset" class="btn btn-warning action">
			</div>
			</form>
		</div>	
	</div>
</div>
