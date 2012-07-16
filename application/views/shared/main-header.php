<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		
		<!-- Le styles -->
		<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/template.css" rel="stylesheet">
		
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<?php
		if(isset($extra_css)) {
			if(is_array($extra_css)) {
				foreach($extra_css as $css) {
					echo "<link href=\"" . base_url() . "css/" . $css . "\" rel=\"stylesheet\">";
				}
			}
		}
		?>
		<link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.ico">
	</head>

	<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="<?php echo site_url('dashboard');?>">Client Name</a>
				<?php
				if($this->session->userdata('user_logged_in')) {
					?>
					<div class="nav-collapse">
						<ul class="nav">
							<li><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
							<li><a href="<?php echo site_url('logout'); ?>">Logout</a></li>
						</ul>
					</div>
					<?php	
				}
				?>				
			</div>
		</div>
	</div>

    <div class="container-fluid">
		<div class="row-fluid">