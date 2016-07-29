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
			$dept_id= $curr_pub[0]['department_id'];
			$author = $curr_pub[0]['author'];
			$sidr_url = $curr_pub[0]['sidr_url'];
			$sidr_upload = $curr_pub[0]['sidr_upload'];
			$sidr_verify = $curr_pub[0]['sidr_verify'];
			# detail
			$publisher = $curr_pub[0]['publisher'];
			$pub_country = $curr_pub[0]['pub_country'];
			$pub_year = $curr_pub[0]['pub_year'];
			$pub_website = $curr_pub[0]['pub_website'];
			$pub_volume = $curr_pub[0]['pub_volume'];
			$page = $curr_pub[0]['page'];
			$paten = $curr_pub[0]['paten'];
			$issn_isbn = $curr_pub[0]['issn_isbn'];
			$q_year = $curr_pub[0]['q_year'];
			$freq_year = $curr_pub[0]['freq_year'];
			$detail = $curr_pub[0]['detail'];
			$db_index = $curr_pub[0]['db_index'];
			#impact factor
			$jcr = $curr_pub[0]['jcr'];
			$scr = $curr_pub[0]['scr'];
			
			$action = 'update';
		}else{
			$id = '';
			$title = '';
			$dept_id = '';
			$author = '';
			$sidr_url = '';
			$sidr_upload = '';
			$sidr_verify = '';
			# detail
			$publisher = '';
			$pub_country = '';
			$pub_year = '';
			$pub_website = '';
			$pub_volume = '';
			$page = '';
			$paten = '';
			$issn_isbn = '';
			$q_year = '';
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
						<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;<?php echo $title ? $title : 'Input Data';?></h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Publication Title</label>
							<input type="text" name="title" class="form-control" value='<?php echo $title;?>' placeholder="Publication Title" required>
						</div>
						<div class="form-group">
							<label>Publication Type</label>
							<select name="type_id" class="form-control select" required>
								<?php if(!empty($types)){ foreach($types as $t){?>
								<option value="<?php echo $t['type_id'];?>"><?php echo $t['type_name'];?></option>
								<?php }}?>
							</select>
						</div>
						<div class="form-group">
							<label>Author</label>
							<input type="text" name="author" class="form-control" value='<?php echo $this->lib_general->get_name_from_user_id($this->session->userdata('user_id'));?>' readonly>
						</div>
						<div class="form-group">
							<label>Upload SIDR </label><br/><small>Allowed file type <b>PDF</b> <i class="fa fa-file-pdf-o"></i></small>
							<div class="input-group">
								<input type="file" name="userfile" class="">
							</div>
						</div>
					</div>
				</div>
				
				<!-- detail publikasi -->
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;Publication Detail</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label>Publisher</label>
							<input type="text" name="publisher" class="form-control" value='<?php echo $publisher;?>' placeholder="Publisher (Assosiation/Institution)">
						</div>
						<div class="form-group">
							<label>ISSN/ISBN</label>
							<input type="text" name="issn_isbn" class="form-control" value='<?php echo $issn_isbn;?>' placeholder="ISSN/ISBN">
						</div>
						<div class="form-group">
							<label>Page</label>
							<input type="text" name="page" class="form-control" value='<?php echo $page;?>' placeholder="Page">
						</div>
						<div class="form-group">
							<label>Paten</label>
							<input type="text" name="paten" class="form-control" value='<?php echo $paten;?>' placeholder="Paten">
						</div>
						<div class="form-group">
							<label>Country</label>
							<input type="text" name="pub_country" class="form-control" value='<?php echo $pub_country;?>' placeholder="Country">
						</div>
						<div class="form-group">
							<label>Year (First Publish)</label>
							<input type="number" min="2000" max="<?php echo date('Y');?>" name="pub_year" class="form-control" value='<?php echo $pub_year;?>'>
						</div>
						<div class="form-group">
							<label>Ranking Quartil</label>
							<input type="text" name="q_year" class="form-control" value='<?php echo $q_year;?>'>
						</div>
						<div class="form-group">
							<label>Issue Frequent in year</label>
							<input type="number" min="0" name="q_year" class="form-control" value='<?php echo $q_year;?>'>
						</div>
						<div class="form-group">
							<label>Detail</label>
							<textarea name="detail" class="form-control" rows="3"><?php echo $detail;?></textarea>
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
							<label>Thomson Reuters-Journal Citation Reports (JCR)</label>
							<input type="number" name="jcr" class="form-control" step="any" min="0" value='<?php echo $jcr;?>'>
						</div>
						<div class="form-group">
							<label>SCImago Journal Rank (SJR)</label>
							<input type="number" name="scr" class="form-control" step="any" min="0" value='<?php echo $scr;?>'>
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
