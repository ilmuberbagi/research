<div class="content-wrapper">
	<section class="content-header">
		<h1>Research Videos</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Research Video</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-video-camera"></i> &nbsp; Research Video</h3>
				<div class="box-tools pull-right">
					<a class="btn btn-default" href="<?php echo base_url().'dashboard/create/video';?>"><i class="fa fa-plus-circle"></i></a>
				</div> 
			</div>
			<div class="box-body">
				<table  class="table table-striped table-hover data-member">
				<thead>
					<th>Icon</th>
					<th>Video Embed URL</th>
					<th>Posted By</th>
					<th>Status</th>
					<th>Last Update</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php if(!empty($video)){ $no=0; foreach($video as $a){ $no++; ?>
				<tr>
					<td>
						<img src="<?php echo getYoutubeImage($a['video_url'],'icon');?>" class="img-responsive" alt="<?php echo $a['video_title'] ==''? 'Video Thumbnail': $a['video_title'];?>" width="50">
					</td>
					<td>
						<?php echo $a['video_title'] == ""? '---':$a['video_title'];?><br/>
						<small><a href="<?php echo $a['video_url'];?>" target="_blank"><?php echo $a['video_url'];?></a></small>
					</td>
					<td><?php echo $a['name'];?></td>
					<td><?php echo $a['status']==1?'<span class="label label-success">Active</span>':'<span class="label label-default">Inactive</span>';?></td>
					<td><?php echo date('d/m/Y H:i', strtotime($a['last_updated']));?></td>
					<td>
						<span class="btn-group">
							<a href="<?php echo site_url().'dashboard/edit/video/'.$a['video_id'];?>" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a>
							<a href="#" class="btn btn-sm btn-default"  data-toggle="modal" data-target="#modalDelete" onclick="return delete_article('<?php echo $a['video_id'];?>')"><i class="fa fa-trash"></i></a>
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
				<h4 class="modal-title">Delete Video</h4>
				<div>Remove video from video list.</div>
			</div>
			<form name="formdelete" action="<?php echo base_url().'dashboard/delete/video';?>" method="POST">
			<div class="modal-body">
				<input type="hidden" name="video_id" id="video_id">
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
