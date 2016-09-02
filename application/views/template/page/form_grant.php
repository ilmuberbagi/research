<div class="content-wrapper">
	<section class="content-header">
		<h1>Grant <small>Input Data</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'grants/action/input';?>">grants</a></li>
			<li class="active">Input Data</li>
		</ol>
	</section>

	<?php #print_r($this->session->all_userdata());?>
	<?php $action = isset($cg[0])?'update':'insert';?>
	<section class="content">
		<form action="<?php echo base_url().'grants/action/'.$action;?>" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="grant_id" value="<?php echo isset($cg[0]['grant_id']) ? $cg[0]['grant_id']:'';?>">
		<div class="row">
			<div class="col-md-7">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;Grant Data</h3>
					</div>
					<div class="box-body">
						<?php 
						if($this->uri->segment(3) == "input"){
							if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2){?>
								<div class="form-group">
									<label>Researcher</label>
									<select name="user_id" class="form-control select" required>
										<option value="">- Select Researcher -</option>
										<?php if(!empty($researchers)){ foreach($researchers as $r){?>
										<option value="<?php echo $r['user_id'].'#'.$r['department_id'];?>"><?php echo $r['name'];?></option>
										<?php }} ?>
									</select>
								</div>
								<hr/>
						<?php } } ?>

						<div class="form-group">
							<label>Judul Penelitian</label>
							<input type="text" name="research_title" class="form-control" value='<?php echo isset($cg[0]['research_title']) ? $cg[0]['research_title']:'';?>' placeholder="Judul Penelitian" required>
						</div>
						<div class="form-group">
							<label>Nama Peneliti Utama</label><br/><small>Masukan nama peneliti utama</small>
							<input type="text" name="main_researcher" class="form-control" value='<?php echo isset($cg[0]['main_researcher']) ? $cg[0]['main_researcher']:'';?>' placeholder="Peneliti utama" required>
						</div>
						<div class="form-group">
							<label>Anggota Peneliti</label><br/><small>Masukan seluruh anggota dipisahkan dengan tanda koma</small>
							<textarea name="member_researcher" class="form-control" rows="1"><?php echo isset($cg[0]['member_researcher']) ? $cg[0]['member_researcher']:'';?></textarea>
						</div>
						<div class="form-group">
							<label>Tahun</label>
							<input type="numer" name="grant_year" class="form-control" value='<?php echo isset($cg[0]['grant_year']) ? $cg[0]['grant_year']:'';?>' placeholder="Fill the number">
						</div>
						<div class="form-group">
							<label>Nomor Kontrak</label>
							<input type="text" name="contract_number" class="form-control" value='<?php echo isset($cg[0]['contract_number']) ? $cg[0]['contract_number']:'';?>' placeholder="Ex:1159/UN2.R12/HKP.05.00/2016" required>
						</div>
					</div>
				</div>

				<!-- sumber dana -->
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;Sumber Dana</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<div>Riset/Pengabdian Masyarakat <span>*)</span></div>
							<label><input type="radio" name="sd_riset" class="" value="0" <?php echo (isset($cg[0]) && $cg[0]['sd_riset']) == 0 ? 'checked':'';?>> Riset</label>
							<label><input type="radio" name="sd_riset" class="" value="1" <?php echo (isset($cg[0]) && $cg[0]['sd_riset']) == 1 ? 'checked':'';?>> Pengabdian Masyarakat</label>
						</div>
						<div class="form-group">
							<label>Nama Hibah</label>
							<input type="text" name="sd_hibah" class="form-control" value='<?php echo isset($cg[0]['sd_hibah']) ? $cg[0]['sd_hibah']:'';?>' placeholder="Nama Hibah">
						</div>
						<div class="form-group">
							<label>Nama Skema Hibah</label>
							<input type="text" name="sd_skema_hibah" class="form-control" value='<?php echo isset($cg[0]['sd_skema_hibah']) ? $cg[0]['sd_skema_hibah']:'';?>' placeholder="Nama Skema Hibah">
						</div>
						<div class="form-group">
							<label>Sumber Dana <span>*</span></label><br/><small>UI/Luar UI/Internasional</small>
							<input type="text" name="sd_source" class="form-control" value='<?php echo isset($cg[0]['sd_source']) ? $cg[0]['sd_source']:'';?>' placeholder="Ex: UI/Dikti/Luar UI">
						</div>
					</div>
				</div>

				<!-- Keterangan lain -->
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;Keterangan Tambahan</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="report_progress" class="" value="1" <?php echo isset($cg[0]) && $cg[0]['report_progress'] == 1 ? 'checked':'';?>> Laporan Kemajuan
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="last_report" class="" value="1" <?php echo isset($cg[0]) && $cg[0]['last_report'] == 1 ? 'checked':'';?>> Laporan Akhir
								</label>
							</div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="sp" class="" value="1" <?php echo isset($cg[0]) && $cg[0]['sp'] == 1 ? 'checked':'';?>> BAST/SP
								</label>
							</div>
						</div>
						<div class="form-group">
							<label>Keterangan Lain</label>
							<textarea name="description" class="form-control" rows="4"><?php echo isset($cg[0]['description']) ? $cg[0]['description']:'';?></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;Status Penelitian</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Single/Multi Year(s)</label><br/>
							<input type="radio" name="sd_riset" class="" value="0" <?php echo isset($cg[0]) && $cg[0]['sd_riset'] == 0 ? 'checked':'';?>> Single
							<input type="radio" name="sd_riset" class="" value="1" <?php echo isset($cg[0]) && $cg[0]['sd_riset'] == 1 ? 'checked':'';?>> Multi
						</div>
						<div class="form-group">
							<label>Submisi Proposal</label><br/>
							<input type="radio" name="st_submision" class="" value="0" <?php echo isset($cg[0]) && $cg[0]['st_submision'] == 0 ? 'checked':'';?>> Baru
							<input type="radio" name="st_submision" class="" value="1" <?php echo isset($cg[0]) && $cg[0]['st_submision'] == 1 ? 'checked':'';?>> Lanjutan
						</div>
						<div class="form-group">
							<label>Seleksi</label>
							<input type="text" name="selection" class="form-control" value='<?php echo isset($cg[0]) ? $cg[0]['selection']:'';?>' placeholder="Seleksi">
						</div>
						<div class="form-group">
							<label>Website (URL)</label>
							<input type="url" name="site" class="form-control" value='<?php echo isset($cg[0]) ? $cg[0]['site']:'';?>' placeholder="http://">
						</div>
					</div>
				</div>
				
				<!-- dana hibah -->
				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;Dana Penelitian</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Total yang diajukan (Rp)</label><br/><small>Masukkan angka murni (tanpa tanda baca)</small>
							<input type="number" min="0" name="total_proposed" class="form-control" value='<?php echo isset($cg[0]) ? $cg[0]['total_proposed'] :'';?>' placeholder="Fill the number">
						</div>
						<div class="form-group">
							<label>Total yang disetujui (Rp)</label><br/><small>Masukkan angka murni (tanpa tanda baca)</small>
							<input type="number" min="0" name="total_approved" class="form-control" value='<?php echo isset($cg[0]) ? $cg[0]['total_approved'] :'';?>' placeholder="Fill the number">
						</div>
						<div class="form-group">
							<label>Tahun 1 (Rp)</label><br/><small>Masukkan angka murni (tanpa tanda baca)</small>
							<input type="number" min="0" name="year_1" class="form-control" value='<?php echo isset($cg[0]) ? $cg[0]['year_1'] :'';?>' placeholder="Fill the number">
						</div>
						<div class="form-group">
							<label>Tahun 2 (Rp)</label><br/><small>Masukkan angka murni (tanpa tanda baca)</small>
							<input type="number" min="0" name="year_2" class="form-control" value='<?php echo isset($cg[0]) ? $cg[0]['year_2'] :'';?>' placeholder="Fill the number">
						</div>
						<div class="form-group">
							<label>Tahun 3 (Rp)</label><br/><small>Masukkan angka murni (tanpa tanda baca)</small>
							<input type="number" min="0" name="year_3" class="form-control" value='<?php echo isset($cg[0]) ? $cg[0]['year_3'] :'';?>' placeholder="Fill the number">
						</div>
						<hr/>
						<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Submit" name="submit">
						</div>
					</div>
				</div>
			</div>
			
		</div>
		</form>
	</section>
</div>
