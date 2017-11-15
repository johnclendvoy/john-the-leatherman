var num_points = 15;
var points = [];
var bg_color;
var darkest;
var loop;

var speed = 5;
var maxSize = 300;
var minSize = 20;

class Point {

	constructor() {
	    this.relocate();
	}

	reachedMax()
	{
		return this.size >= this.max;
	}

	relocate() {
	    this.x = random(0,windowWidth);
	    this.y = random(0,windowHeight);
	    this.max = random(minSize, maxSize);
	    this.size = 0;
	    this.dir = 'out';
	}

	finished() {
		return this.size <= 0 && this.dir == 'in';
	}

	shrink() {
		this.dir = 'in';
	}

	increment()
	{
		if(this.dir == 'out'){
			this.size += 1;
		}
		else
		{
			this.size -= 1;
		}
	}

	getColor()
	{
		var percent = this.size/this.max;
		return lerpColor(bg_color, darkest, percent);
	}
}

function setup() {
	/*
#AD8A64
#373D20
#F1F7EE
#854D27
#565264
*/

	loop = 0;
	bg_color = color('#F1F7EE');
	// darkest = color('#4d585d');
	darkest = color('#854D27');

  	var canvas = createCanvas(windowWidth, windowHeight);
  	canvas.parent('animated-bg');
  	background(bg_color);
  	noStroke();

  	// give 10 random points a position
  	for(var i = 0; i < num_points; i++)
  	{
	  	points[i] = new Point();
  	}
}

function draw() {

	if( loop % speed == 0){

	  	background(bg_color);

		for(var i = 0; i < num_points; i++)
		{
			fill(points[i].getColor());
			ellipse(points[i].x, points[i].y, points[i].size, points[i].size);

		  	points[i].increment();

		  	if(points[i].reachedMax())
		  	{
		  		points[i].shrink();
		  	}

		  	if(points[i].finished())
		  	{
		  		points[i].relocate();
		  	}
		}
	}
	loop++;
}

function windowResized() {
	resizeCanvas(windowWidth, windowHeight);
}