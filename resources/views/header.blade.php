<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplikasi Management Gudang Barang Jadi PT. Solo Murni">
    <meta name="author" content="HR-Business Analyst (Kurniawan E. Yulianto)">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/') }}/ampleadmin/images/logo-kiky.png">
    <title>@yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ url('/') }}/ampleadmin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/ampleadmin/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- Menu CSS -->
    <link href="{{ url('/') }}/ampleadmin/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet" type="text/css">
    <!--alerts CSS -->
    <link href="{{ url('/') }}/ampleadmin/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- Date picker plugins css -->
    <link href="{{ url('/') }}/ampleadmin/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="{{ url('/') }}/ampleadmin/bower_components/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/ampleadmin/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Page CSS -->
    <link href="{{ url('/') }}/ampleadmin/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/ampleadmin/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="{{ url('/') }}/ampleadmin/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="{{ url('/') }}/ampleadmin/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="{{ url('/') }}/ampleadmin/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="{{ url('/') }}/ampleadmin/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <!-- animation CSS -->
    <link href="{{ url('/') }}/ampleadmin/css/animate.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="{{ url('/') }}/ampleadmin/css/style.css" rel="stylesheet" type="text/css">
    <!-- color CSS -->
    <link href="{{ url('/') }}/ampleadmin/css/colors/default.css" id="theme" rel="stylesheet" type="text/css">
    <!-- Mapping Gudang (GIS) CSS -->
    <link href="{{ url('/') }}/gis/rda.css" id="theme" rel="stylesheet" type="text/css">
    <link href="{{ url('/') }}/gis/rdb.css" id="theme" rel="stylesheet" type="text/css">
    <link href="{{ url('/') }}/gis/rdc.css" id="theme" rel="stylesheet" type="text/css">
    <link href="{{ url('/') }}/gis/rdd.css" id="theme" rel="stylesheet" type="text/css">
    <link href="{{ url('/') }}/gis/rde.css" id="theme" rel="stylesheet" type="text/css">
    <link href="{{ url('/') }}/gis/rdf.css" id="theme" rel="stylesheet" type="text/css">
    <link href="{{ url('/') }}/gis/rdg.css" id="theme" rel="stylesheet" type="text/css">
    <link href="{{ url('/') }}/gis/rdh.css" id="theme" rel="stylesheet" type="text/css">
    <link href="{{ url('/') }}/gis/rka.css" id="theme" rel="stylesheet" type="text/css">
    <link href="{{ url('/') }}/gis/rkb.css" id="theme" rel="stylesheet" type="text/css">
    <link href="{{ url('/') }}/gis/rkc.css" id="theme" rel="stylesheet" type="text/css">

    <!-- Scanner JQuery -->
    <script src="{{ url('/') }}/js/jsQR.js"></script>
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header" style="background-color:#ec0000">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="{{ url('/') }}">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="{{ url('/') }}/ampleadmin/images/box-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="{{ url('/') }}/ampleadmin/images/box-logo-dark.png" alt="home" class="light-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img src="{{ url('/') }}/ampleadmin/images/box-text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="{{ url('/') }}/ampleadmin/images/box-text-dark.png" alt="home" class="light-logo" />
                     </span> </a>
                </div>
                <!-- /Logo -->
                
                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="{{ url('/') }}/ampleadmin/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{ session()->get('nama') }}</b><span class="caret"></span> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="{{ url('/') }}/ampleadmin/images/users/varun.jpg" alt="user" /></div>
                                    <div class="u-text">
                                        <h4>{{ session()->get('nama') }}</h4>
                                        <p class="text-muted">Super Admin</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('/') }}/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Menu Utama</span></h3> 
                </div>
                <div class="user-profile">
                    <div class="dropdown user-pro-body">
                        <div><img src="{{ url('/') }}/ampleadmin/images/users/varun.jpg" alt="user-img" class="img-circle"></div>
                        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> {{ session()->get('nama') }} <span class="caret"></span></a>
                        <ul class="dropdown-menu animated flipInY">
                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('/') }}/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>

                <ul class="nav" id="side-menu">
                    <li> <a href="{{ url('/') }}" class="waves-effect "><i class="mdi mdi-av-timer fa-fw" data-icon="v"></i> <span class="hide-menu"> Dashboard </span></a></li>
                    
                    <li> <a href="#" class="waves-effect"><i class="mdi mdi-database fa-fw"></i> <span class="hide-menu">Data Master<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{ url('/barang') }}"><i class="mdi mdi-archive fa-fw"></i> <span class="hide-menu">Barang</span></a></li>
                            <li><a href="{{ url('/supplier') }}"><i class="mdi mdi-account-card-details fa-fw"></i> <span class="hide-menu">Supplier</span></a></li>
                            <li><a href="{{ url('/mesin') }}"><i class="mdi mdi-engine fa-fw"></i> <span class="hide-menu">Mesin</span></a></li>
                            <li><a href="{{ url('/satuan') }}"><i class="mdi mdi-weight-kilogram fa-fw"></i> <span class="hide-menu">Satuan</span></a></li>
                            <li><a href="{{ url('/konversi') }}"><i class="mdi mdi-scale fa-fw"></i> <span class="hide-menu">Konversi</span></a></li>
                            <li><a href="{{ url('/bagian') }}"><i data-icon="&#xe025;" class="mdi mdi-apps fa-fw"></i> <span class="hide-menu">Bagian</span></a></li>
                            <li><a href="{{ url('/blok') }}"><i data-icon="&#xe025;" class="mdi mdi-factory fa-fw"></i> <span class="hide-menu">Blok</span></a></li>
                            <li><a href="{{ url('/tingkat') }}"><i data-icon="&#xe025;" class="mdi mdi-widgets fa-fw"></i> <span class="hide-menu">Tingkat</span></a></li>
                            <li><a href="{{ url('/plong') }}"><i class="mdi mdi-layers fa-fw"></i> <span class="hide-menu">Plong</span></a></li>
                        </ul>
                    </li>
                    
                    {{-- <li> <a href="{{ url('/real') }}" class="waves-effect"><i class="mdi mdi-archive fa-fw"></i> <span class="hide-menu">Realisasi</span></a></li>   --}}

                    <li> <a href="{{ url('/bpb') }}" class="waves-effect"><i class="mdi mdi-package-down fa-fw"></i> <span class="hide-menu">Penerimaan BPB</span></a></li>
                    
                    <li> <a href="{{ url('/pengeluaran') }}" class="waves-effect"><i class="mdi mdi-cube-send fa-fw"></i> <span class="hide-menu">Pengeluaran</span></a></li>

                    <li> <a href="{{ url('/mapping') }}" class="waves-effect"><i class="mdi mdi-map-marker-radius fa-fw"></i> <span class="hide-menu">Mapping Stok</span></a></li>

                    <li> <a href="{{ url('/cekstok') }}" class="waves-effect"><i class="mdi mdi-magnify fa-fw"></i> <span class="hide-menu">Cek Stok</span></a></li>
                </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->

        <div id="page-wrapper">
        
        @yield('konten')