<div class="content-wrapper">
	<section class="content-header">
		<h1>Resources</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Resources</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-paperclip"></i> &nbsp; Resources</h3>
				<div class="box-tools pull-right">
					<a class="btn btn-default" href="<?php echo base_url().'dashboard/create/resources';?>"><i class="fa fa-plus-circle"></i></a>
				</div> 
			</div>
			<div class="box-body">
				<table  class="table table-striped table-hover data-member">
				<thead>
					<th>No</th>
					<th>Title</th>
					<th>File Location</th>
					<th>Type</th>
					<th>Viewed</th>
					<th>Status</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php 
					if(!empty($resources)){ $no=0; foreach($resources as $a){ $no++; 
					$type = explode('.', $a['file_url']);
				?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $a['resource_title'];?></td>
					<td><?php echo $a['file_url'];?></td>
					<td><?php echo $a['enable_download'] == 1 ? '<span class="badge label-success" data-toggle="tooltip" title="Resource">R</span>':'<span class="badge label-warning" data-toggle="tooltip" title="Asset">A</span>';?></td>
					<td align="center"><?php echo number_format($a['viewed']);?></td>
					<td><?php echo UR_exists($a['file_url']) ? '<span class="label label-success">OK</span>':'<span class="label label-default">Error</span>';?></td>
					<td>
						<span class="btn-group">
							<a href="<?php echo $a['file_url'];?>" class="btn btn-sm btn-default"><i class="fa fa-download"></i></a>
							<a href="<?php echo site_url().'dashboard/edit/resources/'.$a['resource_id'];?>" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a>
							<a href="#" class="btn btn-sm btn-default"  data-toggle="modal" data-target="#modalDelete" onclick="return delete_article('<?php echo $a['resource_id'];?>')"><i class="fa fa-trash"></i></a>
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
				<i class="fa fa-paperclip modal-icon"></i>
				<h4 class="modal-title">Delete Resource</h4>
				<div>Remove resource/file from list.</div>
			</div>
			<form name="formdelete" action="<?php echo base_url().'dashboard/delete/resources';?>" method="POST">
			<div class="modal-body">
				<input type="hidden" name="resource_id" id="slide_id">
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
