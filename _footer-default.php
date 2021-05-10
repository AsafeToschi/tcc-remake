<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/metisMenu/metisMenu.min.js"></script>
<script src="dist/js/sb-admin-2.js"></script>
<script type="text/javascript" >
    $(document).ready(function () {
    	$("#load_screen").fadeOut("slow");
    	$('.nav-trigger').click(function() {
			$('.side-nav').toggleClass('closed');
			$('.main-content').toggleClass('closed');
			$('.nav-trigger').toggleClass('closed');
			if ($(window).width() < 767){
				$('.side-nav').toggleClass('open');
				$('.main-content').toggleClass('open');
			}
		});

    });
</script>

 