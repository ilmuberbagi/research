<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js';?>"></script>
<script>
$(function(){
	$(".data-grants").DataTable();
});

function delete_grants(id){
	$("#grant_id").val(id);
	$(".msg").html("Are you sure want to delete this grant?");
}
function publish_grants(id){
	$("#grant_id_pub").val(id);
	$(".msg").html("Are you sure want to publish this data?");
}
</script>