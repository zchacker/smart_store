<div class="container">
  <h2 class="text-center"> choose the tailor </h2>
    <?php
    // var_dump($tailors);
      foreach ($tailors as $key => $value) {
        echo "
        <div class='col-md-4 product-grid'>
          <div class='image'>
            <a href='javascript:select_railor( \"$value->id\" ,  \"$value->name\" ,  \"$value->price\" );'>
              <img src='".base_url()."upload/profile.png' class='w-100 image' alt=''>
            </a>
          </div>
            <h4 class='text-center'>$value->name</h4>
            <h5 class='text-center'>$value->price ريال</h5>
            <a href='javascript:select_railor( \"$value->id\" ,  \"$value->name\" ,  \"$value->price\" )'  class='btn buy'> اختر الان </a>
        </div>
        ";
      }
    ?>
</div>

<script type="text/javascript">
  function select_railor( id ,  name ,  price) {
    var url = "<?=base_url()?>index.php/cart";

    $.post( url , { tailor:"yes" , id:id , name:name , price:price } )
    .done(function( data ) {
      window.location.href = url ;
    });
  }
</script>
