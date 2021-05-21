<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.0.5
  </div>
  <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
  reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="<?php echo base_url() ?>assets/plugins/chart.js-3.2.1/dist/chart.min.js"></script>

<script>
  var ctx = document.getElementById('myChart');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [<?php foreach (array_reverse($monthChart) as $m) {
                  echo "'" . $m . "',";
                } ?>],
      datasets: [{
          label: 'Output',
          data: [<?php foreach (array_reverse($modalChart) as $m) {
                    echo $m . ',';
                  } ?>],
          backgroundColor: [
            'rgba(220, 53, 69, 0.5)'
          ],
          borderColor: [
            'rgba(220, 53, 69, 1)'
          ],
          borderWidth: 1
        },
        {
          label: 'Input',
          data: [<?php foreach (array_reverse($jualChart) as $j) {
                    echo $j . ',';
                  } ?>],
          backgroundColor: [
            'rgba(23, 162, 184, 0.5)'
          ],
          borderColor: [
            'rgba(23, 162, 184, 1)'
          ],
          borderWidth: 1
        }
      ]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
<script>
  $(document).ready(function() {
    $("#provinsi").change(function() {
      var url = "<?php echo site_url('transaction/add_ajax_kab'); ?>/" + $(this).val();
      $('#kabupaten').load(url);
      return false;
    })

    $("#kabupaten").change(function() {
      var url = "<?php echo site_url('transaction/add_ajax_kec'); ?>/" + $(this).val();
      $('#kecamatan').load(url);
      return false;
    })

    $("#kecamatan").change(function() {
      var url = "<?php echo site_url('transaction/add_ajax_des'); ?>/" + $(this).val();
      $('#desa').load(url);
      return false;
    })
    $("#desa").change(function() {
      var url = "<?php echo site_url('transaction/add_ajax_pos'); ?>/" + $(this).val();
      $('#postalcode').load(url);
      return false;
    })
  });
</script>
<script>
  $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });


  function previewImage() {
    document.getElementById("image-preview").style.display = "block";
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("gambar").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview").src = oFREvent.target.result;
    };
  };
</script>
<!-- fungsi javascript untuk menampilkan form dinamis  -->
<!-- penjelasan :
saat tombol add-more ditekan, maka akan memunculkan div dengan class copy -->
<script type="text/javascript">
  $(document).ready(function() {
    $(".add-more").click(function() {
      var html = $(".copy").html();
      $(".after-add-more").after(html);
      document.querySelector('#produk').toggleAttribute('disabled');
      document.querySelector('#jumlah').toggleAttribute('disabled');
    });

    // saat tombol remove dklik control group akan dihapus 
    $("body").on("click", ".remove", function() {
      $(this).parents(".control-group").remove();
    });
  });
</script>
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      // "lengthChange": false,
      // "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>

</html>