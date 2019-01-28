<h1 class="text-center">Make it, wear it, be authentic</h1>
<div class="container">
  <center>
    <h4 >Drow your dress design</h4>

      <center>
        <canvas id="canvass" width="300" height="600"></canvas>
      </center>
      <!-- <button id="clear">clear</button><br> -->

    <div class="choice_wraper" style="margin-bottom: 100px;">
      <button type="button" name="button" class="btn btn-success" onclick='send_to_server()'> Next </button>
    </div>

  </center>
</div>

<script src="//code.jquery.com/mobile/1.5.0-alpha.1/jquery.mobile-1.5.0-alpha.1.min.js"></script>
<script type="text/javascript">

  var clickX = new Array();
  var clickY = new Array();
  var clickDrag = new Array();
  var canvasWidth = 400;
  var canvasHeight = 600;
  var canvas;
  var context;

  $(document).ready(function(){
    var paint;
    canvas  = document.getElementById('canvass');
    context = canvas.getContext("2d");

    $('#canvass').bind('touchstart mousedown', function(e){

        var mouseX = e.pageX - this.offsetLeft;
        var mouseY = e.pageY - this.offsetTop;

        paint = true;
        addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop);
        redraw();
    });


    $('#canvass').bind('touchmove mousemove', function(e){
        if(paint){
          addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
          redraw();
        }
    });

    $('#canvass').bind('touchend mouseup', function(e){
      paint = false;
    });

    // $('#canvass').mousedown(function(e){
    //   var mouseX = e.pageX - this.offsetLeft;
    //   var mouseY = e.pageY - this.offsetTop;
    //
    //   paint = true;
    //   addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop);
    //   redraw();
    // });
    //
    //
    // $('#canvass').mousemove(function(e){
    //   if(paint){
    //     addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
    //     redraw();
    //   }
    // });
    //
    // $('#canvass').mouseup(function(e){
    //   paint = false;
    // });

    function addClick(x, y, dragging) {
      clickX.push(x);
      clickY.push(y);
      clickDrag.push(dragging);
    }

    function redraw(){

      context.clearRect(0, 0, context.canvas.width, context.canvas.height); // Clears the canvas
      context.strokeStyle = "#df4b26";
      context.lineJoin = "round";
      context.lineWidth = 7;

      for(var i=0; i < clickX.length; i++) {
        context.beginPath();
        if(clickDrag[i] && i){
          context.moveTo(clickX[i-1], clickY[i-1]);
         }else{
           context.moveTo(clickX[i]-1, clickY[i]);
         }
         context.lineTo(clickX[i], clickY[i]);
         context.closePath();
         context.stroke();
      }
    }

  });


  // window.onload = function() {
  //
  //   document.ontouchmove = function(e){ e.preventDefault(); }
  //
  //   var canvas  = document.getElementById('canvass');
  //   var canvastop = canvas.offsetTop
  //
  //   var context = canvas.getContext("2d");
  //
  //   var lastx;
  //   var lasty;
  //
  //   context.strokeStyle = "#000000";
  //   context.lineCap = 'round';
  //   context.lineJoin = 'round';
  //   context.lineWidth = 5;
  //
  //   function clear() {
  //     context.fillStyle = "#ffffff";
  //     context.rect(0, 0, 300, 300);
  //     context.fill();
  //   }
  //
  //   function dot(x,y) {
  //     context.beginPath();
  //     context.fillStyle = "#000000";
  //     context.arc(x,y,1,0,Math.PI*2,true);
  //     context.fill();
  //     context.stroke();
  //     context.closePath();
  //   }
  //
  //   function line(fromx,fromy, tox,toy) {
  //     context.beginPath();
  //     context.moveTo(fromx, fromy);
  //     context.lineTo(tox, toy);
  //     context.stroke();
  //     context.closePath();
  //   }
  //
  //   canvas.ontouchstart = function(event){
  //     event.preventDefault();
  //
  //     lastx = event.touches[0].clientX;
  //     lasty = event.touches[0].clientY - canvastop;
  //
  //     dot(lastx,lasty);
  //   }
  //
  //   canvas.ontouchmove = function(event){
  //     event.preventDefault();
  //
  //     var newx = event.touches[0].clientX;
  //     var newy = event.touches[0].clientY - canvastop;
  //
  //     line(lastx,lasty, newx,newy);
  //
  //     lastx = newx;
  //     lasty = newy;
  //   }
  //
  //
  //   var clearButton = document.getElementById('clear')
  //   clearButton.onclick = clear
  //
  //   clear()
  // }


  function send_to_server(){

    var url = "<?=base_url()?>tailor";
    console.log("no files selected");

    var dataURL = canvas.toDataURL();
    $.ajax({
      type: "POST",
      url: url,
      data: {
         design_img: dataURL
      }
    }).done(function(o) {
      console.log('saved');
      window.location.href = url ;
    });

  }


</script>
