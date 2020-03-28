
const canvas = document.getElementById('game-canvas');
const context = canvas.getContext('2d');

const gridWidth = 32;
const gridHeight = 24;
const unitSize = 32;

canvas.setAttribute("width", gridWidth*unitSize);
canvas.setAttribute("height", gridHeight*unitSize);

var snake;

var dir;
var requestDir;
var score;
var fruit = {
	x: 0,
	y: 0
};

function initGame() {
	snake = [];
	snake[0] = {
		x: gridWidth/2,
		y: gridHeight/2
	}

	dir = 1;
	requestDir = 1;
	score = 0;

	placeFruit();
}


document.addEventListener('keydown', keyPressed)

function keyPressed(event) {
	if(event.key == 'w')
		requestDir = 0;
	else if(event.key == 'd') 
		requestDir = 1;
	else if(event.key == 's')
		requestDir = 2;
	else if(event.key == 'a')
		requestDir = 3;
}

function update() {
	
	if(requestDir % 2 != dir % 2) {
		dir = requestDir;
	}

	var head = move();
	
	if(head.x == fruit.x && head.y == fruit.y){
		placeFruit();
		score++
	}else{
		if(snake.length > 3){
			snake.pop();
		}
	}

	for(let i = 0; i < snake.length; i++) {
		if(head.x == snake[i].x && head.y == snake[i].y){
			initGame();
			return;
		}
	}
	snake.unshift(head);

	draw();
}

function move() {
	var x = snake[0].x;
	var y = snake[0].y;

	if(dir == 0) y--;
	else if(dir == 1) x++;
	else if(dir == 2) y++;
	else if(dir == 3) x--;
	
	if(x < 0)
		x = gridWidth - 1;
	else if(x == gridWidth)
		x = 0;
	
	if(y < 0)
		y = gridHeight - 1;
	else if(y == gridHeight)
		y = 0;

	return {x: x, y: y};
}

function placeFruit() {
	var isOnSnake = true;
	while(isOnSnake) {
		fruit.x = Math.floor(Math.random() * gridWidth);
		fruit.y = Math.floor(Math.random() * gridHeight);

		isOnSnake = false;
		for(let i = 0; i < snake.length; i++) {
			if(fruit.x == snake[i].x && fruit.y == snake[i].y)
				isOnSnake = true;
		}
	}


}

function draw() {
	context.fillStyle = "rgb(40, 40, 40)";
	context.fillRect(0, 0, canvas.width, canvas.height);

	context.fillStyle = "rgb(220, 60, 40)";
	context.fillRect(fruit.x * unitSize, fruit.y * unitSize, unitSize, unitSize);

	context.fillStyle = "rgb(60, 200, 40)";
	for(let i = 0; i < snake.length; i++) {
		context.fillRect(snake[i].x * unitSize, snake[i].y * unitSize, unitSize, unitSize);
	}
}

initGame();
var game = setInterval(update, 100);