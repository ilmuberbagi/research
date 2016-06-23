<div class="content-wrapper">
	<section class="content-header">
		<h1>Create News</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'dashboard/news';?>">News</a></li>
			<li class="active">Create News</li>
		</ol>
	</section>
	<?php 
		# data news
		if(!empty($news)){
			$id = $news[0]['news_id'];
			$title = $news[0]['news_title'];
			$image = $news[0]['thumbnail_url'];
			$author = $news[0]['user_id'];
			$content = $news[0]['news_content'];
			$type = $news[0]['type'];
			$action = 'update';
		}else{
			$id = '';
			$title = '';
			$image = '';
			$type = '';
			$author = $this->session->userdata('user_id');
			$content = '';
			$action = 'insert';
		}
	?>
	<section class="content">
		<form action="<?php echo base_url().'dashboard/'.$action.'/news';?>" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="news_id" value="<?php echo $id;?>">
		<div class="row">
			<div class="col-md-8">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-newspaper-o"></i> &nbsp;<?php echo $title ? $title : 'Create News';?></h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>News Title</label>
							<input type="text" name="news_title" class="form-control" value='<?php echo $title;?>' placeholder="News Title">
						</div>
						<div class="form-group">
							<label>Content</label>
							<textarea name="news_content" class="form-control description" placeholder="News Content"><?php echo $content;?></textarea>
						</div>
						<div class="form-group">
							<label>Image Cover</label>
							<div class="input-group">
								<input type="file" name="userfile" class="" value="<?php echo $image;?>">
							</div>
						</div>
						<div class="form-group">
							<label>Post Type</label>
							<select name="type" class="form-control">
								<option value="1" <?php echo $type == 1? 'selected':'';?>>News</option>
								<option value="2" <?php echo $type == 2? 'selected':'';?>>Conferences and Seminars</option>
								<option value="3" <?php echo $type == 3? 'selected':'';?>>Grant and Incentives</option>
							</select>
						</div>
						<hr/>
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
							<input type="text" name="user_id" class="form-control" value='<?php echo $this->session->userdata('name');?>' placeholder="News Title">
						</div>
						<div class="form-group">
							<label>Image</label>
							<div class="">
								<img src="<?php echo $image ? $image : site_url().'uploads/default.jpg';?>" class="img-responsive">
							</div>
						</div>
						<div class="form-group">
							<label>Status</label>
							<select name="status" class="form-control">
								<option value="1">Show</option>
								<option value="0">Hidden</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		</form>
	</section>
</div>

<!-- modal images -->
<div id="modalImages" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
				<h4 class="modal-title"><i class="fa fa-image"></i> Select Image Asset</h4>
			</div>
			<div class="modal-body" id="image-content">
				<div id="loadingDiv" style="text-align:center"><i class="fa fa-spinner fa-spin fa-3x"></i></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
