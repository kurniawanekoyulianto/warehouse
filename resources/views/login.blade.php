<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="ampleadmin/images/logo-kiky.png">
<title>Login - PT. Solo Murni</title>
<!-- Bootstrap Core CSS -->
<link href="ampleadmin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="ampleadmin/css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="ampleadmin/css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="ampleadmin/css/colors/default.css" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="new-login-register">
    <div class="lg-info-panel">
        <div class="inner-panel">
            <a href="javascript:void(0)" class="p-20 di"><img src="ampleadmin/images/admin-logo.png"></a>
            <div class="lg-content">
                <h2><b>GUDANG BAHAN PEMBANTU</b></h2>
                <p class="text-muted" align="center">Aplikasi untuk Monitoring & Mapping Stok Barang di Gudang Bahan Pembantu <br> {{date("Y")}} &copy; PT. Solo Murni, Indonesia</p>
                <!-- <a href="#" class="btn btn-rounded btn-danger p-l-20 p-r-20"> Buy now</a> -->
            </div>
        </div>
    </div>

    <div class="new-login-box">
        <div class="white-box">
            <h3 class="box-title m-b-0">LogIn Administrator</h3>
            <small>Masukkan data NIK dan Kata Sandi Anda dengan benar!</small>
            <form class="form-horizontal new-lg-form" id="loginform" action="index.html">
                <div class="form-group  m-t-20">
                    <div class="col-xs-12">
                        <label>NIK Karyawan</label>
                        <input class="form-control text-uppercase" type="text" required="" placeholder="NIK">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label>Kata Sandi</label>
                        <input class="form-control" type="password" required="" placeholder="Kata Sandi">
                    </div>
                </div>

                <div class="form-group text-center m-t-20">
                    <div class="col-xs-6">
                        <button class="btn btn-danger btn-md btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Masuk</button>
                    </div>
                    <div class="col-xs-6">
                        <button class="btn btn-primary btn-md btn-block btn-rounded text-uppercase waves-effect waves-light" type="reset">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>            
</section>
<!-- jQuery -->
<script src="ampleadmin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="ampleadmin/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="ampleadmin/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

<!--slimscroll JavaScript -->
<script src="ampleadmin/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="ampleadmin/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="ampleadmin/js/custom.min.js"></script>
<!--Style Switcher -->
<script src="ampleadmin/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
