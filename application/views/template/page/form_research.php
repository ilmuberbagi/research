<div class="content-wrapper">
	<section class="content-header">
		<h1>Research <small>Proposal</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'dashboard/research/data';?>">Research Data</a></li>
			<li class="active">Proposal</li>
		</ol>
	</section>
	<?php 
		# data slide
		if(!empty($research)){
			$id = $research[0]['research_id'];
			$title = $research[0]['research_title'];
			$attach = $research[0]['attachment'];
			$content = $research[0]['description'];
			$funding = $research[0]['funding'];
			$action = 'update';
		}else{
			$id = '';
			$title = '';
			$attach = '';
			$content = '';
			$funding = '';
			$action = 'insert';
		}
	?>
	<section class="content">
		<form action="<?php echo base_url().'dashboard/'.$action.'/research';?>" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="research_id" value="<?php echo $id;?>">
		<div class="row">
			<div class="col-md-7">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;<?php echo $title ? $title : 'Research Proposal';?></h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Research Title</label>
							<input type="text" name="research_title" class="form-control" value='<?php echo $title;?>' placeholder="Research Title" required>
						</div>
						<div class="form-group">
							<label>Research Field</label>
							<select name="field_id" class="form-control select" required>
								<?php if(!empty($field)){ foreach($field as $f){?>
								<option value="<?php echo $f['field_id'];?>"><?php echo $f['field_name'];?></option>
								<?php }}?>
							</select>
						</div>
						<div class="form-group">
							<label>Education Level</label>
							<select name="research_level" class="form-control select" required>
								<option value="undergraduate">Undergraduate</option>
								<option value="graduate">Graduate</option>
								<option value="doctorate">Doctorate</option>
							</select>
						</div>
						<div class="form-group">
							<label>Abstract</label>
							<textarea name="description" class="form-control description" placeholder="Abstract"><?php echo $content;?></textarea>
						</div>
						<div class="form-group">
							<label>Attachment </label><br/><small>Allowed file type <b>PDF</b> <i class="fa fa-file-pdf-o"></i></small>
							<div class="input-group">
								<input type="file" name="userfile" class="" value="<?php echo $attach;?>">
							</div>
						</div>
						<div class="form-group">
							<label>Funding</label>
							<input type="number" name="funding" class="form-control" value="<?php echo $funding;?>" required>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="box box-warning">
					<div class="box-header with-border">
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Researcher</label>
							<input type="text" name="user_id" class="form-control" value='<?php echo $this->session->userdata('name');?>' readonly>
						</div>
						<div class="form-group">
							<label>Attachment Preview</label>
							<?php if($attach == ""){?>
							<img src="<?php echo site_url().'uploads/attachments/default.png';?>" class="img-responsive center">
							<?php }else{?>
							<iframe class=".embed-responsive-item" src="<?php echo $attach;?>" frameborder="0" style="width:100%;height:400px" allowfullscreen></iframe>
							<?php } ?>
						</div>
						<hr/>
						<div class="form-action">
							<input type="submit" name="submit" class="btn btn-primary" value="Submit">
						</div>
					</div>
				</div>
			</div>
		</div>
		</form>
	</section>
</div>
