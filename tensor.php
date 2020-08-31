<?php 
	include("assets/php/verytop.php") 
?>
	<meta name="description" content="Tensor Voting">

	<title>Tensor Voting</title>
 
<?php 
	include("assets/php/topproj.php")
?>	

              		<h1 class="page-header">Tensor Voting Framework</h1>
           		</div>
				<div class="col-sm-3">
					<a class="nav" href="https://github.com/obapa/tensorVoting" ><div class="button">Github</div></a>
				</div>
				<div class="col-sm-3">
					<a class="nav" href="projects.php" ><div class="button">Return to Projects</div></a>
				</div>
        	</div>
			<!-- Overall description -->
        	<div class="row">
            	<div class="col-md-12">
					<h3>Project Description</h3>
					<p>In this project, I adapted the tensor voting framework originally written by <a href="https://www.mathworks.com/matlabcentral/fileexchange/21051-tensor-voting-framework">Trevor Linton in Matlab</a>, into Java, to be utilized in a cybersecurity app.</p> 
					<p>Tensor voting uses the Gesalt principles of proximity and continuation to infer salient structures from a set of points. Tensor voting is a combination of tensor calculus, for point representation, and non-linear voting to transfer data. All points are represented by a tensor and a saliency value. Saliency tells the "confidence" of a point, or the strength a point will have on influencing its neighbors. Each coordinate point is composed of two seperate tensors, a ball and a stick tensor. A stick tensor is a 2x2 elipsoid that represents the dirrection the point is aimed, and its strength. A ball tensor contributes to the strength of a point when performing non-linear voting, but does not provide a specific direction.</p>
					<p>After tensor values are calulated, non-linear voting is performed in which the tensor of each point is impacted by the tensors of every other point in its defined neighborhood. This causes points in close proximity to each other to become grouped, creating lines between them. The only paramater in tensor voting that can be manually changed is the scale, which decides the radius of neighborhoods used in non-linear voting. As the scale is increased, the framework becomes less responsive to noise, but gives us detail. 
					</p>
					<h3>Skills used in project</h3>
					<ul>
						<li>Use of android app development with Java and XML</li>
						<li>Tensor calculus</li>
						<li>Non-linear voting</li>
					</ul>
					<hr/>
				</div>
			</div>
        	<!-- End description -->
        	<!-- Row 1 -->
        	<div class="row">
            	<div class="col-md-6">
                	<img class="im" width="200" height="350" src="assets/images/ban1.png">
                	<h5>Figure 1: Initial points loaded from '.edge' file</h5>
            	</div>
            	<div class="col-md-6">
                	<h3>Loading in points</h3>
					<p>First the points are loaded into the program from a file with the extension '.edge'. The first line of a .edge file states how many points are contained. Each subsequent line gives the coordinates and initial saliency values. The intial points are displayed in Figure 1. The saliency values are then decomposed into an initial 2-D tensor. </p>
            	</div>
        	</div>
        	<!-- /.row -->
 
        	<!-- Row 2 -->
        	<div class="row">

				<div class="col-md-6">
					<img class="im" width="500" height="500" src="assets/images/ban2.png">
					<h5>Figure 2: Points are grouped together based on saliency and proximity to each other</h5>
				</div>

				<div class="col-md-6">
					<h3>Non-linear Voting</h3>
					<p> Next non-linear voting is performed on each point as a field. This causes close points to group together and form lines.</p>
				</div>
			</div>
			<!-- /.row -->
        
        	<!-- Row 3 -->
        	<div class="row">

            	<div class="col-md-6">
                	<img class="im" width="500" height="400" src="assets/images/ban3.png">
                	<h5>Figure 3: Final image of banana.edge</h5>
            	</div>
          		<div class="col-md-6">
            		<h3>Ortho extremes</h3>
            		<p> Finally the local minimum and maximums are found for each point, and the values for the lines are rounded. This gives solid lines, however this step can be omitted depending on the application for tensor voting.</p>
          		</div>
        	</div>
        	<!-- /.row -->
        
        	<!-- Row 4-->
        	<div class="row">
				<div class="col-md-6">
					<img class="im" width="500" height="340" src="assets/images/tens.png">
					<h5>Figure 4: Tensor Voting process performed on a set of points to make a smooth line</h5>
				</div>
         		<div class="col-md-6">
            		<h3>Application in Cybersecurity</h3>
            		<p> When a phone uses GPS it opperates by sending coordinate positions after a specified length of time. Using tensor voting, these positions can be grouped together to provide a smooth path. While providing coordinate data is useful for a wide varriety of applications such as <i>Google Maps</i>, if this data is stolen by an unauthorized party it can be used malicously. 
            		</p>
          		</div>
         	</div>
        	<!-- /.row -->
        
        	<!-- Row 5 -->
        	<div class="row">
            	<div class="col-md-6">
                	<img class="im" width="500" height="340" src="assets/images/tens2.png">
                	<h5>Figure 5: Tensor voting performed on set of points including 'dummy locations'</h5>
            	</div>
          		<div class="col-md-6">
            		<p> If the data for multiple days is stolen, then a person such as a celebrity, could be tracked. However if specific mathematically chosen points are removed, while multiple dummy locations are introduced, the true path can be hidden. This is due to the saliency of the dummy locations passing a certian theshold, giving them more confidence than the true locations. The few removed points can then be encrypted and sent along side the rest of the points. When the target recieves the points, they can be unencrypted and reintroduced to the data set. Because the points have a high enough saliency, the true path will be found through the noise.</p>
            		
				</div>
			</div>
        	<!-- /.row -->
<?php
	include("assets/php/bottomproj.php")
?>