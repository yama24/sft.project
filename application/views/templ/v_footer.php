<footer class="main-footer">
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.1.0
  </div>
</footer>

<?php
$id_user = $this->session->userdata('id');
$user = $this->db->get_where('pengguna', ['pengguna_id' => $id_user])->row_array();
?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  <div class="card-body box-profile">
    <div class="text-center">
      <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url(); ?>assets/dist/img/yama.jpg" alt="User profile picture">
    </div>

    <h3 class="profile-username text-center"><?php echo $user['pengguna_nama'] ?> <?php echo $user['pengguna_email'] ?></h3>

    <p class="text-muted text-center">Software Engineer</p>

    <ul class="list-group list-group-unbordered mb-3">
      <li class="list-group-item px-2">
        <b>Followers</b> <a class="float-right">1,322</a>
      </li>
      <li class="list-group-item px-2">
        <b>Following</b> <a class="float-right">543</a>
      </li>
      <li class="list-group-item px-2">
        <b>Friends</b> <a class="float-right">13,287</a>
      </li>
    </ul>

    <a href="<?= base_url('login/keluar') ?>" class="btn btn-danger btn-block"><b>Logout</b></a>
  </div>
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
<!-- <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script> -->
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>


<script src="<?php echo base_url() ?>assets/plugins/chart.js-3.2.1/dist/chart.min.js"></script>
<?php if (!(date('His') >= 060000 && date('His') <= 180000)) { ?>
  <script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [<?php foreach (array_reverse($monthChart) as $m) {
                    echo "'" . $m . "',";
                  } ?>],
        datasets: [{
            label: 'Expense',
            data: [<?php foreach (array_reverse($modalChart) as $m) {
                      echo $m . ',';
                    } ?>],
            backgroundColor: [
              'rgba(220, 53, 69, 0.7)'
            ],
            borderColor: [
              'rgba(220, 53, 69, 1)'
            ],
            borderWidth: 1
          },
          {
            label: 'Income',
            data: [<?php foreach (array_reverse($jualChart) as $j) {
                      echo $j . ',';
                    } ?>],
            backgroundColor: [
              'rgba(0, 123, 255, 0.7)'
            ],
            borderColor: [
              'rgba(0, 123, 255, 1)'
            ],
            borderWidth: 1
          }
        ]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            grid: {
              color: ['#666']
            },
            ticks: {
              color: ['#fff']
            }
          },
          x: {
            grid: {
              color: ['#666']
            },
            ticks: {
              color: ['#fff']
            }
          }
        },
        color: ['#fff']
      }
    });
  </script>
<?php } else { ?>
  <script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [<?php foreach (array_reverse($monthChart) as $m) {
                    echo "'" . $m . "',";
                  } ?>],
        datasets: [{
            label: 'Expense',
            data: [<?php foreach (array_reverse($modalChart) as $m) {
                      echo $m . ',';
                    } ?>],
            backgroundColor: [
              'rgba(220, 53, 69, 0.7)'
            ],
            borderColor: [
              'rgba(220, 53, 69, 1)'
            ],
            borderWidth: 1
          },
          {
            label: 'Income',
            data: [<?php foreach (array_reverse($jualChart) as $j) {
                      echo $j . ',';
                    } ?>],
            backgroundColor: [
              'rgba(0, 123, 255, 0.7)'
            ],
            borderColor: [
              'rgba(0, 123, 255, 1)'
            ],
            borderWidth: 1
          }
        ]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          }
        }
      }
    });
  </script>
<?php } ?>
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
    $('#label').DataTable({
      "paging": true,
      // "lengthChange": false,
      // "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "processing": true,
      "serverSide": true,
      "order": [],

      "ajax": {
        "url": "<?php echo base_url('label/dataServer') ?>",
        "type": "POST"
      },


      "columnDefs": [{
        "targets": [0],
        "orderable": false,
      }, ],

    });
  });
  $(function() {
    $('#transaction').DataTable({
      "paging": true,
      // "lengthChange": false,
      // "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "processing": true,
      "serverSide": true,
      "order": [],

      "ajax": {
        "url": "<?php echo base_url('transaction/dataServer') ?>",
        "type": "POST"
      },


      "columnDefs": [{
        "targets": [0],
        "orderable": false,
      }, ],

    });
  });
  $(function() {
    $('#product').DataTable({
      "paging": true,
      // "lengthChange": false,
      // "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "processing": true,
      "serverSide": true,
      "order": [],

      "ajax": {
        "url": "<?php echo base_url('product/dataServer') ?>",
        "type": "POST"
      },


      "columnDefs": [{
        "targets": [0],
        "orderable": false,
      }, ],

    });
  });
</script>
<script>
  function logoutPrompt(){
    var logoutConfirm = confirm('Apakah anda ingin logout?');
    if (logoutConfirm) {
      window.location.href = "<?php echo base_url() . 'login/keluar' ?>";
    }
  }
</script>
</body>

</html>