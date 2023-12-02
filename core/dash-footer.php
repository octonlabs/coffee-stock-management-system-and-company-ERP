<style type="text/css">
  *{
    font-family: cambria;
  }
  table,tr
  {
    width: 100%;
      border-collapse: collapse; /* Optional, for better styling */

  }
  td {
  border: 1px solid #ccc;
  padding: 10px;
  white-space: normal; 
}
#myTable
{
  width: 100%;
  white-space: normal;
  overflow-x: wrap;
}
</style>
 <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-12 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                Copyright &copy; <script>
                  document.write(new Date().getFullYear())
                </script> || 
                Logic By
                <a href="https://www.plaztechnologies.business.site" class="font-weight-bold" target="_blank">Plaz Technologies</a>
                
              </div>
            </div>
             
          </div>
        </div>
      </footer>
    </div>
  </main>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="assets/js/canvajs.min.js"></script>


 
  <!--   Core JS Files   -->
  <script src="dash/assets/js/core/popper.min.js"></script>
  <script src="dash/assets/js/core/bootstrap.min.js"></script>
  <script src="dash/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="dash/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="dash/assets/js/plugins/chartjs.min.js"></script>
  <script>
    $(document).ready(function() {
  $('#myTable').DataTable();
});



  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="dash/assets/js/argon-dashboard.min.js?v=2.0.4"></script>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>



</body>

</html>
 
 
