<style>
	.table.potrait th{ text-align:right; background:#EEE}
</style>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Publication <small>Detail</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'publication/action/input';?>">Publication</a></li>
			<li class="active">Detail</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title"><i class="fa fa-file-text"></i> View Detail Publication</h3>
						<div class="box-tools pull-right">
							<?php if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2){?>
								<?php if($curr_pub[0]['sidr_verify'] == 0){?>
								<a class="btn btn-success pull-right btn-sm" href="<?php echo site_url().'publication/action/sidr_verify/'.$curr_pub[0]['pub_id'];?>">Verify</a>
							<?php } } ?>
						</div>
					</div>
					<div class="box-body">
						<table class="table potrait">
							<tr><th></th><th style="text-align:left">Publication Data</th></tr>
							<tr>
								<th width="150">Publication Title</th>
								<td><?php echo $curr_pub[0]['title'];?></td>
							</tr>
							<tr>
								<th width="150">Publication Name</th>
								<td><?php echo $curr_pub[0]['publication_name'];?></td>
							</tr>
							<tr>
								<th width="150">Publication Type</th>
								<td><?php echo $curr_pub[0]['type_name'];?></td>
							</tr>
							<tr>
								<th>Authors</th>
								<td><?php echo $curr_pub[0]['author'];?></td>
							</tr>
							<tr>
								<th>Abstract</th>
								<td><?php echo $curr_pub[0]['abstract'];?></td>
							</tr>
							<tr>
								<th>Database Index</th>
								<td><?php echo $curr_pub[0]['db_index'];?></td>
							</tr>
							<tr>
								<th>Status</th>
								<td><?php echo $curr_pub[0]['sidr_verify'] == 1? '<i class="fa fa-check-circle text-success"></i>':'<i class="fa fa-times-circle text-danger"></i>';?></td>
							</tr>
							<tr><th></th><th style="text-align:left">Publication Detail</th></tr>
							<tr>
								<th>Publisher</th>
								<td><?php echo $curr_pub[0]['publisher'];?></td>
							</tr>
							<tr>
								<th>ISSN/ISBN</th>
								<td><?php echo $curr_pub[0]['issn_isbn'];?></td>
							</tr>
							<tr>
								<th>Page</th>
								<td><?php echo $curr_pub[0]['page'];?></td>
							</tr>
							<tr>
								<th>Volume</th>
								<td><?php echo $curr_pub[0]['volume'];?></td>
							</tr>
							<tr>
								<th>Year</th>
								<td><?php echo $curr_pub[0]['pub_year'];?></td>
							</tr>
							<tr>
								<th>Issue Freq in year</th>
								<td><?php echo $curr_pub[0]['freq_year'];?></td>
							</tr>
							<tr>
								<th>Website</th>
								<td><?php echo $curr_pub[0]['pub_website'];?></td>
							</tr>
							<tr><th></th><th style="text-align:left">Impact Factor</th></tr>
							<tr>
								<th>JCR</th>
								<td><?php echo $curr_pub[0]['jcr'];?></td>
							</tr>
							<tr>
								<th>SJR</th>
								<td><?php echo $curr_pub[0]['scr'];?></td>
							</tr>
							<tr><th></th><th style="text-align:left">File Preview</th></tr>
							<tr><th></th><th><button class="btn btn-default btn-block btn-sm tfp">Toggle file preview</button></th></tr>
							<tr class="filepreview" style="display:none">
								<th></th>
								<td>
									<?php if($curr_pub[0]['sidr_upload'] == 1){?>
									<iframe class=".embed-responsive-item" src="<?php echo $curr_pub[0]['sidr_url'];?>" frameborder="0" style="width:100%; height:700px" allowfullscreen></iframe>
									<?php }else{?>
									No file uplaoded.
									<?php }?>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>