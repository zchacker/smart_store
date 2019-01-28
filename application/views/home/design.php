<!-- <h1 class="text-center">مرحبا بكم في متجر الازياء الذكي</h1> -->

<div class="container">
  <div class="row">
    <div class='col-md-12'>
      <h2 class="text-center"> Draw your design </h2>
      <hr>
    </div>
  </div>
  <div class="row">
    <canvas id="canvass" width="400" height="600"></canvas>
    <!-- <button type="button" name="button" onclick="clearCanvas();">مسح الرسمة</button> -->

    <div class="col-md-6">
      <h1 class="text-center">أو تحميل صورة</h1>
      <center>
        <form class="" action="<?=base_url()?>index.php/tailor" method="post" id="img_form" enctype="multipart/form-data">
          <div class="form-group">
            <input type="file" name="image" id="photoUploadFile" value="" onchange="preview_images()" >
          </div>
          <div class="form-group">
            <div id="image_preview"></div>
          </div>
          <!-- <img src="<?=base_url()?>upload/0445790.jpg" alt=""> -->
        </form>
      </center>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10">
      <hr>
      <button type="button" name="button" class="btn btn-success" onclick='send_to_server()'> أكمل الى التالي    </button>
      <br/>
      <br/>
      <br/>
    </div>
  </div>

  <hr/>
  <h2 class="text-center"> أو اختر مصمم </h2>
  <?php
  // var_dump($tailors);
    foreach ($designers as $key => $value) {
      echo "
      <div class='col-md-4 product-grid'>
        <div class='image'>
          <a href='javascript:select_design( \"$value->id\" ,  \"$value->name\" ,  \"$value->price\" );'>
            <img src='".base_url()."upload/profile.png' class='w-100 image' alt=''>
          </a>
        </div>
          <h4 class='text-center'>$value->name</h4>
          <h5 class='text-center'>$value->price ريال</h5>
          <a href='javascript:select_design( \"$value->id\" ,  \"$value->name\" ,  \"$value->price\" )'  class='btn buy'> اختر الان </a>
      </div>
      ";
    }
  ?>

</div>


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

    $('#canvass').mousedown(function(e){
      var mouseX = e.pageX - this.offsetLeft;
      var mouseY = e.pageY - this.offsetTop;

      paint = true;
      addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop);
      redraw();

    });

    $('#canvass').mousemove(function(e){
      if(paint){
        addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
        redraw();
      }
    });

    $('#canvass').mouseup(function(e){
      paint = false;
    });

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

  function clearCanvas() {

    context.clearRect(0, 0, canvasWidth, canvasHeight);

    context = null;

    canvas  = document.getElementById('canvass');
    context = canvas.getContext("2d");
  }

  function preview_images() {
    $('#image_preview').html("<div class='col-md-10'><img class='img-responsive' src='"+URL.createObjectURL(event.target.files[0])+"'></div>");
  }

  function send_to_server(){
    var url = "<?=base_url()?>tailor";

    if( document.getElementById("photoUploadFile").files.length == 0 ){
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
    }else{
        console.log("files selected");

        var formData = new FormData($('#img_form')[0]);

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
                //alert(data)
                window.location.href = url ;
            },
            cache: false,
            contentType: false,
            processData: false
        });


    }
  }

  function select_design( id ,  name ,  price) {

    var url = "<?=base_url()?>index.php/tailor";

    $.post( url , { design:"yes" , id:id , name:name , price:price } )
      .done(function( data ) {
        window.location.href = url ;
    });
  }

</script>
