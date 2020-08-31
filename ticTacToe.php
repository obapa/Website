<?php 
	include("assets/php/verytop.php") 
?>
	<meta name="description" content="Tic Tac Toe">

	<title>Four Player Tic-Tac-Toe</title>
 
<?php 
	include("assets/php/topproj.php")
?>	

              		<h1 class="page-header">Four Player Tic-Tac-Toe</h1>
           		</div>
				<div class="col-sm-3">
					<a class="nav" href="https://github.com/obapa/TicTacToe" ><div class="button">Github</div></a>
				</div>
				<div class="col-sm-3">
					<a class="nav" href="projects.php" ><div class="button">Return to Projects</div></a>
				</div>
        	</div>
			<!-- Overall description -->
        	<div class="row">
				<div class="col-md-12">
					<h3>Project Description</h3>
					<p>This project was a redesign of Tic Tac Toe to be played by four people. 
					The rules of standard Tic-Tac-Toe were modified in order to allow more players while attempting to keep a similar feel to the original game. 
					This game was programmed in c++ and used <a href = "https://www.sfml-dev.org/index.php">SFML </a> for graphics. 
					This project was enjoyable to program and was a helpful practice for learning SFML. 
					This is an original game that I had came up with in 4th grade. 
					Being able to implement it into a program was very exciting to see.</p>
					<h3>Rules and Redesign</h3>
					<ul>
						<li>Grid expanded from 3x3 to 10x10</li>
						<li>Four players; x, o, square, triangle</li>
						<li>Number of pieces in a row needed to win increased from 3 to 5</li>
						<li>Each player can chose to play either 1, 2, or no pieces on thier turn</li>
					</ul>
					<h3>Skills used in project</h3>
					<ul>
						<li>Program written in C++</li>
						<li><a href = "https://www.sfml-dev.org/index.php">SFML </a> utilized to display graphics </li>
					</ul>
					<hr/>
				</div>
			</div>
			<!-- End description -->
			
			<!-- Row 1 -->
			<div class="row">
				<div class="col-md-6 text-center">
					<img src="assets/images/ttt1.png" width="300" height="300">
				</div>
				<div class="col-md-6 text-left">
					<h3>Board at start of game</h3>
				</div>
			</div>
			<!-- /.row -->
			
			<!-- Row 2 -->
			<div class="row">
				<div class="col-md-6 text-center">
					<img src="assets/images/ttt2.jpg" width="300" height="300">
				</div>
				<div class="col-md-6 text-left">
					<h3>Move 1</h3>
					<p>Player 1 (X) makex thier first move. </p>
				</div>
			</div>
		   <!-- /.row -->
		   
		   <!-- Row 3 -->
		   <div class="row">
				<div class="col-md-6 text-center">
					<img src="assets/images/ttt3.jpg" width="300" height="300">
				</div>
				<div class="col-md-6 text-left">
					<h3>Moves 2-4</h3>
					<p>Player 1 was allowed to place a second X on the board. Player 2 was then allowed to place his 2 peices</p>
				</div>
			</div>
			<!-- /.row -->
			
			<!-- Row 4 -->
			<div class="row">
				<div class="col-md-6 text-center">
					<img src="assets/images/ttt4.jpg" width="300" height="300">
				</div>
				<div class="col-md-6 text-left">
					<h3>Moves 5-8</h3>
					<p>Play continues with player 3(square) and player 4 (triangle) placing thier pieces. Play them returns to player 1.</p>
				</div>
			</div>
		   <!-- /.row -->
		   
		   <!-- Row 5 -->
			<div class="row">
				<div class="col-md-6 text-center">
					<img src="assets/images/ttt5.jpg" width="300" height="300">
				</div>
				<div class="col-md-6 text-left">
					<h3>Moves 9-16</h3>
					<p>Play continues with each player placing thier next two pieces.</p>
				</div>
			</div>
		   <!-- /.row -->
		   
		   <!-- Row 6 -->
			<div class="row">
				<div class="col-md-6 text-center">
					<img src="assets/images/ttt6.jpg" width="300" height="300">
				</div>
				<div class="col-md-6 text-left">
					<h3>Moves 17-24</h3>
					<p>Play continues with each played taking another turn.</p>
				</div>
			</div>
		   <!-- /.row -->
		   
		   <!-- Row 7 -->
			<div class="row">
				<div class="col-md-6 text-center">
					<img src="assets/images/ttt7.jpg" width="300" height="300">
				</div>
				<div class="col-md-6 text-left">
					<h3>Moves 25-26</h3>
					 <p>Player 2 (O) wins with 5 in a row. </p>
					 <p> In standard Tic- Tac-Toe it takes a minimum of three turns in order win. Because each player is allowed two moves per turn in this varriation and must get five in a row, it is very similar in that it takes a minimum of 3 turns in order to win. By allowing each player two peices per round it also allows much more flexibility in play. Instead of having to use your only piece to block, you are given a second one allowing more choice in placements. </p>
				</div>
			</div>
		   	<!-- /.row -->
<?php
	include("assets/php/bottomproj.php")
?>