<div class="content-wrapper">
	<section class="content-header">
		<h1>Publication</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Publication Data</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-book"></i> &nbsp; Publication Data</h3>
				<div class="box-tools pull-right">
					<?php if($this->session->userdata('role') == 3 || $this->session->userdata('role') == 4){?>
						<a class="btn btn-default" href="<?php echo base_url().'publication/action/input';?>"><i class="fa fa-plus-circle"></i></a>
					<?php }else{?>
					<span class="btn-group">
						<a class="btn btn-default btn-sm" href="<?php echo base_url().'publication/action/export/pdf';?>"><i class="fa fa-file"></i></a>
						<a class="btn btn-default btn-sm" href="<?php echo base_url().'publication/action/export/excel';?>"><i class="fa fa-file-text"></i></a>
					</span>
					<?php }?>
				</div>
			</div>
			<div class="box-body">
				<table  class="table table-striped table-hover data-publication">
				<thead>
					<th>No</th>
					<th>Author</th>
					<th>Title</th>
					<th>Department</th>
					<th>Status SIDR</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php if(!empty($publication)){ $no=0; foreach($publication as $a){ $no++; ?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $this->lib_general->get_name_from_user_id($a['author']);?></td>
					<td><?php echo $a['title'];?></td>
					<td><?php echo $a['department_name'];?></td>
					<td><?php echo $a['sidr_upload']==1?'<span class="label label-success">Uploaded</span>':'<span class="label label-default">No</span>';?></td>
					<td>
						<span class="btn-group">
							<a data-tooltip="tooltip" title="Edit Publication" href="<?php echo site_url().'publication/action/edit/'.$a['pub_id'];?>" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a>
							<?php if($this->session->userdata('role') == 3 || $this->session->userdata('role') == 4){?>
								<a data-tooltip="tooltip" title="Author Publication" href="<?php echo site_url().'publication/action/author/'.$a['pub_id'];?>" class="btn btn-sm btn-default"><i class="fa fa-users"></i></a>
							<?php }else{?>
								<a data-tooltip="tooltip" title="View SIDR" href="<?php echo site_url().'publication/action/sidr/'.$a['pub_id'];?>" class="btn btn-sm btn-default"><i class="fa fa-file"></i></a>
							<?php } ?>
							<a data-tooltip="tooltip" title="Delete Publication" href="#" class="btn btn-sm btn-default"  data-toggle="modal" data-target="#modalDelete" onclick="return delete_article('<?php echo $a['pub_id'];?>')"><i class="fa fa-trash"></i></a>
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
				<h4 class="modal-title">Delete Publication Data</h4>
				<div>Remove publication data from list.</div>
			</div>
			<form name="formdelete" action="<?php echo base_url().'publication/action/delete';?>" method="POST">
			<div class="modal-body">
				<input type="hidden" name="pub_id" id="pub_id">
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
