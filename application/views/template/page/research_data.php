<div class="content-wrapper">
	<section class="content-header">
		<h1>Research Data</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Research Data</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-book"></i> &nbsp; Research Data</h3>
				<div class="box-tools pull-right">
					<a class="btn btn-default" href="<?php echo base_url().'dashboard/create/researchproposal';?>"><i class="fa fa-plus-circle"></i></a>
				</div>
			</div>
			<div class="box-body">
				<table  class="table table-striped table-hover data-research">
				<thead>
					<th>No</th>
					<th>Research Title</th>
					<th>Date Input</th>
					<th>Status</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php if(!empty($research)){ $no=0; foreach($research as $a){ $no++; ?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $a['research_title'];?></td>
					<td><?php echo date('d/m/Y', strtotime($a['date_input']));?></td>
					<td><?php echo $a['status']==1?'<span class="label label-success">Granted</span>':'<span class="label label-default">Pending</span>';?></td>
					<td>
						<span class="btn-group">
							<a href="<?php echo site_url().'dashboard/edit/research/'.$a['research_id'];?>" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a>
							<a href="#" class="btn btn-sm btn-default"  data-toggle="modal" data-target="#modalDelete" onclick="return delete_article('<?php echo $a['research_id'];?>')"><i class="fa fa-trash"></i></a>
						</span>
					</td>
				</tr>
				<?php }}?>
				</tbody>
				</table>
			</div>
		</div>
	</section>
</div>


<!-- modal delete -->
<div class="modal inmodal" id="modalDelete" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content animated bounceInDown">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true"><i class="fa fa-remove"></i></span><span class="sr-only">Close</span></button>
				<i class="fa fa-trash modal-icon"></i>
				<h4 class="modal-title">Delete Research Proposal</h4>
				<div>Remove Research Proposal from list.</div>
			</div>
			<form name="formdelete" action="<?php echo base_url().'dashboard/delete/research';?>" method="POST">
			<div class="modal-body">
				<input type="hidden" name="research_id" id="research_id">
				<div class="msg"></div>
			</div>
			<div class="modal-footer">
				<input type="reset" name="reset" value="Cancel" class="btn btn-white" data-dismiss="modal">
				<input type="submit" name="move" value="Remove" class="btn btn-danger action">
			</div>
			</form>
		</div>	
	</div>
</div>
