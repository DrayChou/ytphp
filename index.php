<?php require 'header.php'; ?>
<!-- Page Content -->
    <div class="container">
 <script src="js/jquery.js"></script>

 <style>
 /* Source: http://bootsnipp.com/snippets/featured/responsive-youtube-player */
 .vid {
    position: relative;
    padding-bottom: 56.25%;
    padding-top: 30px; height: 0; overflow: hidden;
}
 
.vid iframe,
.vid object,
.vid embed {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
 </style>
 
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
        <div class="row">
            <div class="col-lg-12 text-center">
              
			  
                <div id="youtube-gallery"></div>
				
				<script>
				//Load video list
				$("#youtube-gallery").load('list/youtube_video.php');
				</script>
				
				
            </div>
			
			
			
        </div>
        <!-- /.row -->

		<!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
				<hr>
                    <p>Copyright &copy; <?php echo Date('Y'); ?></p>
                </div>
            </div>
            <!-- /.row -->
        </footer>
		
    </div>
    <!-- /.container -->


   

</body>

</html>