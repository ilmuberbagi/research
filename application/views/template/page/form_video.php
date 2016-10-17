<div class="content-wrapper">
	<section class="content-header">
		<h1>Upload/Embed New Video</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'dashboard/research/video';?>">Research Video</a></li>
			<li class="active">Upload/Embed Video</li>
		</ol>
	</section>
	<?php 
		# data video
		if(!empty($video)){
			$id = $video[0]['video_id'];
			$title = $video[0]['video_title'];
			$content = $video[0]['video_description'];
			$video = $video[0]['video_url'];
			$action = 'update';
		}else{
			$id = '';
			$title = '';
			$video = '';
			$content = '';
			$action = 'insert';
		}
	?>
	<section class="content">
		<form action="<?php echo base_url().'dashboard/'.$action.'/video';?>" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="video_id" value="<?php echo $id;?>">
		<div class="row">
			<div class="col-md-7">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-video-camera"></i> &nbsp;<?php echo $title ? $title : 'Upload/Embed Video';?></h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Video Title</label>
							<input type="text" name="video_title" class="form-control" value='<?php echo $title;?>' placeholder="Caption Title">
						</div>
						<div class="form-group">
							<label>Video Description</label>
							<textarea name="video_description" class="form-control description" placeholder="Caption Text"><?php echo $content;?></textarea>
						</div>
						<div class="form-group">
							<label>Video Url</label>
							<input type="text" name="video_url" class="form-control" value="<?php echo $video;?>" placeholder="Video Embed URL">
						</div>
						<div class="form-group">
							<label>Status</label>
							<select name="status" class="form-control">
								<option value="1">Show</option>
								<option value="0">Hidden</option>
							</select>
						</div>
						<div class="form-action">
							<input type="submit" name="submit" class="btn btn-primary" value="<?php echo ucwords($action);?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="box box-info">
					<div class="box-header with-border">
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Author</label>
							<input type="text" name="user_id" class="form-control" value='<?php echo $this->session->userdata('name');?>' readonly>
						</div>
						<div class="form-group">
							<label>Video Preview</label>
							<div class="">
								<iframe class=".embed-responsive-item" src="<?php echo $video ? $video : site_url().'uploads/default.jpg';?>" frameborder="0" style="width:100%;height:250px" allowfullscreen></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</form>
	</section>
</div>
