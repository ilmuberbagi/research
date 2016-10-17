<div class="content-wrapper">
	<section class="content-header">
		<h1>Slideshow</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Slideshow</li>
		</ol>
	</section>

	<section class="content usetooltip">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-image"></i> &nbsp; Slideshow</h3>
				<div class="box-tools pull-right">
					<a class="btn btn-default" href="<?php echo base_url().'dashboard/create/slide';?>"><i class="fa fa-plus-circle"></i></a>
				</div> 
			</div>
			<div class="box-body">
				<table  class="table table-striped table-hover data-member">
				<thead>
					<th>No</th>
					<th>Caption Title</th>
					<th>Caption Text</th>
					<th>Preview</th>
					<th>Status</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php if(!empty($slide)){ $no=0; foreach($slide as $a){ $no++; ?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $a['caption_title'];?></td>
					<td><?php echo $a['caption_text'];?></td>
					<td><img src="<?php echo $a['img_url'];?>" class="img-responsive"></td>
					<td><?php echo $a['status']==1?'<span class="label label-success">Active</span>':'<span class="label label-default">Inactive</span>';?></td>
					<td>
						<span class="btn-group">
							<a href="<?php echo site_url().'dashboard/edit/slide/'.$a['slide_id'];?>" class="btn btn-sm btn-default" data-tooltip="tooltip" title="Edit slide"><i class="fa fa-edit"></i></a>
							<a href="#" class="btn btn-sm btn-default"  data-toggle="modal" data-target="#modalDelete" data-tooltip="tooltip" title="Delete slide" onclick="return delete_article('<?php echo $a['slide_id'];?>')"><i class="fa fa-trash"></i></a>
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
				<h4 class="modal-title">Delete Slideshow</h4>
				<div>Remove Slideshow from slide list.</div>
			</div>
			<form name="formdelete" action="<?php echo base_url().'dashboard/delete/slide';?>" method="POST">
			<div class="modal-body">
				<input type="hidden" name="slide_id" id="slide_id">
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
