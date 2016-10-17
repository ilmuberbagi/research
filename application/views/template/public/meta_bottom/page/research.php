<script>
	function get_abstract(id){
		$.ajax({
			type:'GET',
			url:'<?php echo site_url()."home/current_publication/";?>'+id,
			success: function(data){
				res = JSON.parse(data);
				$("#titlePub").html(res[0].title);
				$("#authors").html(res[0].author);
				$("#publication_name").html(res[0].publication_name);
				$("#abstract").html(res[0].abstract);
				$("#publisher").html(res[0].publisher);
				$("#issn").html(res[0].issn_isbn);
				$("#page").html(res[0].page);
				$("#volume").html(res[0].volume);
				$("#year").html(res[0].pub_year);
				$("#impact_factor").html(res[0].jcr);
				$("#sjr").html(res[0].scr);
				$("#ranking").html(res[0].q_year);
				$("#website").html('<a href="'+res[0].pub_website+'" target="_blank">Click to view</a>');
			}
		});
	}
</script>
