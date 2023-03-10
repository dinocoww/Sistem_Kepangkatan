<?php require "../../koneksi.php";

// inisialisasi session
session_start();




// mengecek username pada session
if (!isset($_SESSION["username"])) {
   $_SESSION['msg'] = 'Anda harus login untuk mengakses halaman ini';
   header('Location: php/login.php');
}

if($_GET['id_pangkat'] != null){
    $id_pangkat = $_GET['id_pangkat'];
    $script = "SELECT id_pangkat, pegawai.foto as foto, pegawai.nama as nama, pegawai.nip as nip, nama_pangkat, golongan, tgl_pangkat FROM pangkat JOIN pegawai on pangkat.id_pegawai=pegawai.id_pegawai WHERE id_pangkat=$id_pangkat";
    $query = mysqli_query($conn,$script);
    $data = mysqli_fetch_array($query);

}else{
    header("location:read.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Sistem Kepangkatan</title>
    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="../../assets/css/chosen.min.css" />
    <link rel="stylesheet" href="../../assets/css/bootstrap-datepicker3.min.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="../../assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="../../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
			<link rel="stylesheet" href="../../assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
    <link rel="stylesheet" href="../../assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="../../assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
		  <link rel="stylesheet" href="../../assets/css/ace-ie.min.css" />
		<![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="../../assets/js/ace-extra.min.js"></script>
    <script src="../../assets/js/jquery-2.1.4.min.js"></script>

</head>

<body class="no-skin">
    <div id="navbar" class="navbar navbar-default ace-save-state" style="background-color: #182958">
        <div class="navbar-container ace-save-state" id="navbar-container">
            <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-header pull-left">
                <a href="../../index.php" class="navbar-brand">
                    <small><img src="../../img/bumn-nav.png" width="80px">&nbsp;Sistem Kepangkatan</small>
                </a>
            </div>
            <div class="navbar-buttons navbar-header pull-right" role="navigation">
                <ul class="nav ace-nav">
                    <li class="purple dropdown-modal">


                    </li>
                    <li class="dropdown-modal" style="background-color: #009EA9">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <img class='nav-user-photo' src='../../img/profile.png' /> <span
                                class="user-info"><small>Welcome,</small> Admin </span>
                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>
                        <ul
                            class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                            <li class="divider"></li>
                            <li>
                                <a href="../../php/logout.php"><i class="ace-icon fa fa-power-off"></i>Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
        try {
            ace.settings.loadState('main-container')
        } catch (e) {}
        </script>
        <div id="sidebar" class="sidebar responsive ace-save-state">
            <script type="text/javascript">
            try {
                ace.settings.loadState('sidebar')
            } catch (e) {}
            </script>
            <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                    <button class="btn btn-outline-light me-1"><i class="ace-icon fa fa-signal"></i></button>
                    <button class="btn btn-outline-light me-1"><i class="ace-icon fa fa-pencil"></i></button>
                    <button class="btn btn-outline-light me-1"><i class="ace-icon fa fa-user"></i></button>
                    <button class="btn btn-outline-light me-1"><i class="ace-icon fa fa-cogs"></i></button>
                </div>
                <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                    <span class="btn btn-outline-light me-1"></span>
                    <span class="btn btn-outline-light me-1"></span>
                    <span class="btn btn-outline-light me-1"></span>
                    <span class="btn btn-outline-light me-1"></span>
                </div>
            </div>
            <ul class="nav nav-list">
                <li class=""><a href="../../index.php"><i class="menu-icon fa fa-tachometer"></i><span
                            class="menu-text">
                            Dashboard</span></a><b class="arrow"></b></li>
                <li class=""><a href="read.php?page=form-view-data-pegawai"><i class="menu-icon fa fa-user"></i><span
                            class="menu-text"> Data Pegawai</span></a><b class="arrow"></b></li>

                <li class="">
                    <a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-bars"></i><span class="menu-text">
                            Kepegawaian</span><b class="arrow fa fa-angle-down"></b></a><b class="arrow"></b>
                    <ul class="submenu">
                        <li class=""><a href="../../php/jabatan/create.php?page=form-view-data-pegawai"><i
                                    class="menu-icon fa fa-caret-right"></i> Jabatan</a></li>
                        <li class=""><a href="../../php/pangkat/create.php?page=form-view-data-pegawai"><i
                                    class="menu-icon fa fa-caret-right"></i> Pangkat</a></li>
                        <li class=""><a href="../../php/gaji/create.php?page=form-view-data-pegawai"><i
                                    class="menu-icon fa fa-caret-right"></i> Gaji</a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-calendar"></i><span class="menu-text">
                            Kenaikan Berkala</span><b class="arrow fa fa-angle-down"></b></a><b class="arrow"></b>
                    <ul class="submenu">
                        <li class=""><a href="../../php/jabatan/read.php?page=form-view-data-pegawai"><i
                                    class="menu-icon fa fa-caret-right"></i> Berkala Jabatan</a></li>
                        <li class=""><a href="../../php/pangkat/read.php?page=form-view-data-pegawai"><i
                                    class="menu-icon fa fa-caret-right"></i> Berkala Pangkat</a></li>
                        <li class=""><a href="../../php/gaji/read.php?page=form-view-data-pegawai"><i
                                    class="menu-icon fa fa-caret-right"></i> Berkala Gaji</a></li>
                    </ul>
                </li>
                <li class="">
                    <a href="#" class="dropdown-toggle"><i class="menu-icon fa fa-calculator"></i><span
                            class="menu-text"> Rekapitulasi</span><b class="arrow fa fa-angle-down"></b></a><b
                        class="arrow"></b>
                    <ul class="submenu">
                        <li class=""><a href="../../php/grafik/grafik_jabatan.php?page=form-view-data-pegawai"><i
                                    class="menu-icon fa fa-caret-right"></i> Jabatan</a></li>
                        <li class=""><a href="../../php/grafik/grafik_pangkat.php?page=form-view-data-pegawai"><i
                                    class="menu-icon fa fa-caret-right"></i> Pangkat</a></li>
                        <li class=""><a href="../../php/grafik/grafik_gaji.php?page=form-view-data-pegawai"><i
                                    class="menu-icon fa fa-caret-right"></i> Gaji</a></li>
                    </ul>
                </li>
            </ul>
            <!-- <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
                    data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
            </div> -->
        </div>
        <div class="main-content">
            <div class="main-content-inner">
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li><i class="ace-icon fa fa-home home-icon"></i><a href="../../index.php">Home</a></li>
                        <li class="active">Admin</li>
                    </ul>
                </div>
                <div class="ace-settings-container" id="ace-settings-container">
                    <div class="btn btn-app btn-xs ace-settings-btn" id="ace-settings-btn">
                        <i class="ace-icon fa fa-cog bigger-130"></i>
                    </div>
                    <!-- /.ace-settings-box -->
                    <div class="ace-settings-box clearfix" id="ace-settings-box" style="border-color: #b4c2cc;">
                        <div class="pull-left width-50">
                            <div class="ace-settings-item">
                                <div class="pull-left">
                                    <select id="skin-colorpicker" class="hide">
                                        <option data-skin="no-skin" value="#182958">#182958</option>
                                        <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                        <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                        <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                    </select>
                                </div>
                                <span>&nbsp; Choose Skin</span>
                            </div>
                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state"
                                    id="ace-settings-navbar" autocomplete="off" />
                                <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                            </div>
                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state"
                                    id="ace-settings-sidebar" autocomplete="off" />
                                <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                            </div>
                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state"
                                    id="ace-settings-breadcrumbs" autocomplete="off" />
                                <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                            </div>
                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl"
                                    autocomplete="off" />
                                <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                            </div>
                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state"
                                    id="ace-settings-add-container" autocomplete="off" />
                                <label class="lbl" for="ace-settings-add-container">
                                    Inside <b>.container</b>
                                </label>
                            </div>
                        </div>
                        <div class="pull-left width-50">
                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover"
                                    autocomplete="off" />
                                <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                            </div>
                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact"
                                    autocomplete="off" />
                                <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                            </div>
                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight"
                                    autocomplete="off" />
                                <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- /.content -->
                <div class="page-header">
                    <h1>Data<small><i class="ace-icon fa fa-angle-double-right"></i> Pangkat <i
                                class="ace-icon fa fa-angle-double-right"></i>&nbsp; <?= $data['nama'] ?>
                        </small>
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="alert alert-block" style="background-color: #E3E2FB">
                            <button type="button" class="close" data-dismiss="alert"><i
                                    class="ace-icon fa fa-times"></i></button>
                            <i class="ace-icon fa fa-check black"></i>
                            Welcome to<strong class="black"> Sistem Kepangkatan BUMN</strong>. Aplikasi
                            Sistem Informasi Kepangkatan. Dikembangkan oleh TI3A</a> | Teknik Informatika | <i
                                class="ace-icon fa fa-phone"></i>
                            +021-7270036 ext 217
                        </div>
                    </div>
                </div>



                <!-- start list data -->
                <div class="tab-content no-border padding-12">
                    <div id="profile" class="tab-pane in active">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 center">
                                <span class="profile-picture">
                                    <img src='<?= $data['foto'] ?>' width='150' height='200' /></a>
                                </span>
                                <div class="space space-4"></div>
                                <div class="width-80 label label-lg arrowed-in arrowed-in-right"
                                    style="background-color: #2E6589">
                                    <div class="inline position-relative">
                                        <span class="white"><?= $data['nama'] ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-9">
                                <h4 class="blue"><span class="label label-lg label-purple arrowed-in-right">&nbsp;
                                        &nbsp; # Pangkat Pegawai &nbsp; &nbsp;</span></h4>

                                <div class="profile-info-row">
                                    <div class="profile-info-name"> ID Pangkat </div>
                                    <div class="profile-info-value"><span><?= $data['id_pangkat'] ?></span></div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Nama Pegawai </div>
                                    <div class="profile-info-value"><span><?= $data['nama'] ?></span></div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> NIP </div>
                                    <div class="profile-info-value"><span><?= $data['nip'] ?></span></div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Nama Pangkat </div>
                                    <div class="profile-info-value"><span><?= $data['nama_pangkat'] ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Golongan Pangkat </div>
                                    <div class="profile-info-value"><span><?= $data['golongan'] ?></span>
                                    </div>
                                </div>
                                <div class="profile-info-row">
                                    <div class="profile-info-name"> Tanggal Kenaikan Pangkat </div>
                                    <div class="profile-info-value"><span><?= $data['tgl_pangkat'] ?></span></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-1 col-md-6">
                                        <a href="read.php" type="submit"
                                            class="btn btn-white btn-info btn-bold">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer">
                <div class="footer-inner">
                    <div class="footer-content">
                        <span class="bigger-110">
                            <a href="#" target="_blank">Sistem
                                Kepangkatan</a>
                            &copy; BUMN
                        </span>
                    </div>
                </div>
            </div>
            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div>
    </div>
    </div>


    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <!-- <script src="assets/js/jquery-ui.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="assets/js/jquery.easypiechart.min.js"></script>
    <script src="assets/js/jquery.sparkline.index.min.js"></script>
    <script src="assets/js/jquery.flot.min.js"></script>
    <script src="assets/js/jquery.flot.pie.min.js"></script>
    <script src="assets/js/jquery.flot.resize.min.js"></script> -->

    <!-- ace scripts -->
    <script src="../../assets/js/ace-elements.min.js"></script>
    <script src="../../assets/js/ace.min.js"></script>
    <!-- inline scripts related to this page -->
</body>

</html>