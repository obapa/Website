<?php 
	include("assets/php/verytop.php") 
?>
	<meta name="description" content="LED Cube">

	<title>4x4x4 LED Cube</title>
 
<?php 
	include("assets/php/topproj.php")
?>	

					<h1 class="page-header">Programable 4x4x4 LED Cube</h1>
           		</div>
				<div class="col-sm-2 col-sm-offset-2">
					<a class="nav" href="projects.php" ><div class="button">Return to Projects</div></a>
				</div>
        	</div>
			<!-- Overall description -->
			<div class="row">
				<div class="col-md-12">
					<h3>Project Description</h3>
					<p>In this project, me and my partners created a 4x4x4 LED cube and performed a cost analysis on the cheapest options to build the cube. The cube utilizes multicolor digitally addressable RGB leds to allow the cube to change colors. The cube was attached to an ESP8288 microcontroller in order to control the lights. Four physical buttons were used to switch the cube betwwen presets. </p>
					<h3>Skills used in project</h3>
					<ul>
						<li>Design of the circuit, and an optimal way to control each LED individually</li>
						<li>Cost analysis used to select our specific parts</li>
						<li>Aruino programming to set the LEDs to different colors and configurations</li>
						<li>Physical construction of cube mainly through the use of soldiering</li>
					</ul>
				</div>
			</div>
			<!-- End description -->

			<!-- Row 1-->
			<div class="row">
				<div class="col-md-6">
					<img class="cube" src="assets/images/cubeSchem.png">
					<h5>Figure 1: Main circuit diagram, showing the connected power source, and switches</h5>
				</div>
				<div class="col-md-6">
					<img class="cube" src="assets/images/cubeSchem1.png">
					<h5>Figure 2: Circuit diagram illustrating the first row  of LEDs connected to the ES388</h5>
				</div>
			</div>
		   	<!-- /.row -->

		   	<!-- Row 2 -->
		   	<div class="row">
				<div class="col-md-6">
					<p>The first choice we had to make when designing the cube was what type of LED we wanted to use. We decided to go with the PL9823 LED chips because they allowed each pin to be controlled individually and digitally for a total cost of $17.92. While the analog rgb LEDs were cheaper at a cost of #13.31, they would have greatly increased the complexity of our circuit. The PL9823 chips could be connected into a chain, with one main input channel that could send the signal digitally for which LEDs to turn on. If we had chosen to go with the analog solution then each LED would require four seperate wires ran to each LED for red, blue, green, and ground. Each individual wire would then need to be connected to a seperate port on the microcontroller, for a total of 256 output ports.</p>
				</div>
				<div class="col-md-6">
					<p>We next had to chose between microcontrollers. The 2 main choices were the Arduino Uno and ESP8266. We decided to go with the ESP8266 because of the lower cost, as well as the added benefit of havig built in WIFI. The one downside of the ESP8266 was that the output pins did not give a high enough voltage. We first tried using a LM741 OP amp but after intial testing we found the slew rate was not fast enough, so we decided on the LM7171. </p>
				</div>
			</div>
			<!-- /.row -->
			
			<!-- Row 3 -->
			<div class="row">
				<div class="col-md-6">
					<img class="cube" src="assets/images/cube.png" >
					<h5>Figure 3: Image of assembled LED cube with all lights turned on</h5>
				</div>
				<div class="col-md-6">
					<div class="pad">
						<h5>Table 1: Cost of each component</h5>
						<table>
							<tr>
								<th>Part</th>
								<th>Price per Unit</th>
							</tr>
							<tr>
								<td>Arduino Uno</td>
								<td>$15.99</td>
							</tr>
							<tr>
								<td>Arduino Uno with WIFI</td>
								<td>$18.99</td>
							</tr>
							<tr>
								<td>ESP8266</td>
								<td>$8.79</td>
							</tr>
							<tr>
								<td>LM741</td>
								<td>$.65</td>
							</tr>
							<tr>
								<td>LM7171</td>
								<td>$2.81</td>
							</tr>
							<tr>
								<td>10[K&Omega;] resistor</td>
								<td>$.48</td>
							</tr>
							<tr>
								<td>1[K&Omega;] resistor</td>
								<td>$.12</td>
							</tr>
							<tr>
								<td>500[&Omega;] resistor</td>
								<td>$.12</td>
							</tr>
							<tr>
								<td>PL9823 LED</td>
								<td>$.28</td>
							</tr>
							<tr>
								<td>RGB Analog LED</td>
								<td>$.12</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<!-- /.row -->
			
			<!-- Row 4-->
			<div class="row">
				<div class="col-md-6">
					<img class="cube" src="assets/images/cube1.jpg">
					<h5>Figure 4: Demonstration of the individually addressable LEDs, cube is displaying the letter K</h5>
				</div>
				<div class="col-md-6">
					<p>The total cost to build the cube was $35.10 before tax, not including the breadboard as a base, and the cost of the solder and tools. While we did not utilize the built in WIFI on the ESP8266, the microcontroller was still cheaper than having used an Arduino. The WIFI also allows for future capabilities for the cube to be controlled over wifi, all that is required is additional coding.</p>
				</div>
			</div>
<?php
	include("assets/php/bottomproj.php")
?>