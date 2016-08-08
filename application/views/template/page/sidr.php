<div class="content-wrapper">
	<section class="content-header">
		<h1>Publication <small>SIDR</small></h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?php echo base_url().'publication/action/input';?>">Publication</a></li>
			<li class="active">Preview SIDR</li>
		</ol>
	</section>

	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header"><h3 class="box-title"><i class="fa fa-file-text"></i> Preview SIDR</h3></div>
					<div class="box-body">
						<table class="table">
							<tr>
								<th width="150">Publication Title</th>
								<td><?php echo $curr_pub[0]['title'];?></td>
							</tr>
							<tr>
								<th>Authors</th>
								<td><?php echo $curr_pub[0]['author'];?></td>
							</tr>
							<tr>
								<th>SIDR Verify</th>
								<td><?php echo $curr_pub[0]['sidr_verify'] == 0 ? '<span class="badge label-default">Unverified</span>':'<span class="badge label-success">Verified</span>';?>
									<?php if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2){?>
										<?php if($curr_pub[0]['sidr_verify'] == 0){?>
										<a class="btn btn-success pull-right" href="<?php echo site_url().'publication/action/sidr_verify/'.$curr_pub[0]['pub_id'];?>">Verify</a>
									<?php } } ?>
								</td>
							</tr>
							<tr>
								<th>Preview</th>
								<td>
								<?php if($curr_pub[0]['sidr_url'] == ""){?>
									<img src="<?php echo site_url().'uploads/attachments/default.png';?>" class="img-responsive center">
								<?php }else{?>
									<iframe class=".embed-responsive-item" src="<?php echo $curr_pub[0]['sidr_url'];?>" frameborder="0" style="width:100%; height:700px" allowfullscreen></iframe>
								<?php } ?>
								</td>
							</tr>
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
				<input type="hidden" name="pub_id" id="pub_id" value="<?php echo $curr_pub[0]['pub_id'];?>">
				<div class="form-group">
					<label>Author</label>
					<select name="authors[]" class="form-control select" style="width:100%" multiple required>
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


