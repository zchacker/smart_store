<h1 class="text-center">Make it, wear it, be authentic</h1>
<div class="container">

  <?php
    foreach ($fabrics as $key => $value) {
      echo "
      <div class='col-md-4 product-grid'>
        <div class='image'>
          <a href='javascript:select_fabric( \"$value->id\" , \"$value->photo\" , \"$value->name\" , \"$value->price\" );'>
            <img src='".base_url()."upload/$value->photo' class='w-100 image' alt=''>
          </a>
        </div>
          <h4 class='text-center'>$value->name</h4>
          <h5 class='text-center'>$value->price SAR</h5>
          <a href='javascript:select_fabric( \"$value->id\" , \"$value->photo\" , \"$value->name\" , \"$value->price\" );'  class='btn buy'>Buy Now</a>
      </div>
      ";
    }
  ?>
</div>

<script type="text/javascript">

  function select_fabric( id ,  photo ,  name ,  price){

    var url = "<?=base_url()?>design";
    $.post( url , { id:id , photo:photo , name:name , price:price } )
    .done(function( data ) {
      window.location.href = url ;
    });

  }
</script>
