<div class="content-wrapper">
	<section class="content-header">
		<h1>Create slide</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'dashboard/slideshow';?>">slide</a></li>
			<li class="active">Create slide</li>
		</ol>
	</section>
	<?php 
		# data slide
		if(!empty($slide)){
			$id = $slide[0]['slide_id'];
			$title = $slide[0]['caption_title'];
			$image = $slide[0]['img_url'];
			$content = $slide[0]['caption_text'];
			$action = 'update';
		}else{
			$id = '';
			$title = '';
			$image = '';
			$content = '';
			$action = 'insert';
		}
	?>
	<section class="content">
		<form action="<?php echo base_url().'dashboard/'.$action.'/slide';?>" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="slide_id" value="<?php echo $id;?>">
		<div class="row">
			<div class="col-md-8">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-image"></i> &nbsp;<?php echo $title ? $title : 'Create slideshow';?></h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Slide Title</label>
							<input type="text" name="caption_title" class="form-control" value='<?php echo $title;?>' placeholder="Caption Title">
						</div>
						<div class="form-group">
							<label>Content</label>
							<textarea name="caption_text" class="form-control description" placeholder="Caption Text"><?php echo $content;?></textarea>
						</div>
						<div class="form-group">
							<label>Image Cover</label>
							<div class="input-group">
								<input type="file" name="userfile" class="" value="<?php echo $image;?>">
							</div>
						</div>
						<div class="form-action">
							<input type="submit" name="submit" class="btn btn-primary" value="<?php echo ucwords($action);?>">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="box box-info">
					<div class="box-header with-border">
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Author</label>
							<input type="text" name="user_id" class="form-control" value='<?php echo $this->session->userdata('name');?>' readonly>
						</div>
						<div class="form-group">
							<label>Image</label>
							<div class="">
								<img src="<?php echo $image? $image: site_url().'uploads/default.jpg';?>" class="img-responsive">
							</div>
						</div>
						<div class="form-group">
							<label>Status</label>
							<div class="input-group">
								<select name="status" class="form-control">
									<option value="1">Show</option>
									<option value="0">Hidden</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</form>
	</section>
</div>
