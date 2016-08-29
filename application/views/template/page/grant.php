<div class="content-wrapper">
	<section class="content-header">
		<h1>Grant</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Grant</li>
		</ol>
	</section>

	<section class="content usetooltip">
		<?php if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2){?>
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-search"></i> &nbsp; Search</h3>
			</div>
			<div class="box-body">
				<!-- filter -->
				<form action="<?php echo site_url().'grants';?>" method="GET">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<select name="department_id" class="form-control select">
									<option value="">- All Departments -</option>
									<?php if(!empty($departments)){ foreach ($departments as $d){?>
									<option value="<?php echo $d['department_id'];?>" <?php echo $dept_id == $d['department_id'] ? 'selected':'';?>><?php echo $d['department_name'];?></option>
									<?php }} ?>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select name="year" class="form-control select">
									<option value="">- All Years -</option>
									<?php if(!empty($years)){ foreach ($years as $d){?>
									<option value="<?php echo $d['year'];?>" <?php echo $year == $d['year'] ? 'selected':'';?>><?php echo $d['year'];?></option>
									<?php }} ?>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<input type="submit" name="submit" class="btn btn-primary" value="OK"></td>
							</div>
						</div>
						<div class="col-md-5"></div>
					</div>
				</form>
			</div>
		</div>
		<?php }?>
		
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-book"></i> &nbsp; Grant Data</h3>
				<div class="box-tools pull-right">
					<?php if($this->session->userdata('role') == 3 || $this->session->userdata('role') == 4){?>
					<span class="btn-group">
						<a data-tooltip="tooltip" title="Input Data" class="btn btn-default btn-sm" href="<?php echo base_url().'grants/action/input';?>"><i class="fa fa-plus-circle"></i></a>
						<a data-tooltip="tooltip" title="Import grants" class="btn btn-success btn-sm" href="<?php echo base_url().'grants/action/import';?>"><i class="fa fa-cloud-upload"></i></a>
					</span>
					<?php }else{?>
					<span class="btn-group">
						<a data-tooltip="tooltip" title="Export PDF" class="btn btn-danger btn-sm" href="<?php echo base_url().'grants/action/export/pdf?department_id='.$dept_id.'&year='.$year;?>" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
						<a data-tooltip="tooltip" title="Export Excel" class="btn btn-success btn-sm" href="<?php echo base_url().'grants/action/export/excel?department_id='.$dept_id.'&year='.$year;?>"><i class="fa fa-file-excel-o"></i></a>
					</span>
					<?php }?>
				</div>
			</div>
			<div class="box-body">
				<table  class="table table-striped table-bordered data-grants">
				<thead>
					<th>No</th>
					<th>Peneliti Utama</th>
					<th>Anggota</th>
					<th>Judul Penelitian</th>
					<th>Tahun</th>
					<?php if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2){?>
					<th>Department</th>
					<?php } ?>
					<th width="120">Action</th>
				</thead>
				<tbody>
				<?php if(!empty($grants)){ $no=0; foreach($grants as $a){ $no++; ?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $a['main_researcher'];?></td>
					<td><?php echo $a['member_researcher'];?></td>
					<td><?php echo $a['research_title'];?></td>
					<td><?php echo $a['grant_year'];?></td>
					<?php if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2){?>
					<td><?php echo $a['department_name'];?></td>
					<?php } ?>
					<td width="100">
						<span class="btn-group">
							<?php if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2){?>
								<a data-tooltip="tooltip" title="Publish" href="#" class="btn btn-sm btn-<?php echo $a['publish'] == 1 ? 'success':'default';?>"  data-toggle="modal" data-target="#modalPublish" onclick="return publish_grants('<?php echo $a['grant_id'];?>')"><i class="fa fa-flag"></i></a>
							<?php } ?>

							<a data-tooltip="tooltip" title="Edit grants" href="<?php echo site_url().'grants/action/edit/'.$a['grant_id'];?>" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a>

							<a data-tooltip="tooltip" title="View grants" href="<?php echo site_url().'grants/action/detail/'.$a['grant_id'];?>" class="btn btn-sm btn-default"><i class="fa fa-file"></i></a>

							<a data-tooltip="tooltip" title="Delete grants" href="#" class="btn btn-sm btn-default"  data-toggle="modal" data-target="#modalDelete" onclick="return delete_grants('<?php echo $a['grant_id'];?>')"><i class="fa fa-trash"></i></a>

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
				<i class="fa fa-trash modal-icon"></i>
				<h4 class="modal-title">Delete Grant</h4>
				<div>Remove selected data from list.</div>
			</div>
			<form name="formdelete" action="<?php echo base_url().'grants/action/delete';?>" method="POST">
			<div class="modal-body">
				<input type="hidden" name="grant_id" id="grant_id">
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

<!-- modal publish -->
<div class="modal inmodal" id="modalPublish" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated bounceInDown">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true"><i class="fa fa-remove"></i></span><span class="sr-only">Close</span></button>
				<i class="fa fa-flag modal-icon"></i>
				<h4 class="modal-title">Publish grants</h4>
				<div>The grants data will appear on public page.</div>
			</div>
			<form name="formdelete" action="<?php echo base_url().'grants/action/publish';?>" method="POST">
			<div class="modal-body">
				<input type="hidden" name="grant_id" id="grant_id_pub">
				<div class="msg"></div>
			</div>
			<div class="modal-footer">
				<input type="reset" name="reset" value="Cancel" class="btn btn-white" data-dismiss="modal">
				<input type="submit" name="move" value="Publish" class="btn btn-success action">
			</div>
			</form>
		</div>	
	</div>
</div>
