var canvas, stage, container = new createjs.Container();;
var mouseTarget;	// the display object currently under the mouse, or being dragged
var dragStarted;	// indicates whether we are currently in a drag operation
var offset;
var update = true;
var finish = false;


function init() {
  //show loading
  examples.showDistractor();

  //settings
  stage = new createjs.Stage("demoCanvas");
  stage.mouseMoveOutside = true;
  createjs.Touch.enable(stage);
  stage.addChild(container);

  //setting image
  var image = new Image();
  image.src = "img/move1_1.jpg";
  image.onload = handleImageLoad1;

  var image = new Image();
  image.src = "img/move1_2.jpg";
  image.onload = handleImageLoad2;

  var image = new Image();
  image.src = "img/move1_3.jpg";
  image.onload = handleImageLoad3;


  //bg image
  var imagebg = new Image();
  imagebg.src = "img/bg1.jpg";
  bitmapBg = new createjs.Bitmap(imagebg);
  container.addChild(bitmapBg);
  bitmapBg.x = 0;
  bitmapBg.y = 0;

  examples.hideDistractor();
  createjs.Ticker.addEventListener("tick", tick);
  stage.update();
}

function success(evt, bitmap, pressMove)
{
  if(finish)
    return;

  if(evt.stageX>=0 && evt.stageX <= 300 && evt.stageY > 0 && evt.stageY<300)
  {
    bitmap.x =  100;
    bitmap.y =  100;
    finish = true;

    $('#dialog').fadeIn();
    update = true;
  }
  else{
    failed(evt, bitmap);
  }
}

function failed(evt, bitmap)
{
  if(finish)
    return;

  $('#dialog2').fadeIn();
  update = true;
  finish = true;
}

function handleImageLoad1(event) {
  var image = event.target;
  var bitmap;

  bitmap = new createjs.Bitmap(image);
  container.addChild(bitmap);
  bitmap.x = 0;
  bitmap.y = 315;
  bitmap.cursor = "pointer";

  //touch event
  function handleMove(evt)
  {
      success(evt, bitmap);
  }

  // using "on" binds the listener to the scope of the currentTarget by default
  // in this case that means it executes in the scope of the button.
  bitmap.on("mousedown", function (evt) {
    this.parent.addChild(this);
    // alert('down');
    this.offset = {x: this.x - evt.stageX, y: this.y - evt.stageY};
  });

  bitmap.on("pressup", handleMove);

  // the pressmove event is dispatched when the mouse moves after a mousedown on the target until the mouse is released.
  var pressMove = bitmap.on("pressmove", function (evt) {
    if(finish)
      return;

    this.x = evt.stageX + this.offset.x;
    this.y = evt.stageY + this.offset.y;
    // indicate that the stage should be updated on the next tick:
    update = true;
  });

  update = true;
}

function handleImageLoad2(event) {
  var image = event.target;
  var bitmap;

  bitmap = new createjs.Bitmap(image);
  container.addChild(bitmap);
  bitmap.x = 100;
  bitmap.y = 315;
  bitmap.cursor = "pointer";

  //touch event
  function handleMove(evt)
  {
      failed(evt, bitmap);
  }

  bitmap.on("mousedown", function (evt) {
    this.parent.addChild(this);
    this.offset = {x: this.x - evt.stageX, y: this.y - evt.stageY};
  });
  bitmap.on("pressup", handleMove);
  var pressMove = bitmap.on("pressmove", function (evt) {
    if(finish)
      return;
    this.x = evt.stageX + this.offset.x;
    this.y = evt.stageY + this.offset.y;
    update = true;
  });

  update = true;
}


function handleImageLoad3(event) {
  var image = event.target;
  var bitmap;

  bitmap = new createjs.Bitmap(image);
  container.addChild(bitmap);
  bitmap.x = 200;
  bitmap.y = 315;
  bitmap.cursor = "pointer";

  //touch event
  function handleMove(evt)
  {
      failed(evt, bitmap);
  }

  // using "on" binds the listener to the scope of the currentTarget by default
  // in this case that means it executes in the scope of the button.
  bitmap.on("mousedown", function (evt) {
    this.parent.addChild(this);
    // alert('down');
    this.offset = {x: this.x - evt.stageX, y: this.y - evt.stageY};
  });

  bitmap.on("pressup", handleMove);

  // the pressmove event is dispatched when the mouse moves after a mousedown on the target until the mouse is released.
  var pressMove = bitmap.on("pressmove", function (evt) {
    if(finish)
      return;
    this.x = evt.stageX + this.offset.x;
    this.y = evt.stageY + this.offset.y;
    // indicate that the stage should be updated on the next tick:
    update = true;
  });

  update = true;
}

function tick(event) {
  // this set makes it so the stage only re-renders when an event handler indicates a change has happened.
  if (update) {
    update = false; // only update once
    stage.update(event);
  }
}

$( document ).ready(function() {
    update= false;
});
