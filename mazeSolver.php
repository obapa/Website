<?php 
	include("assets/php/verytop.php") 
?>

	<meta name="description" content="Embedded maze solver">
	<title>Maze Solver</title>
 
<?php 
	include("assets/php/topproj.php")
?>	

              		<h1 class="page-header">Embedded Maze Solver</h1>
           		</div>
				<div class="col-sm-3">
					<a class="nav" href="https://github.com/obapa/mazeSolverRobot" ><div class="button">Github</div></a>
				</div>
				<div class="col-sm-3">
					<a class="nav" href="projects.php" ><div class="button">Return to Projects</div></a>
				</div>
        	</div>
			<!-- Overall description -->
        	<div class="row">
				<div class="col-md-12">
					<h3>Project Description</h3>
					<p>An embedded robot that navigates a maze by following a right wall. 
					After a first itteration, optimizes the path used to solve the maze with a shorter path. 
					System utilizes RTOS for interupt handling, and implements a PID algorithm for motor control.
					System was programmed on a TIVAC TM4C123GXL microcontroller.</p>
					<h3>Skills used in project</h3>
					<ul>
						<li>Microcontroller</li>
						<li>Embedded Systems</li>
						<li>PID controller</li>
						<li>Drivers</li>
						<li>Soldering</li>
						<li>C</li>
						<li>PuTTY</li>
					</ul>
				</div>
			</div>
			<!-- End description -->
			
			<!-- Row 1 -->
			<div class="row">
				<div class="col-md-6">
					<img class="cube wide_img" src="assets/images/mazeSolverbb.png"/>
					<h5>Figure 1: Blackbox diagram of maze solver robot</h5>
				</div>
				<div class="col-md-6">
					<p class="textColumn">The microcontroller had two IR sensors and a light sensor connected to analog input pins, as well as recieved power from a 5[V] voltage regulator.
					The microcontroller output to a motor controller to control the two motors using PWM.
					A bluetooth reciever was utilized for debugging, sending percision control commands, and to recieve data for logging distance from walls.
					PuTTY was used to make a connection with the robot to transmit data over bluetooth.</p>
					 
				</div>
			</div>
			<!-- /.row -->
			<!-- Row 2 -->
			<div class="row">
				<div class="col-md-6">
					<img class="cube" src="assets/images/mazeSolverUp.jpg"/>
					<h5>Figure 2: Layout of bluetooth, 5[V] regulator, and motor controller</h5>
				</div>
				<div class="col-md-6">
					<p class="textColumn">The robot was programmed to follow the right wall, utilizing a PID algorithm to adjust its distance.
					The control algorithm would only active once the the robot passed a 2 inch black line (electrical tape on the ground) and would stop once it passed a second 2 inch black line.
					</p><p class="textColumn">
					After navigating the course a first time the robot would optimize the path it took, ie. 3 right turns would be recognized as a dead end.
					The robot was then placed back in the course to navigate with an optimal solution.
					</p>
				</div>
			</div>
			<!-- /.row -->
			<!-- Row 3 -->
			<div class="row">
				<div class="col-md-6">
					<img class="cube" src="assets/images/mazeSolverDebug.jpg"/>
					<h5>Figure 3: Debug console waiting for input commands"</h5>
				</div>
				<div class="Col-md-6">
					<p class="textColumn">I was personally incharge of writing the software for the drivers, communication to the different devices and enabling specific register. 
					I also wrote the console and specific commands that could be interpretted for debugging.
					A few of the debugging commands I wrote were also used for opperation, such as adjusting the PWM for motor speed and setting motor dirrections.
					My group unforntantly forgot to take pictures of the final robot, complete code can be found on my <a href="https://github.com/obapa/mazeSolverRobot">Github</a> however.
					</p>
				</div>
			</div>
			<!-- /.row -->
<?php
	include("assets/php/bottomproj.php")
?>