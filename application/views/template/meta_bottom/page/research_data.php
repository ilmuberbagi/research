<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js';?>"></script>
<script>
$(function(){
	$(".data-research").DataTable();
});

function delete_article(id){
	$("#research_id").val(id);
	$(".msg").html("Are you sure want to delete this research?");
}
</script>