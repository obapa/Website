//begin projects info, just add to projects array
var MIPSProcessor = {
	src:"assets/images/MIPS.png",
	alt:"MIPS processor",
	title:"Virtual MIPS processor",
	href:"MIPS.php",
	year:"2018"
};
var DES = {
	src:"assets/images/DESKey.jpg",
	alt:"DES implementation",
	title:"DES implementation",
	href:"DES.php",
	year:"2017"
};
var mazeSolver = {
	src:"assets/images/mazeSolver.jpg",
	alt:"Embedded maze solver",
	title:"Maze Solver",
	href:"mazeSolver.php",
	year:"2016"
};
var Dominion = {
	src:"assets/images/Dominion.png",
	alt:"Dominion",
	title:"FPGA Dominion",
	href:"Dominion.php",
	year:"2018"
};
var computer = {
	src:"assets/images/computer.png",
	alt:"Breadboard Computer",
	title:"Breadbord Computer",
	href:"computer.php",
	year:"2018"
};
var cube = {
	src: "assets/images/cube.png", 
	alt:"LED Cube",
	title:"4x4x4 LED cube",
	href:"ledCube.php",
	year:"2017"
};
var robotArm = {
	src:"assets/images/robot.png", 
	alt:"Robot Manipulator", 
	title:"Converted Robot Manipulator",
	href:"robotArm.php" ,
	year:"2017"		
};
var tensor = {
	src:"assets/images/ban3.png", 
	alt:"Tensor Voting", 
	title:"Tensor Voting Framework",
	href:"tensor.php" ,
	year:"2017"		
};
var biodigestor = {
	src:"assets/images/biodigestor.jpg",
	alt:"Biodigestor",
	title:"Biodigestor",
	href:"biodigestor.php",
	year:"2014"
};
var ticTacToe = {
	src:"assets/images/ticTacToe.jpg",
	alt:"Tic Tac Toe",
	title:"Tic Tac Toe",
	href:"ticTacToe.php",
	year:"2015"
};
var NasaSwarmathon = {
	src:"assets/images/XX.jpg",
	alt:"",
	title:"",
	href:"ticTacToe.php",
	year:"2015"
};
	
var projects = [cube, robotArm, tensor, biodigestor, ticTacToe, MIPSProcessor, DES, mazeSolver, Dominion, computer];


function add_random_project(amount) {
	//image gen loop
	var rand = []
	rand = rand_gen(amount, projects.length);
	var i;
	for( i = 0; i < amount; i++){
		add_project(i, projects[rand[i]]);
	}
}   
   
function add_ordered_projects() {
	var i;
	var orderproj = []
	orderproj = order_array(projects);
	
	for( i = 0; i< orderproj.length; i++ ){
		add_project(i, orderproj[i]);
	}
}
   
function order_array(ain) {
	var i;
	var aout = [];
	var curyear = ain[0].year;
	for( i = 0; i < ain.length; i++ ) {
		if(ain[i].year > curyear){
			curyear = ain[i].year;
		}
	}	
	while (aout.length < ain.length){
		for( i = 0; i < ain.length; i++){
			if( ain[i].year == curyear ){
				aout.push(ain[i]);
			}
		}
		curyear--;
	}
	return aout;
}
   
//generates n unique random numbers up to size
function rand_gen(n, size) {
	var i;
	var rand = [];
	var pass;
	var number;
  
	for (i = 0; i < n; i++){
		do{
			var g;
			pass = 1;
			number = Math.floor(Math.random() * size);
			
			for(g = 0; g < rand.length; g++){
				if(number == rand[g]){
					pass = 0;
					break;
				}
			}
		}	
		while(pass == 0);
    
		rand.push(number);
	}
	return rand;
}
	
function add_project(i,proj) {
	var id = "projpic" + i;
	show_image(id, proj.src, 260,156, proj.alt, proj.title, proj.href);
	id = "projpic"+i+"title";
	var title = proj.title + " - " + proj.year;
	show_title(id, title);
	
}

function show_image(id, src, width, height, alt, title, href) {
	var img = document.createElement("img");
	img.src = src;
	img.width = width;
	img.height = height;
	img.alt = alt;
	img.title = title;
	
	var link = document.createElement("a");
	link.href = href;
	link.appendChild(img);
	
	document.getElementById(id).appendChild(link);
}

function show_title(id, title) {
	document.getElementById(id).innerHTML = title;
}