<?php
	include("assets/php/verytop.php")
?>

	<meta name="description" content="Main Index">
	<title>Patrick OBanion</title>
	
	<!-- Custom CSS -->
	<link href="assets/css/home.css" rel="stylesheet" type="text/css">
	<link href="assets/css/layout.css" rel="stylesheet" type="text/css">
	<!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body onload="add_random_project(3)">
<?php
	include("assets/php/top.php")
?>	
		<div class="row">
			<!-- Hero Section -->
			<div class="col-sm-4 col-sm-push-8">
				<div class="hero">
					<h2 class="heroHeader">Patrick O'Banion</h2>
					<img src="assets/images/PatrickObanion.jpg" class="banner">
				</div>
			</div>
			<div class="col-sm-8 col-sm-pull-4">
				<div class="row">
					<div class="col-sm-12">
						<div class="row">
							<!-- About Section-->
							<div class="col-sm-12">
								<div class="aboutFormat">
									<h2 class="sectionTitle">Contact</h2>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div> 
									<b>Email:</b> pobanion@live.com<br/>
									<b>Phone:</b> (281) 686-1641<br/>
								</div>
							</div>
							<!-- Link for my portfolio -->
							<div class="col-sm-6">
								<div class="aboutFormat">
									<h2 class="sectionTitle"></h2>
									<div> 
										<a href="files/OBanionResumeSpring2017.pdf" download> Download my resume</a> <br/>
										<a href="http://github.com/obapa?tab=repositories" github>View my Github</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-10 col-sm-offset-1">
								<!--HR-->
								<hr/>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="aboutFormat">
							<!-- About Me -->
							<h2 class="sectionTitle" id="about">About Me</h2>
							<div class="textColumn">
								<p class="parform">
								I am a recent graduate from the University of Houston with a Bachelor's of Electrical Engineering focusing on embedded systems. 
								My courses had a strong focus on system design with topics such as VLSI design, RTL design, system architecture, Verilog, digital design, and digital logic. 
								I am also experienced in coding in AGILE and SCRUM frameworks with object oriented languages such as C++ and Java, as well as scripting with Python and bash.
								One of my recent applications was a Java implementation of a <a href="tensor.html">tensor voting framework</a> implemented to run on android devices.
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<!--HR-->
						<hr />
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="aboutFormat">
							<!-- Current -->
							<h2 class="sectionTitle">Current</h2>
							<div class="textColumn">
								<div class="parform">
									<p> 
										I am currently working on the design of an 8-bit computer, built at the transistor level in Multisim. 
										I am currently designing the schematics for the varrious components of the CPU; clock, ALU, registers, and control unit. 
										The system will utilize a form of MIPS assembly with varriations to some of the commands. 
										After I finish the design I will build a physical prototype and implement some simple programs. 
										I will then plan the layout in Cadence Virtuoso to be printable on IC chips. 
									</p>
									<p>
										My motivation for this project is to gain first-hand experience with computer architecture and logic structures.
										I am interested in seeing how a computer works from the hardware level and exploring the process. 
										My progress can be seen <a href="computer.html"> here. </a> 
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<!--HR-->
					<hr/>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="aboutFormat">
						<!-- Skills -->
						<h2 class="sectionTitle">Skills</h2>
						<div class= "textColumn">
							<h3 class="subhead">Software</h3> 
							<ul class="parform">
								<li>C++ (5 years), C (2 years), C# (2 years), Java ( 1 year), Perl (less than 1 year), Matlab (2 years), Assembly (2 years)</li>
								<li>Python (3 years), shell scripting (2 years), BASH scripting (2 years)</li>
								<li>Git (1 year), AGILE (2 years), SCRUM (1 year)</li>
								<li>HTML5 (2 years), CSS (2 years), XML (2 years), Javascript (1 year)</li>
								<li>JSON (1 year), JQuery (1 year), DOM (less than 1 year), AJAX (less than 1 year), Bootstrap (1 year)</li>
								<li>UNIX, MAC OS, IOS, Windows, Linux, Red Hat Linux, Ubuntu</li>
								<li>Cadence Virtuoso(2 years), Multisim(4 years), Microsoft Excel(5 years), LabView (2 years)
							</ul>
							<h3 class="subhead">Hardware</h3>
							<ul class="parform">
								<li>instrumentation, oscilloscopes, multimeters, spectrum analyzer (4 years), soldering(3 years)</li>
								<li>IC mask layout, logic design, layout floor planning, routing techniques, clock distribution, netlists (2 years)</li>
								<li>microcontrollers (4 years), Arduino (4 years), raspberry Pi (2 years), TIVAC (1 year), Arm processors (1 year)</li>
								<li>diagnostics of computer systems(5 years), PC repair(5 years)</li>
								<li>Apache Server (1 year), Virtual server (1 year), AWS (less than 1 year)</li>
								<li>Tcp/IP (2 years), ethernet (2 years)</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<!--HR-->
				<hr/>
			</div>
		</div>
		<div class ="row">
			<div class="col-sm-12">
				<div class="projFormat">
					<!--Random Projects Section-->
					<h2 class="sectionTitle">Some of my Projects</h2><br/>
					<!--JAVASCRIPT HERE-->
					<div class="row">
						<div class="col-sm-4">
							<div id = "projpic0"></div>
							<p class="projectTitle" id = "projpic0title"></p>
						</div>
						<div class="col-sm-4">
							<div id = "projpic1"></div>
							<p class="projectTitle" id = "projpic1title"></p>
						</div>						
						<div class="col-sm-4">
							<div id = "projpic2"></div>
							<p class="projectTitle" id = "projpic2title"></p>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php
	include("assets/php/bottom.php")
?>
	<script src="assets/js/imagechange.js"></script>
</body>
</html>