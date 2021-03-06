<div class="content-wrapper">
	<section class="content-header">
		<h1>News</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url().'dashboard';?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">News</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-newspaper-o"></i> &nbsp; News</h3>
				<div class="box-tools pull-right">
					<a class="btn btn-default" href="<?php echo base_url().'dashboard/create/news';?>"><i class="fa fa-plus-circle"></i></a>
				</div>
			</div>
			<div class="box-body">
				<table  class="table table-striped table-hover data-news">
				<thead>
					<th>No</th>
					<th>News Title</th>
					<th>Posted</th>
					<th>Last Update</th>
					<th>Type</th>
					<th>Status</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php 
					if(!empty($news)){ $no=0; foreach($news as $a){ $no++; 	?>
				<tr>
					<td><?php echo $no;?></td>
					<td>
						<?php echo $a['news_title'];?><br/>
						<small>Author : <?php echo $a['name'];?></small>
					</td>
					<td><?php echo date('d/m/Y', strtotime($a['date_posted']));?></td>
					<td><?php echo date('d/m/Y H:i', strtotime($a['last_updated']));?></td>
					<td>
						<?php 
							if($a['type'] == 1) echo "<span class='label label-primary'>News</label>";
							else if($a['type'] == 2) echo "<span class='label label-warning'>Seminars</label>";
							else echo "<span class='label label-info'>Grant</label>";
						?>
					</td>
					<td><?php echo $a['status']==1?'<span class="label label-success">Active</span>':'<span class="label label-default">Inactive</span>';?></td>
					<td>
						<span class="btn-group">
							<a href="<?php echo site_url().'dashboard/edit/news/'.$a['news_id'];?>" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a>
							<a href="#" class="btn btn-sm btn-default"  data-toggle="modal" data-target="#modalDelete" onclick="return delete_article('<?php echo $a['news_id'];?>')"><i class="fa fa-trash"></i></a>
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
				<h4 class="modal-title">Delete News</h4>
				<div>Remove News from list.</div>
			</div>
			<form name="formdelete" action="<?php echo base_url().'dashboard/delete/news';?>" method="POST">
			<div class="modal-body">
				<input type="hidden" name="news_id" id="article_id">
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
