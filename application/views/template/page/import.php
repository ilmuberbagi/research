<?php
	$form_title = 'Publication <small>Import Data (Excel)</small>';
	$crumb = 'Publication';
	$file_source = 'form_publication.xls';
	$form_action = base_url().'publication/upload_form_publication';
	if($this->uri->segment(1) == 'grants'){
		$file_source = 'form_grant.xls';
		$form_title = 'Grant <small>Import Data (Excel)</small>';
		$crumb = 'Grant';
		$form_action = base_url().'grants/upload_form_grant';
	}	
?>

<div class="content-wrapper">
	<section class="content-header">
		<h1><?php echo $form_title;?></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().$this->uri->segment(1);?>"><?php echo $crumb;?></a></li>
			<li class="active">Import <?php echo $crumb;?></li>
		</ol>
	</section>

	<section class="content">
		<form action="<?php echo $form_action;?>" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="department_id" value="<?php echo $this->session->userdata('department_id');?>">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-cloud-upload"></i> &nbsp;<?php echo $title ? $title : 'Upload File';?></h3>
					</div>
					<div class="box-body">
						<div class="callout callout-warning">
							<div class="text-bold" style="font-size:2em"><i class="fa fa-info-circle"></i> Note</div>
							<p>Untuk memasukkan data <?php echo $crumb;?> dengan import data, silahkan Anda download format form <?php echo $crumb;?> yang telah disediakan.<br/>Setelah selesai diisi (secara offline), Anda bisa mengunggah lewat form di bawah ini.</p>
							<p><a style="color:#222; text-decoration:none" href="<?php echo site_url().'uploads/'.strtolower($crumb).'/form/'.$file_source;?>" class="btn btn-default"> <i class="fa fa-download"></i> Download form pengisian <?php echo $crumb;?> offline</a></p>
						</div>
						
						<div class="form-group">
							<label>Upload File Excel</label>
							<div class="input-group">
								<input type="file" name="userfile" class="">
							</div>
						</div>
						<hr/>
						<div class="form-action">
							<input type="submit" name="submit" class="btn btn-primary" value="Import">
						</div>
					</div>
				</div>
			</div>
		</div>
		</form>
	</section>
</div>
