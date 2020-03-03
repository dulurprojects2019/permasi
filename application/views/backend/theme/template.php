<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title_header ?></title>
  <?php foreach($iconbar as $icon) : ?>
      <link rel="icon" href="<?=base_url()?>assets/img/settings/iconbar/<?=$icon['icb_image']?>">
  <?php endforeach ?>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <!-- Tags -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/theme/backend/plugins/tags/css/bootstrap-tagsinput.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/theme/backend/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/theme/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/theme/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/theme/backend/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/theme/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/theme/backend/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/theme/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/theme/backend/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/theme/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <ul class="navbar-nav ml-auto">
      <!-- logout -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="<?= site_url('logout') ?>" class="dropdown-item">
            Logout
            <span class="float-right text-muted text-sm"><i class="fas fa-sign-out-alt"></i></span>
          </a>
        </div>
      </li>
      <!-- colour theme -->
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= site_url() ?>" class="brand-link">
    <?php if(!empty($icon['icb_image'])) : ?>
      <img src="<?=base_url()?>assets/img/settings/iconbar/<?=$icon['icb_image']?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
    <?php else : ?>
      <img src="<?=base_url()?>assets/img/settings/iconbar/noiconbar/bar.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
    <?php endif ?>
      <span class="brand-text font-weight-light">Blogs</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php if($this->fungsi->user_login()->usr_photo = 'nophoto.png') : ?>
            <img src="<?= base_url('assets/img/accounts/users/nophoto/nophoto.png') ?>" class="img-circle elevation-2" alt="User Image">
          <?php else : ?>
            <img src="<?= base_url('assets/img/accounts/users/'.$this->fungsi->user_login()->usr_photo.'') ?>" class="img-circle elevation-2" alt="User Image">
          <?php endif ?>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $this->fungsi->user_login()->usr_fullname ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- MENU -->
          <li class="nav-item">
            <a href="<?= site_url('dashboard') ?>" class="nav-link
              <?=$this->uri->uri_string() == 'dashboard'
              || $this->uri->segment(1) == '' ? 'active' : ''; ?>
              ">
              <i class="nav-icon fas fa-th-large"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        <?php if($this->fungsi->user_login()->usr_lvl_id == '1') : ?>
          <li class="nav-item has-treeview
          <?=$this->uri->uri_string() == 'accounts/users/users-list' 
          || $this->uri->uri_string() == 'accounts/users/add' 
          || $this->uri->uri_string() == 'accounts/levels/levels-list' 
          || $this->uri->uri_string() == 'accounts/levels/add' ? 'menu-open' : ''; ?>
          ">
            <a href="#" class="nav-link
            <?=$this->uri->uri_string() == 'accounts/users/users-list' 
          || $this->uri->uri_string() == 'accounts/users/users/add' 
          || $this->uri->uri_string() == 'accounts/levels/levels-list' 
          || $this->uri->uri_string() == 'accounts/levels/add' ? 'active' : ''; ?>
            ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Accounts
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('accounts/users/users-list'); ?>" class="nav-link
                  <?=$this->uri->uri_string() == 'accounts/users/users-list'
                  || $this->uri->uri_string() == '' ? 'active' : ''; ?>
                  ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('accounts/levels/levels-list'); ?>" class="nav-link
                  <?=$this->uri->uri_string() == 'accounts/levels/levels-list'
                  || $this->uri->uri_string() == '' ? 'active' : ''; ?>
                  ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('pages/pages-list') ?>" class="nav-link
              <?=$this->uri->uri_string() == 'pages/pages-list'
              || $this->uri->segment(1) == '' ? 'active' : ''; ?>
              ">
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Pages
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview
          <?=$this->uri->uri_string() == 'settings/menubar'
          || $this->uri->uri_string() == 'settings/menubar/add'
          || $this->uri->uri_string() == 'settings/iconbar'
          || $this->uri->uri_string() == 'settings/iconbar/add' ? 'menu-open' : ''; ?>
          ">
            <a href="#" class="nav-link
            <?=$this->uri->uri_string() == 'settings/menubar'
            || $this->uri->uri_string() == 'settings/menubar/add'
            || $this->uri->uri_string() == 'settings/iconbar'
            || $this->uri->uri_string() == 'settings/iconbar/add' ? 'active' : ''; ?>
            ">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('settings/iconbar'); ?>" class="nav-link
                  <?=$this->uri->uri_string() == 'settings/iconbar' 
                  || $this->uri->uri_string() == '' ? 'active' : ''; ?>
                  ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Iconbar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('settings/menubar'); ?>" class="nav-link
                  <?=$this->uri->uri_string() == 'settings/menubar' 
                  || $this->uri->uri_string() == '' ? 'active' : ''; ?>
                  ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menubar</p>
                </a>
              </li>
            </ul>
          </li>
        <?php endif; ?>
          <li class="nav-item has-treeview
          <?=$this->uri->uri_string() == 'blogs/categories' 
          || $this->uri->uri_string() == 'blogs/categories/add' 
          || $this->uri->uri_string() == 'blogs/blogs-list' 
          || $this->uri->uri_string() == 'blogs/blogs/add' ? 'menu-open' : ''; ?>
          ">
            <a href="#" class="nav-link
            <?=$this->uri->uri_string() == 'blogs/categories' 
          || $this->uri->uri_string() == 'blogs/categories/add' 
          || $this->uri->uri_string() == 'blogs/blogs-list' 
          || $this->uri->uri_string() == 'blogs/blogs/add' ? 'active' : ''; ?>
            ">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Blogs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <?php if($this->fungsi->user_login()->usr_lvl_id == '1') : ?>
              <li class="nav-item">
                <a href="<?= site_url('blogs/categories'); ?>" class="nav-link
                  <?=$this->uri->uri_string() == 'blogs/categories' 
                  || $this->uri->uri_string() == '' ? 'active' : ''; ?>
                  ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categiries Blog</p>
                </a>
              </li>
            <?php endif ?>
              <li class="nav-item">
                <a href="<?= site_url('blogs/blogs-list'); ?>" class="nav-link
                  <?=$this->uri->uri_string() == 'blogs/blogs-list' 
                  || $this->uri->uri_string() == '' ? 'active' : ''; ?>
                  ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blogs List</p>
                </a>
              </li>
            </ul>
          </li>
          <?php if($this->fungsi->user_login()->usr_lvl_id == '1') : ?>
          <li class="nav-item">
            <a href="<?= site_url('ads/ads-list') ?>" class="nav-link
              <?=$this->uri->uri_string() == 'ads/ads-list'
              || $this->uri->segment(1) == '' ? 'active' : ''; ?>
              ">
              <i class="fab fa-buysellads"></i>
              <p>
                Ads
              </p>
              <span class="right badge badge-danger">New</span>
            </a>
          </li>
          <?php endif ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <?= $contentsbackend; ?>

  <footer class="main-footer">
    Copyright &copy; <script>document.write(new Date().getFullYear());</script> | By DulurProjects
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/theme/backend/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/theme/backend/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/theme/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/theme/backend/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>assets/theme/backend/plugins/sparklines/sparkline.js"></script>
<script src="<?= base_url() ?>assets/theme/backend/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>assets/theme/backend/plugins/moment/moment.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/theme/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>assets/theme/backend/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/theme/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/theme/backend/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>assets/theme/backend/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/theme/backend/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/theme/backend/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/theme/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>assets/theme/backend/plugins/select2/js/select2.full.min.js"></script>
<!-- Tags -->
<script src="<?= base_url() ?>assets/theme/backend/plugins/tags/js/bootstrap-tagsinput.js"></script>

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
  });
</script>

<!-- search auto number 1 -->
<script type="text/javascript">
  $(document).ready(function() {
    var t = $('#example').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0,
            "order": [[ 1, 'asc' ]]
        } ],
        
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
  } );  
</script>

<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
</body>
</html>
