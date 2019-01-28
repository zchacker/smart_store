<div class="container">
  <h2 class="text-center"> Your Order </h2>
  <div class="row">
    <div class="col-md-8">
      <h3>Fabric</h3>
      <img src="<?=base_url();?>upload/<?=$_SESSION['fabric_photo']?>" alt="" width="400" />
      <div class="price"><strong> <?=$_SESSION['fabric_name'];?></strong></div>
      <div class="price"><strong> <?=$_SESSION['fabric_price'];?> SAR </strong></div>
    </div>
  </div>

  <?php
    if($_SESSION['is_photo'] == 1){
  ?>
  <div class="row">
    <div class="col-md-8">
      <h3>Design</h3>
      <img src="<?=$_SESSION['design_photo']?>" alt="" width="400" />
    </div>
  </div>
  <?php }else{ ?>
    <div class="row">
      <div class="col-md-8">
        <h3>Design</h3>
        <div class="name"><strong><?=$_SESSION['design_name'];?></strong></div>
        <div class="price"><strong><?=$_SESSION['design_price'];?> SAR</strong></div>
      </div>
    </div>
  <?php } ?>
  <div class="row">
    <div class="col-md-8">
      <h3>Tailor</h3>
      <div class="name"><strong><?=$_SESSION['tailor_name'];?></strong></div>
      <div class="price"><strong><?=$_SESSION['tailor_price'];?> SAR</strong></div>
    </div>
  </div>
  <?php
    if(isset($_SESSION['design_price']))
      $total = $_SESSION['fabric_price'] + $_SESSION['tailor_price'] + $_SESSION['design_price'];
    else
      $total = $_SESSION['fabric_price'] + $_SESSION['tailor_price'];
  ?>
  <hr>
  <div class="row">
    <div class="col-md-8">
      <strong style="color:red;">Total amount : <?=$total?> </strong>
      <br/>
      <br/>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-5">
      <form class="" action="<?=base_url();?>cart/confirem" method="post">

          <div class="form-group">
            <label for="">Your width</label>
            <input type="text" name="width" value="" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Your Height</label>
            <input type="text" name="height" value="" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Your Comments</label>
            <textarea name="comments" rows="8" class="form-control" cols="20"></textarea>
          </div>
          <br/>
          <button type="submit" name="button" class="btn btn-primary">Confirem Order</button>
          <br/>
          <br/>
          <br/>

      </form>
    </div>
  </div>
</div>
