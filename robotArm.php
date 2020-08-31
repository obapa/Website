<?php 
	include("assets/php/verytop.php") 
?>
	<meta name="description" content="Robotic Manipulator">

	<title>Robotic Manipulator</title>
 
<?php 
	include("assets/php/topproj.php")
?>	

              		<h1 class="page-header">Robotic Manipulator</h1>
           		</div>
				<div class="col-sm-2 col-sm-offset-2">
					<a class="nav" href="projects.php" ><div class="button">Return to Projects</div></a>
				</div>
        	</div>
			<!-- Overall description -->
			<div class="row">

				<div class="col-md-12">
					<h3>Project Description</h3>
					<p>In this project, me and my partner modified an <a href="https://www.amazon.com/OWI-OWI-535-Robotic-Arm-Edge/dp/B0017OFRCY/ref=pd_lpo_sbs_328_img_0?_encoding=UTF8&psc=1&refRID=6MMNP638VDEXWHRFJXY7"><i>OWI Robotic Arm Edge</i></a> to interface with an arduino to control its movements. The <i>OWI Robotic Arm Edge</i> has 4 degrees of freedom and was initially controlled soley by a remote. This project consisted of 4 stages in which we changed the control scheme of the robot, added sensors for more precise movements, and utilized a webcam with digital image processing in order to allow the arm to follow a moving object.</p>
					<h3>Skills used in project</h3>
					<ul>
						<li>Use of control systems in programming movement of arm</li>
						<li>Aruino programming to read values from potentiometers and precisely control movements</li>
						<li>Digital imaging in order to allow arm to follow a moving object</li>
						<li>Adding sensors to arm to allow precise movements</li>
					</ul>
				</div>

			</div>
			<!-- End description -->

			<!-- Row 1 -->
			<div class="row">

				<div class="col-sm-6">
					<iframe width="500" height="300" src="https://www.youtube.com/embed/iWpt9n4lg_8"></iframe>
				</div>

				<div class="col-sm-6">
					<h3>Demo 1</h3>
					<p>Demo 1 consisted of the contruction of the robot. We then utilized the remote control that came with the robot in order to manipulate it in its workspace. The main issues with using the remote is the difficulty in being able to control multiple joints at once. It was also a slow process to be able to position the arm correctly in order to pick up and move an object.</p>
				</div>

			</div>
			<!-- /.row -->

			<!-- Row 2 -->
			<div class="row">

				<div class="col-sm-6">
					<iframe width="500" height="300" src="https://www.youtube.com/embed/U4oT_WP2FY4"></iframe>
				</div>

				<div class="col-sm-6">
					<h3>Demo 2</h3>
					<p>In Demo 2 we removed the remote control and connected the arm to a 16 channel active-low relay which was then connected to an Arduino. By applying a positive current to one of the motors it would move forward and by applying a negative current, the motor would move backwards. Relays 1-5 were set apply a positive current to each of the different motors (4 DOF and 1 for the controlling the gripper) and relays 6-10 were set to give a negative current.</p>
					<p> The Arduino was used to control the relay. All movements were calculated based on time. Initially I programmed the arduino to allow each of the motors to opperate independently, allowing the arm to go straight to any given position without moving each link one at a time. However because all movements were based on time, when multiple links moved at once, their momentum would move the arm and throw off the accuracy. The movements were thus simplified for this step, as can be seen in the video.</p>
				</div>

			</div>
		   <!-- /.row -->

		   <!-- Row 3 -->
		   <div class="row">

				<div class="col-sm-6">
					<iframe width="500" height="300" src="https://www.youtube.com/embed/gBecD9FBFwM"></iframe>
				</div>

				<div class="col-sm-6">
					<h3>Demo 3</h3>
					<p>We attached potentiometers to each of the links' joints, and one to the gripper's joint. We applied 5[V] and ground to the potentiometers' first and third terminal repectivly. The middle terminal was connected to analog inputs on the Arduino. The potentiometers served as sensors with values on the middle terminal ranging from 0-1300. This allowed from more precise movements than basing off of time. For example, if a value of 845 corresponded to link 2 being at a 35 &deg; angle with link 1, the arduino could be programmed to set the angle between links at 35 &deg;.</p>
					<p>I modified the code from Demo 2 so that the robot would move based on what the current values of the potentiometers were to the new set angles. An angle for each motor would be set, and then all motors would move at the same time. Because the movements were now based off feedback, the weight of the arm impacting the movements was corrected. </p>
				</div>
			</div>
        	<!-- /.row -->
<?php
	include("assets/php/bottomproj.php")
?>