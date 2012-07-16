		</div><!--/row-->

		<hr />

		<footer>
			<p>&copy; Company Name <?php echo date('Y'); ?></p>
		</footer>

	</div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

    <?php
    
    if(isset($extra_js)) {
	    if(is_array($extra_js)) {
		    foreach($extra_js as $js) {
			    echo "<script src=\"" . base_url() . "js/" . $js . "\"></script>";
		    }
	    }
    }
    
    ?>

  </body>
</html>