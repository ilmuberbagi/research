<div class="content-wrapper">
	<section class="content-header">
		<h1>Backup Databases</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Backup Databases</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-cloud-download"></i> &nbsp;<?php echo isset($title) ? $title : 'Backup Databases';?></h3>
					</div>
					<div class="box-body">
						<div class="callout callout-default">
							<div class="text-bold" style="font-size:2em"><i class="fa fa-info-circle"></i> Note</div>
							<p>Untuk menjaga keamanan data, pastikan lakukan backup data secara berkala.<br/>Silakan simpan file backup di komputer lokal atau media penyimpanan lainnya.</p>
							<p><a style="color:#222; text-decoration:none" href="<?php echo site_url().'dashboard/backup/commit';?>" class="btn btn-default"> <i class="fa fa-download"></i> Backup Databases </a></p>
						</div>					
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
