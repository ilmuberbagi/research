<div class="content-wrapper">
	<section class="content-header">
		<h1>Uplaod <small>Resource/File</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'dashboard/resources';?>">Resources</a></li>
			<li class="active">Upload File</li>
		</ol>
	</section>
	<?php 
		# data sources
		if(!empty($sources)){
			$id = $sources[0]['resource_id'];
			$title = $sources[0]['resource_title'];
			$image = $sources[0]['file_url'];
			$enable = $sources[0]['enable_download'];
			$action = 'update';
		}else{
			$id = '';
			$title = '';
			$image = '';
			$enable = '';
			$action = 'insert';
		}
	?>
	<section class="content">
		<form action="<?php echo base_url().'dashboard/'.$action.'/resources';?>" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="resource_id" value="<?php echo $id;?>">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-image"></i> &nbsp;<?php echo $title ? $title : 'Upload File';?></h3>
					</div>
					<div class="box-body">
						<div class="callout">
							<div class="text-bold">Note</div>
							<p>Upload file dengan ukuran file tidak lebih dari 10 MB</p>
						</div>

						<div class="form-group">
							<label>Resources Title</label>
							<input type="text" name="resource_title" class="form-control" value='<?php echo $title;?>' placeholder="File Title">
						</div>
						<div class="form-group">
							<label>File</label>
							<div class="input-group">
								<input type="file" name="userfile" class="" value="<?php echo $image;?>">
							</div>
						</div>
						<div class="form-group">
							<label>Enable Download</label><br/>
							<label><input type="radio" name="enable_download" value="1" <?php echo $enable == 1? 'checked':'';?>> Yes</label>
							<label><input type="radio" name="enable_download" value="0" <?php echo $enable == 0? 'checked':'';?>> No</label>
						</div>
						<hr/>
						<div class="form-action">
							<input type="submit" name="submit" class="btn btn-primary" value="<?php echo ucwords($action);?>">
						</div>
					</div>
				</div>
			</div>
		</div>
		</form>
	</section>
</div>
