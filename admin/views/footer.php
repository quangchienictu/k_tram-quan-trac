<?php include("admin/models/m_main.php");  ?>
<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<!-- <aside class="main-sidebar">
    sidebar: style can be found in sidebar.less
    <section class="sidebar">
        Sidebar user panel
        <div class="user-panel">
            <div class="pull-left image">
                <img src="" class="img-circle" alt="User Image"  hidden >
            </div>
            <div class="pull-left info">
                <p>Tuấn Anh</p>

            </div>
        </div>
        sidebar menu: : style can be found in sidebar.less
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Danh Sách</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="index.php?object=trambom&action=list"><i class="fa fa-circle-o"></i> Danh Sách Trạm Bơm</a></li>
                    <li><a href="index.php?object=admin&action=list"><i class="fa fa-circle-o"></i> Danh Sách Admin Trạm Bơm</a></li>
                </ul>
            </li>

            <li>
                <a href="">
                    <i class="fa fa-th"></i> <span>Widgets</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-green">Hot</small>
            </span>
                </a>
            </li>

        </ul>
    </section>
    /.sidebar
</aside> -->
<!-- <?php  var_dump($quyen); ?> -->
<aside class="main-sidebar" style="text-align: left;">
   
    <section class="sidebar">
      
        <div class="user-panel">
            <div class="pull-left image">
                <img src="" class="img-circle" alt="User Image"  hidden >
            </div>
            <div class="pull-left info text-left" style="left: 0;">
                <p><?=$_SESSION['user']?></p>

            </div>
        </div>
       <hr>
       <p style="text-align: center;color: white;font-size: 15px;font-weight: bold;text-transform: uppercase;margin-bottom: 10px;">Chức năng</p>
        <ul class="sidebar-menu" data-widget="tree">
          <!--   <li class="treeview">
              <a href="#">
                  <i class="fa fa-dashboard"></i> <span>Danh Sách</span>
                  <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="index.php?object=trambom&action=list"><i class="fa fa-circle-o"></i> Danh Sách Trạm Bơm</a></li>
                  <li><a href="index.php?object=admin&action=list"><i class="fa fa-circle-o"></i> Danh Sách Admin Trạm Bơm</a></li>
              </ul>
          </li> -->
        <?php if($quyen["level"]==0) { ?>
            <li>
             <a href="?object=mucnuoc&action=list&ma_tram=<?=$quyen[ma_tram]?>">
                 <i class="fa fa-th"></i> <span>Lịch sử đo mực nước</span>
                 <span class="pull-right-container">
              </span>
             </a>
         </li>
        <?php } else { ?>
            <li>
             <a href="index.php?object=trambom&action=list">
                 <i class="fa fa-th"></i> <span>Quản lý trạm bơm</span>
                 <span class="pull-right-container">
              </span>
             </a>
         </li>
         <li>
             <a href="index.php?object=admin&action=list">
                 <i class="fa fa-th"></i> <span>Quản lý tài khoản</span>
                 <span class="pull-right-container">
              </span>
             </a>
         </li>
        <?php } ?>
        </ul>
    </section>
   
</aside>
<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019-2020 Trạm Quan Trắc </a>.</strong>
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/jquery-ui.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/adminlte.min.js"></script>
    <script src="public/js/dashboard.js"></script>
    <script src="public/tinymce/tinymce.min.js"></script>
    <script src="public/tinymce/config.js"></script>
    <script src="public/js/function.js"></script>
    <script src="public/js/soft.js"></script>
</footer>

</div>