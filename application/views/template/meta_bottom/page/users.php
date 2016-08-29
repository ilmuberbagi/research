<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js';?>"></script>
<script>
$(function(){
	$(".data-member").DataTable();
});

function delete_user(id){
	$("#user_id").val(id);
	$(".msg").html("Are you sure want to delete this user?");
}
function status_user(id){
	sts = id.split('#');
	$("#user_id_status").val(sts[0]);
	$("#status").val(sts[1]);
	$(".msg").html("Are you sure want to inactivate this user?");
	if(sts[1] == 0)
		$(".msg").html("Are you sure want to activate this user?");
}
function reset(id){
	sts = id.split('#');
	$("#user_pass_id").val(sts[0]);
	$("#password").val(sts[1]);
	$(".msg").html("Are you sure want to change the password selected user with <b>"+sts[1]+"</b>?");
}
</script>