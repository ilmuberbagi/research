<div class="content-wrapper">
	<section class="content-header">
		<h1>Publication <small>Input Data</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'publication/action/input';?>">Publication</a></li>
			<li class="active">Input Data</li>
		</ol>
	</section>
	<?php 
		# data slide
		if(!empty($curr_pub)){
			$id = $curr_pub[0]['pub_id'];
			$title = $curr_pub[0]['title'];
			$type_id = $curr_pub[0]['pub_type_id'];
			$publication_name = $curr_pub[0]['publication_name'];
			$dept_id= $curr_pub[0]['department_id'];
			$author = $curr_pub[0]['author'];
			$abstract = $curr_pub[0]['abstract'];
			$sidr_url = $curr_pub[0]['sidr_url'];
			$sidr_upload = $curr_pub[0]['sidr_upload'];
			$sidr_verify = $curr_pub[0]['sidr_verify'];
			# detail
			$publisher = $curr_pub[0]['publisher'];
			$pub_country = $curr_pub[0]['pub_country'];
			$pub_year = $curr_pub[0]['pub_year'];
			$pub_website = $curr_pub[0]['pub_website'];
			$page = $curr_pub[0]['page'];
			$volume = $curr_pub[0]['volume'];
			$issn_isbn = $curr_pub[0]['issn_isbn'];
			$qyear = $curr_pub[0]['q_year'];
			$freq_year = $curr_pub[0]['freq_year'];
			$detail = $curr_pub[0]['detail'];
			$db_index = $curr_pub[0]['db_index'];
			$jcr = $curr_pub[0]['jcr'];
			$scr = $curr_pub[0]['scr'];
			$action = 'update';
		}else{
			$id = '';
			$title = '';
			$type_id= '';
			$publication_name = '';
			$dept_id = '';
			$author = '';
			$abstract = '';
			$sidr_url = '';
			$sidr_upload = '';
			$sidr_verify = '';
			# detail
			$publisher = '';
			$pub_country = '';
			$pub_year = '';
			$pub_website = '';
			$page = '';
			$volume = '';
			$issn_isbn = '';
			$qyear = '';
			$freq_year = '';
			$detail = '';
			$db_index = '';
			#impact factor
			$jcr = '';
			$scr = '';
			$action = 'insert';
		}
	?>
	<?php #print_r($this->session->all_userdata());?>
	<section class="content">
		<form action="<?php echo base_url().'publication/action/'.$action;?>" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="curr_pub_id" value="<?php echo $id;?>">
		<div class="row">
			<div class="col-md-7">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;Publication Data</h3>
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
							<label>Publication Title</label>
							<input type="text" name="title" class="form-control" value='<?php echo $title;?>' placeholder="Publication Title" required>
						</div>
						<div class="form-group">
							<label>Publication Name</label><br/><small>Masukan nama jurnal, jenis paten, atau konferensi ilmiah</small>
							<input type="text" name="publication_name" class="form-control" value='<?php echo $publication_name;?>' placeholder="Publication Name" required>
						</div>
						<div class="form-group">
							<label>Publication Type</label>
							<select name="type_id" class="form-control" required>
								<option value="">- Select type -</option>
								<?php if(!empty($types)){ foreach($types as $t){?>
								<option value="<?php echo $t['type_id'];?>" <?php echo $t['type_id'] == $type_id ?'selected':'';?>><?php echo $t['type_name'];?></option>
								<?php }}?>
							</select>
						</div>
						<div class="form-group">
							<label>Authors</label><br/><small>Masukan seluruh nama penulis dalam karya ilmiah dipisahkan dengan tanda koma</small>
							<textarea name="author" class="form-control" rows="1"><?php echo $author;?></textarea>
						</div>
						<div class="form-group">
							<label>Abstract</label>
							<textarea name="abstract" class="form-control description" rows="10"><?php echo $abstract;?></textarea>
						</div>
						<div class="form-group">
							<label>Upload File </label><br/><small>Allowed file type <b>PDF</b> <i class="fa fa-file-pdf-o"></i></small>
							<div class="input-group">
								<input type="file" name="userfile" class="form-input">
							</div>
						</div>
						<hr/>
						<div class="form-group">
							<label>Database Index</label><br/><small>Database Indeks ( SCOPUS, Proquest, JSTOR, ScienceDirect, dll)</small>
							<textarea name="db_index" class="form-control"><?php echo $db_index;?></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;Publication Detail</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Publisher</label><br/><small>Publisher (Assosiation/Institution)</small>
							<input type="text" name="publisher" class="form-control" value='<?php echo $publisher;?>' placeholder="Publisher">
						</div>
						<div class="form-group">
							<label>ISSN/ISBN</label>
							<input type="text" name="issn_isbn" class="form-control" value='<?php echo $issn_isbn;?>' placeholder="ISSN/ISBN">
						</div>
						<div class="form-group">
							<label>Page</label><br/><small>	Masukkan halaman. Misal : 102-105</small>
							<input type="text" name="page" class="form-control" value='<?php echo $page;?>' placeholder="Ex : 102-105">
						</div>
						<div class="form-group">
							<label>Volume</label>
							<input type="number" min="0" name="volume" class="form-control" value='<?php echo $volume;?>' placeholder="Please fill the number">
						</div>
						<div class="form-group">
							<label>Country</label>
							<input type="text" name="pub_country" class="form-control" value='<?php echo $pub_country;?>' placeholder="Country">
						</div>
						<div class="form-group">
							<label>Year (First Publish)</label>
							<input type="number" min="2000" max="<?php echo date('Y');?>" name="pub_year" class="form-control" value='<?php echo $pub_year;?>' placeholder="Please fill the number">
						</div>
						<div class="form-group">
							<label>Issue Frequent in year</label>
							<input type="number" name="freq_year" class="form-control" value='<?php echo $freq_year;?>' placeholder="Please fill the number">
						</div>
						<div class="form-group">
							<label>Website</label><br/><small>Masukan URL website yang merujuk artikel ilmiah</small>
							<input type="url" name="pub_website" class="form-control" value='<?php echo $pub_website;?>' placeholder="http://">
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-md-5">		
				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;Impact Factor</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Thomson Reuters-Journal Citation Reports (JCR)</label><br/><small>Untuk melihat impact factor, silakan kunjungi website <a href="http://www.bioxbio.com/if" target="_blank">http://www.bioxbio.com/if</a></small>
							<input type="number" name="jcr" class="form-control" step="any" min="0" value='<?php echo $jcr;?>'>
						</div>
						<div class="form-group">
							<label>SCImago Journal Rank (SJR)</label><br/><small>Untuk melihat SJR, silakan kunjungi website <a href="http://www.scimagojr.com/" target="_blank">http://www.scimagojr.com/</a></small>
							<input type="number" name="scr" class="form-control" step="any" min="0" value='<?php echo $scr;?>'>
						</div>
						<div class="form-group">
							<label>Quartile Ranking</label><br/><small>Lihat quartile ranking dari website <a href="http://www.scimagojr.com/" target="_blank">http://www.scimagojr.com/</a>.<br/>Pilih Q5 jika publikasi tidak termasuk Q1-Q4</small>
							<select name="q_year" class="form-control" required>
								<option value="">- Select Quartile Ranking -</option>
								<option value="Q1" <?php echo $qyear=="Q1"?'selected':'';?>>Q1</option>
								<option value="Q2" <?php echo $qyear=="Q2"?'selected':'';?>>Q2</option>
								<option value="Q3" <?php echo $qyear=="Q3"?'selected':'';?>>Q3</option>
								<option value="Q4" <?php echo $qyear=="Q4"?'selected':'';?>>Q4</option>
								<option value="Q5" <?php echo $qyear=="Q5"?'selected':'';?>>Q5</option>
							</select>
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
