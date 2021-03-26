<div class="container">
<div class="copy-rights">
		Copyright 2020 UMPvi (Web Engineering Project)<br> 
</div>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.9.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/imagesloaded.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/AnimOnScroll.js"></script>
    
    <script>
      new AnimOnScroll( document.getElementById( 'grid' ), {
        minDuration : 0.4,
        maxDuration : 0.7,
        viewportFactor : 0.2
      } );
	  							
	var limit = 3;
	$('input.single-checkbox').on('change', function(evt) {
	if($(this).siblings(':checked').length >= limit) {
	this.checked = false;
	}
	});
							
    </script>

    
  </body>
</html>
