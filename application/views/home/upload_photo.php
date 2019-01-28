<h1 class="text-center">Make it, wear it, be authentic</h1>
<div class="container">
  <center>
    <h4 >Upload your design photo</h4>
    <form class="" action="<?=base_url()?>index.php/tailor" method="post" id="img_form" enctype="multipart/form-data">

      <div class="form-group">
        <input type="file" name="image" id="photoUploadFile" value="" onchange="preview_images()" >
      </div>

      <div id="image_preview" ></div>

      <div class="form-group choice_wraper" style="margin-bottom: 100px;">
        <button type="submit" name="button" value="upload_photo" class="btn btn-success" onclick="" >Next</button>
      </div>

    </form>
  </center>
</div>

<script type="text/javascript">

  function preview_images() {
    $('#image_preview').html("<div class='col-md-10'><img class='img-responsive' src='"+URL.createObjectURL(event.target.files[0])+"'></div>");
  }

  function send_to_server(){

    var url = "<?=base_url()?>index.php/tailor";
    if( document.getElementById("photoUploadFile").files.length == 0 ){
      return false;
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

</script>
