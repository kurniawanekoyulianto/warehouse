@extends('header')
@section('title', 'Ubah Password - PT. Solo Murni')

@section('konten')
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Start Page -->
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Ubah Password</h4> </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="password" id="password" name="password" class="form-control form-password">
                                    <!-- <div class="checkbox checkbox-danger checkbox-custom">
                                        <input type="checkbox" id="checkbox8" class="form-checkbox" >
                                        <label for="checkbox8"> Show Password </label>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Password Baru</label>
                                <div class="col-md-12">
                                    <input type="password" id="password_baru" name="password_baru" class="form-control"> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Konfirmasi Password</label>
                                <div class="col-md-12">
                                    <input type="password" id="konfirmasi_password" name="konfirmasi_password" class="form-control"> 
                                </div>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
        <!-- End Page -->
    </div>
    @include('footer')
@endsection

