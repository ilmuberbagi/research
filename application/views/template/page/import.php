<div class="content-wrapper">
	<section class="content-header">
		<h1>Publication <small>Import Data (Excel)</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'publication';?>">Publication</a></li>
			<li class="active">Import Publication</li>
		</ol>
	</section>

	<section class="content">
		<form action="<?php echo base_url().'publication/upload_form_publication';?>" method="POST" enctype="multipart/form-data">
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
							<p>Untuk memasukkan data publikasi dengan import data, silahkan Anda download format form publikai yang telah disediakan.<br/>Setelah selesai diisi (secara offline), Anda bisa mengunggah lewat form di bawah ini.</p>
							<p><a style="color:#222; text-decoration:none" href="<?php echo site_url().'uploads/publication/form/template.xls';?>" class="btn btn-default"> <i class="fa fa-download"></i> Download form pengisian publikasi offline</a></p>
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
