<?php 
	include("assets/php/verytop.php") 
?>

	<meta name="description" content="Biodigestor">
	<title>Biodigestor</title>
 
<?php 
	include("assets/php/topproj.php")
?>	

					<h1 class="page-header">Biodigestor</h1>
          		</div>
				<div class="col-sm-2 col-sm-offset-2">
					<a class="nav" href="projects.php" ><div class="button">Return to Projects</div></a>
				</div>
        	</div>
			<!-- Overall description -->
        	<div class="row">
            	<div class="col-md-12">
					<h3>Project Description</h3>
					<p>In this project, me and my partner designed, built, and tested a <a href="http://shaunsbackyard.com/746/biogas-digester/"> biodigestor.</a> The conecpt behind a biodigestor is similar to a compost pile, in that it breaks down organic waste material into a humus that can be used as a fertilizer. However a biodigestor more closely resembles a stomach in that it is enclosed, the organic waste is submerged in water, and it has the ability to regulate temperature. Because the organic waste is enclosed as it decomposes, the biodigestor is able to collect the methane produced and store it for later use. By keeping the internal temperature around 60 &deg;F and the waste to water ratio at 3:7, the decomposition process was sped up. In a 24 hour cycle, enough methane was produced to opperate a bunsen burner for enough time to cook with. This shows that the biodigestor can be used as enviormentally sustainable alternative to natural gas for household tasks. </p>
					<h3>Skills used in project</h3>
					<ul>
						<li>Assisted in CAD design of biodigestor in Autodesk Inventor</li>
						<li>Configuration of sensors to monitor and regulate internal temperature and pressure</li>
					</ul>
				</div>
			</div>
        	<!-- End description -->
        	<!-- Row 1 -->
        	<div class="row">
            	<div class="col-md-6">
                	<img class="im" width="200" height="350" src="assets/images/bio1.png">
                	<h5>Figure 1: Initial CAD sketch of Biodigestor</h5>
            	</div>
            	<div class="col-md-6">
                	<h3>Early Design</h3>
					<p>The initial design focused on building the digestor from scracth. An inner plastic chamber would hold the organic material. A heated coil would surround the inner chamber in order to control the temperature, and everything would be enclosed in a solid aluminum body.</p>
            	</div>
        	</div>
        	<!-- /.row -->
 
        	<!-- Row 2 -->
        	<div class="row">

				<div class="col-md-6">
					<img class="im" width="500" height="500" src="assets/images/bio2.png">
					<h5>Figure 2: Modified CAD mockup using simpler materials for construction to reduce production costs</h5>
				</div>

				<div class="col-md-6">
					<h3>Chosen Design</h3>
						<p> Before building the digestor the design was modified and simplified. We settled on using a 5-gallon plastic container as the inner chamber instead of building one ourselves. 4 openings were cut into the lid for: waste input, waste output, methane output, and hot water input. </p>
				</div>
			</div>
			<!-- /.row -->
        
        	<!-- Row 3 -->
        	<div class="row">

            	<div class="col-md-6">
                	<img class="im" width="500" height="400" src="assets/images/bio3.jpg">
                	<h5>Figure 3: Built biodigestor from Figure 2</h5>
            	</div>
          		<div class="col-md-6">
            		<h3>Finished Build</h3>
            		<p> After the main assembly, a thermometer was fixed inside of the inner chamber and connected to an arduino in order to monitor tempurature. 
					Whenver the temperature fell below 20&deg;C a servo would open the hot water input, pumping in more hot water, and bringing the temperature back up to 60&deg;C. 
					The raising water would push some of the affluent through the waste output into a collection chamber. 
					The affluent would then be able to dry out and be used a fertalizer. 
					The methane output was connected to a bladder to be able to store for later use. 
					A pressure sensor was placed inside of the bladder in order to monitor how much methane was stored.</p>
          		</div>
        	</div>
        	<!-- /.row -->
        
        	<!-- Row 4-->
        	<div class="row">
				<div class="col-md-6">
					<img class="im" width="500" height="340" src="assets/images/bio4.png">
					<h5>Figure 4: Sketch of biodigestor showing connected bladder and bunsen burner</h5>
				</div>
         		<div class="col-md-6">
            		<h3>Testing Procedure</h3>
            		<p> First the digestion chamber was filled 1/3 of the way of biowaste and then hot water was pumped in. 
					An accrylic hose was attched between the digestion chamber and bladder. 
					The chamber was then left to sit for 24 hours, with the thermometer keeping the temperature between 60&deg;C and 20&deg;C. 
					After the 24 hour cycle, a buncen burner was attached to the bladder and ignited. The flame was then timed until it went out. </p>
          		</div>
         	</div>
        	<!-- /.row -->
        
        	<!-- Row 5 -->
        	<div class="row">
            	<div class="col-md-6">
                	<img class="im" width="500" height="340" src="assets/images/bio5.png">
                	<h5>Figure 5: Comparison of temperature in &deg;Celcius vs Time</h5>
            	</div>
          		<div class="col-md-6">
					<h3>Results</h3>
            		<p> The temperature of the biodigestor can be seen varrying between 60&deg;F and 40&deg;F. When connected to the bunsen burner our results were:</p>
            		<table >
			  			<tr>
							<th>Minutes:Seconds</th>
							<th> Trial 1 </th>
							<th> Trial 2 </th>
							<th> Trial 3 </th>
						</tr>
						<tr>
							<td>Burn Time</td>
							<td> 18:17</td>
							<td> 12:30</td>
							<td> 24:02</td>
						</tr>
					</table>
					<p> The amount of gas produced in trail 3 was signifigantly higher than trial 1 and 2. This is due to different organic material mixes being used in each trail. Trials 1 and 3 show that the digestor is able to produce enough methane in 1 day for use in in something such as daily cooking. However the amount of methane produced varried widely, harming the overall reliability of the digestor.</p>
					<p>While inspecting the bio digester the third time, it was found that the hot water that was introduced through the hot water-in PVC pipe caused the plastic sealant to melt slightly, causing a small leak. This could potential compromise some produced gas in the future. Other holes/pipe entrances into the digester could have been improved by finding a sealant that could harden stronger. No other sources of possible leak were found and the interior of the digester had seemed to withstand the bio waste without becoming worn/damaged. </p>
				</div>
			</div>
        	<!-- /.row -->
<?php
	include("assets/php/bottomproj.php")
?>