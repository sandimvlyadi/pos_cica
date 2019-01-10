<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Point Of Sale</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>assets/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url();?>assets/Ionicons/css/ionicons.min.css">

  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?=base_url();?>assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <link rel="stylesheet" href="<?=base_url();?>assets/datatables-bs/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="<?=base_url();?>assets/image-picker/image-picker.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dist/css/skins/skin-green.min.css">

   <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/upload_ajax/css/fileinput.css" />

  <!-- jQuery 3 -->
  <script src="<?=base_url();?>assets/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?=base_url();?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/upload_ajax/js/notify.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/upload_ajax/js/fileinput.js"></script>
  <script src="<?=base_url();?>assets/js/accounting.min.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>POS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Point</b> Of <b>Sale</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?=base_url();?>assets/dist/img/boxed-bg.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?=$this->session->userdata('username');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?=base_url();?>assets/dist/img/boxed-bg.jpg" class="img-circle" alt="User Image">

                <p>
                  <?=$this->session->userdata('nama');?>
                  <br/>
                  <span style="font-size: 12px;">Sebagai : <?=$this->session->userdata('role');?></span>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url();?>dashboard/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <!--<div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url();?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
     <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <!--<li class="header">MAIN NAVIGATION</li>-->

        <li class="header">KATEGORI MENU</li>
        <?php foreach ($kategori as $k) { ?>
          <li>
            <a href="<?=site_url();?>order/add/<?=$k->id_kategori;?>">
              <i class="fa fa-square"></i>
              <span><?=$k->kategori;?></span>
              <span class="pull-right-container">
                <!--<i class="fa fa-angle-left pull-right"></i>-->
              </span>
            </a>
          </li>
        <?php } ?>

        <li class="active">
          <a href="<?=site_url();?>order/index/">
            <i class="fa fa-shopping-cart"></i>
            <span>Lihat Transaksi</span>
            <span class="pull-right-container">
              <!--<i class="fa fa-angle-left pull-right"></i>-->
            </span>
          </a>
        </li>

        <li class="active treeview">
          <a href="#">
            <i class="fa fa-circle-o"></i> <span>Bahan Baku</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="<?=base_url('bahan_baku');?>"><i class="fa fa-circle"></i> Bahan Baku</a></li> -->
            <!--<li><a href="<?=base_url('bahan_baku_masuk_baru');?>"><i class="fa fa-circle"></i> Bahan Baku Masuk</a></li>-->
            <li><a href="<?=base_url('bahan_baku_keluar_baru');?>"><i class="fa fa-circle"></i> Bahan Baku Keluar</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <?=$content; ?>
    
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <i class="fa fa-circle"></i>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a target="_new" href="#">Cica</a>.</strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- DataTables -->
<script src="<?=base_url();?>assets/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>assets/datatables-bs/js/dataTables.bootstrap.min.js"></script>

<script src="<?=base_url();?>assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url();?>assets/fastclick/lib/fastclick.js"></script>
<!-- Image Picker -->
<script src="<?=base_url();?>assets/image-picker/image-picker.js"></script>

<!-- AdminLTE App -->
<script src="<?=base_url();?>assets/dist/js/adminlte.min.js"></script>

<script src="<?=base_url();?>assets/ckeditor/ckeditor.js"></script>

<!-- bootstrap datepicker -->
<script src="<?=base_url();?>assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="<?=base_url('assets/tinymce/tinymce.min.js');?>"></script>
<script>
  tinymce.init({
    selector: '#mytextarea',
    plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'save table contextmenu directionality emoticons template paste textcolor'
    ],
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
    file_browser_callback: function(field, url, type, win) {
        tinyMCE.activeEditor.windowManager.open({
            file: '<?=base_url();?>/assets/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type,
            title: 'KCFinder',
            width: 700,
            height: 500,
            inline: true,
            close_previous: false
        }, {
            window: win,
            input: field
        });
        return false;
    }

  });
  </script>

<!-- <script>
  jQuery(document).ready(function($){
    base_url = '<?=base_url();?>';
    var _content = $('#mytextarea').get(0);
    var editor = CKEDITOR.replace( _content,
      {
         height: 400,
         filebrowserBrowseUrl : base_url + 'assets/kcfinder/browse.php?type=files',
         filebrowserImageBrowseUrl : base_url + 'assets/kcfinder/browse.php?type=images',
         filebrowserFlashBrowseUrl : base_url + 'assets/kcfinder/browse.php?type=flash',
         filebrowserUploadUrl : base_url + 'assets/kcfinder/upload.php?type=files',
         filebrowserImageUploadUrl : base_url + 'assets/kcfinder/upload.php?type=images',
         filebrowserFlashUploadUrl : base_url + 'assets/kcfinder/upload.php?type=flash'     
      });
  }); 
</script> -->

<script>
  $(function () {
     $(".select").imagepicker({
          show_label  : true
        })

    //$('#example1').DataTable()
    $('.nameTable').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    });

    $('.pelaksanaTable').DataTable({
      'paging'      : false,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'scrollY'     : 200
    });

    /*CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');*/

    //Date picker
    $('.datepicker').datepicker({autoclose:true, format: "dd-mm-yyyy"});

  })
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>