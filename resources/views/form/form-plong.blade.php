@extends('header')
@section('title', 'Tambah Data - PT. Solo Murni')

@section('konten')
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Start Page -->
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title">Formulir Tambah Plong </h3> 
                    <form class="form-horizontal" action="{{ route('plong.store') }}" method="POST" >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Nama Plong</label>
                                <div class="col-md-12">
                                    <input type="text" id="nama_gd_plong" name="nama_gd_plong" class="form-control" required> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Tingkat</label>
                                <div class="col-md-12">
                                    <select class="form-control select2" name="id_gd_tingkat" required>
                                        <option value="">Pilih Tingkat</option>
                                        @foreach ($tingkat as $t)
                                            <option value="{{ $t->id_gd_tingkat }}">{{ strtoupper($t->nama_bagian) }} - TINGKAT : {{ strtoupper($t->nama_gd_tingkat) }} - BLOK : {{ $t->nama_gd_blok }}</option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-lg-8 col-sm-4 col-xs-12">&nbsp;</div>
                                <div class="col-lg-2 col-sm-4 col-xs-12">
                                    <input type='reset' class='btn btn-block btn-danger'>
                                </div>
                                <div class="col-lg-2 col-sm-4 col-xs-12">
                                    <input type="submit" class="btn btn-block btn-success" value="Tambah data">
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