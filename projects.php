<?php
	include("assets/php/verytop.php")
?>

	<meta name="description" content="Index of projects">
	<title>Projects Index</title>
   
    <!-- Custom CSS -->
    <link href="assets/css/projIndex.css" rel="stylesheet" type="text/css">
    <link href="assets/css/layout.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body onload="add_ordered_projects()">
<?php
	include("assets/php/top.php")
?>	
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Projects (Newest to Oldest)</h1>
			</div>
		</div>

		<!-- Related Projects Row -->
		<div class="row">
			<div class="col-sm-4 col-xs-6 text-center">
				<div id = "projpic0"></div>
				<p class="projectTitle" id = "projpic0title"></p>
			</div>
			<div class="col-sm-4 col-xs-6 text-center">
				<div id = "projpic1"></div>
				<p class="projectTitle" id = "projpic1title"></p>
			</div>
			<div class="col-sm-4 col-xs-6 text-center">
				<div id = "projpic2"></div>
				<p class="projectTitle" id = "projpic2title"></p>
			</div>
			<div class="col-sm-4 col-xs-6 text-center">
				<div id = "projpic3"></div>
				<p class="projectTitle" id = "projpic3title"></p>
			</div>
			<div class="col-sm-4 col-xs-6 text-center">
				<div id = "projpic4"></div>
				<p class="projectTitle" id = "projpic4title"></p>
			</div>
			<div class="col-sm-4 col-xs-6 text-center">
				<div id = "projpic5"></div>
				<p class="projectTitle" id = "projpic5title"></p>
			</div>
			<div class="col-sm-4 col-xs-6 text-center">
				<div id = "projpic6"></div>
				<p class="projectTitle" id = "projpic6title"></p>
			</div>
			<div class="col-sm-4 col-xs-6 text-center">
				<div id = "projpic7"></div>
				<p class="projectTitle" id = "projpic7title"></p>
			</div>
			<div class="col-sm-4 col-xs-6 text-center">
				<div id = "projpic8"></div>
				<p class="projectTitle" id = "projpic8title"></p>
			</div>
			<div class="col-sm-4 col-xs-6 text-center">
				<div id = "projpic9"></div>
				<p class="projectTitle" id = "projpic9title"></p>
			</div>
		</div>
<?php
	include("assets/php/bottom.php")
?>
	<script src="assets/js/imagechange.js"></script>
</body>
</html>
