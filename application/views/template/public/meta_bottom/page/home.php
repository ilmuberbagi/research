<script>
	$(document).ready(function(){
		$(this).scroll(function(){
			if ($(this).scrollTop() > 160){
				$('nav.navbar').removeClass('navbar-static-top');
				$('nav.navbar').addClass('navbar-fixed-top').show("slow");
				$('body').css("margin-top", "65px");
			}
			if ($(this).scrollTop() < 160){
				$('nav.navbar').addClass('navbar-static-top');
				$('nav.navbar').removeClass('navbar-fixed-top');
				$('body').css("margin-top", "0px");
			}
		});
	});
</script>
