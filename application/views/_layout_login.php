<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= APP_TITLE ?> - <?= $title ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/css/vendor.bundle.base.css">
    
  <link href="<?= base_url() ?>assets/vendors/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">    
  <link href="<?= base_url() ?>assets/vendors/datatables/dataTables.button.min.css" rel="stylesheet">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.png" />
    
  <script src="<?= base_url() ?>assets/vendors/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/vendors/jquery-validate/jquery-validate.min.js"></script>
  <script src="<?= base_url() ?>assets/vendors/jquery-form/jquery-form.min.js"></script>
  <script src="<?= base_url() ?>assets/js/time.js"></script>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <h2 class="text-center"><?= APP_TITLE ?></h2>
                <form class="pt-3" method="POST" action="<?= base_url() ?>auth/cek_login">
                  <div class="form-group">
                      <?php
                      
                      if ($this->session->flashdata('message')) { 
                          echo "
                            <div class='alert alert-danger alert-dismissible'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"
                          . $this->session->flashdata('message') . "</div>";
                      }
                      ?>
                    <input type="number" name="nik" class="form-control form-control-lg nik-pw" id="exampleInputEmail1" placeholder="NIK">
                    <input type="password" name="rfid" class="form-control form-control-lg rfid" id="exampleInputEmail1" placeholder="Tap ID Card">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg nik-pw" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn" >Masuk</button>
                  </div>
                </form>                
                <div class="mt-3">
                    <button class="btn btn-block btn-success btn-lg font-weight-medium login-id" >Masuk Dengan ID Card</button>
                    <button class="btn btn-block btn-success btn-lg font-weight-medium login-nik-pw" >Masuk Dengan NIK</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
      

<!-- plugins:js -->

<script src="<?= base_url() ?>assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="<?= base_url() ?>assets/vendors/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables/dataTables.bootstrap4.min.js"></script>

<!-- endinject -->

<script>
    var JS = {
        init: function(){
            
            $('.login-id').hide();
            $('.nik-pw').hide();
            
            $('.login-id').on('click', function(){
                
                $('.nik-pw').hide();
                $('.login-id').hide();
                
                $('.login-nik-pw').show();
                $('.rfid').show();
                
            });
            
            $('.login-nik-pw').on('click', function(){
                
                $('.nik-pw').show();
                $('.login-id').show();
                
                $('.login-nik-pw').hide();
                $('.rfid').hide();
                
            });
        }
    };
    
    $(document).ready(function(){
        JS.init();
    });
</script>


</body>
</html