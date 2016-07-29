<div class="content-wrapper">
	<section class="content-header">
		<h1>Publication <small>Author</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'publication/action/input';?>">Publication</a></li>
			<li class="active">Author Publication</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header"><h3 class="box-title"><i class="fa fa-file-text"></i> Publication Author</h3></div>
					<div class="box-body">
						<table class="table">
							<tr>
								<th>Publication Title</th>
								<td><?php echo $curr_pub[0]['title'];?></td>
							</tr>
							<tr>
								<th>Type</th>
								<td><?php echo $curr_pub[0]['type_name'];?></td>
							</tr>
							<tr>
								<th>Date Input</th>
								<td><?php echo date('d/m/Y H:i', strtotime($curr_pub[0]['date_input']));?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="box box-primary">		
					<div class="box-header">
						<h3 class="box-title"><i class="fa fa-users"></i> Author List</h3>
						<div class="box-tools pull-right">
							<span class="btn-group">
								<button class="btn btn-default btn-sm" data-toggle="modal" data-target="#modalAuthor"><i class="fa fa-plus"></i></button>
							</span>
						</div>
					</div>
					<div class="box-body">
						<table class="table table-bordered">
							<tr>
								<th>No</th>
								<th>NIP/NPM</th>
								<th>Name</th>
								<th>Department</th>
							</tr>
							<?php if(!empty($authors)){ $no=0; foreach($authors as $a){ $no++;?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $a['user_code'];?></td>
								<td><?php echo $a['name'];?></td>
								<td><?php echo $a['department_name'];?></td>
							</tr>
							<?php }}else{?>
							<tr><td colspan="4"></td></tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- modal author -->
<div class="modal inmodal" id="modalAuthor" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated bounceInDown">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true"><i class="fa fa-remove"></i></span><span class="sr-only">Close</span></button>
				<i class="fa fa-users modal-icon"></i>
				<h4 class="modal-title">Add Author</h4>
				<div>Add publication author.</div>
			</div>
			<form name="formdelete" action="<?php echo base_url().'publication/action/save_author';?>" method="POST">
			<div class="modal-body">
				<input type="hidden" name="pub_id" id="pub_id">
				<div class="form-group">
					<label>Author</label>
					<select name="author_id" class="form-control select" style="width:100%">
						<?php if(!empty($allauthors)){ foreach($allauthors as $au){?>
						<option value="<?php echo $au['user_id'];?>"><?php echo $au['name'];?></option>
						<?php }} ?>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<input type="reset" name="reset" value="Cancel" class="btn btn-white" data-dismiss="modal">
				<input type="submit" name="move" value="Save" class="btn btn-primary action">
			</div>
			</form>
		</div>	
	</div>
</div>


