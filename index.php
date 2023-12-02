<?php include_once('core/header.php');
if ($_SESSION['admin']=='1') {
  // code...
  echo "<script>window.location='dashboard.php'</script>";

}
?>
    <section class="form-01-main">
      <div class="form-cover">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="form-sub-main">
              <div class="_main_head_as">
                <a href="#">
                  <img src="assets/images/vector.png">
                </a>
              </div>
              <?php
if ($error) {
  // code...
  echo "<center class='text-warning'>"
.$error."
  </center>";
}
              ?>
              <form action="" method="post" id="myForm">
              <div class="form-group">
                  <input id="email" name="email" class="form-control _ge_de_ol" type="text" placeholder="User Name" required="" aria-required="true">
              </div>

              <div class="form-group">                                              
                <input id="password" type="password" class="form-control" name="password" placeholder="********" required="required">
                <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
              </div>

               <input type="hidden"  name="login">

              <div class="form-group">
                <div class="btn_uy" onclick="login()">
                  <a href="javascript:;"><span>Login</span></a>
                </div>
              </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
  <script>
    function login()
    {

      myForm.submit();

    }
  </script>
<?php include_once('core/footer.php');?>