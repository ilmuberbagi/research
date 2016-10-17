<style>
	.table.potrait th{ text-align:right; background:#EEE}
</style>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Grant <small>Detail</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'grants/action/input';?>">Grants</a></li>
			<li class="active">Detail</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title"><i class="fa fa-file-text"></i> View Detail Grant</h3>
						<div class="box-tools pull-right">
							<?php if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2){?>
								<?php if($cg[0]['st_granted'] == 0){?>
								<a class="btn btn-success pull-right btn-sm" href="<?php echo site_url().'grants/action/granted/'.$cg[0]['grant_id'];?>">Granted</a>
							<?php } } ?>
						</div>
					</div>
					<div class="box-body">
						<table class="table potrait">
							<tr><th></th><th style="text-align:left">Grant Data</th></tr>
							<tr>
								<th width="150">Judul Penelitian</th>
								<td><?php echo $cg[0]['research_title'];?></td>
							</tr>
							<tr>
								<th width="150">Nama Peneliti Utama</th>
								<td><?php echo $cg[0]['main_researcher'];?></td>
							</tr>
							<tr>
								<th width="150">Anggta Peneliti</th>
								<td><?php echo $cg[0]['member_researcher'];?></td>
							</tr>
							<tr>
								<th>Nomor Kontrak</th>
								<td><?php echo $cg[0]['contract_number'];?></td>
							</tr>
							<tr>
								<th>Status</th>
								<td><?php echo $cg[0]['st_granted'] == 1? '<i class="fa fa-check-circle text-success"></i>':'<i class="fa fa-times-circle text-danger"></i>';?></td>
							</tr>
							<tr><th></th><th style="text-align:left">Status Penelitian</th></tr>
							<tr>
								<th>Single/Multi Year(s)</th>
								<td><?php echo $cg[0]['st_year'] == 1 ? 'Multi':'Single';?></td>
							</tr>
							<tr>
								<th>Submisi Proposal</th>
								<td><?php echo $cg[0]['st_submision']==1? 'Lanjutan':'Baru';?></td>
							</tr>
							<tr>
								<th>Seleksi</th>
								<td><?php echo $cg[0]['selection'];?></td>
							</tr>
							<tr>
								<th>Website</th>
								<td><?php echo $cg[0]['site'];?></td>
							</tr>
							<tr><th></th><th style="text-align:left">Sumber Dana</th></tr>
							<tr>
								<th>Riset/PengMas</th>
								<td><?php echo $cg[0]['sd_riset'] == 1? 'Pengabdian Masyarakat':'Riset';?></td>
							</tr>
							<tr>
								<th>Nama Hibah</th>
								<td><?php echo $cg[0]['sd_hibah'];?></td>
							</tr>
							<tr>
								<th>Nama Skema Hibah</th>
								<td><?php echo $cg[0]['sd_skema_hibah'];?></td>
							</tr>
							<tr>
								<th>Sumber Dana<br/><small>UI/Luar UI/Internasional</small></th>
								<td><?php echo $cg[0]['sd_source'];?></td>
							</tr>
							<tr><th></th><th style="text-align:left">Dana Penelitian</th></tr>
							<tr>
								<th>Total yang diajukan (Rp)</th>
								<td><?php echo number_format($cg[0]['total_proposed']);?></td>
							</tr>
							<tr>
								<th>Total yang disetujui (Rp)</th>
								<td><?php echo number_format($cg[0]['total_approved']);?></td>
							</tr>
							<tr>
								<th>Tahun 1 (Rp)</th>
								<td><?php echo number_format($cg[0]['year_1']);?></td>
							</tr>
							<tr>
								<th>Tahun 2 (Rp)</th>
								<td><?php echo number_format($cg[0]['year_2']);?></td>
							</tr>
							<tr>
								<th>Tahun 3 (Rp)</th>
								<td><?php echo number_format($cg[0]['year_3']);?></td>
							</tr>
							<tr><th></th><th style="text-align:left">Keterangan Tambahan</th></tr>
							<tr>
								<th>Laporan Kemajuan</th>
								<td><?php echo $cg[0]['report_progress'] == 1? '<i class="fa fa-check-circle text-success"></i>':'<i class="fa fa-times-circle text-danger"></i>';?></td>
							</tr>
							<tr>
								<th>Laporan Akhir</th>
								<td><?php echo $cg[0]['last_report'] == 1? '<i class="fa fa-check-circle text-success"></i>':'<i class="fa fa-times-circle text-danger"></i>';?></td>
							</tr>
							<tr>
								<th>BAST/SP</th>
								<td><?php echo $cg[0]['sp'] == 1? '<i class="fa fa-check-circle text-success"></i>':'<i class="fa fa-times-circle text-danger"></i>';?></td>
							</tr>
							<tr>
								<th>Keterangan Lain</th>
								<td><?php echo $cg[0]['description'];?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>