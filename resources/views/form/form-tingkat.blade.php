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
                    <h3 class="box-title">Formulir Tambah Tingkat </h3> 
                    <form class="form-horizontal" action="{{ route('tingkat.store') }}" method="POST" >
                        {{ csrf_field() }}
                        <div class="form-group"> 
                            <div class="col-md-12">
                                <label class="col-md-12">Kode Tingkat</label>
                                <div class="col-md-12">
                                    <input type="text" id="kode_gudang_tingkat" name="kode_gudang_tingkat" class="form-control" required> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Nama Tingkat</label>
                                <div class="col-md-12">
                                    <input type="text" id="nama_gd_tingkat" name="nama_gd_tingkat" class="form-control" required> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Blok</label>
                                <div class="col-md-12">
                                    <select class="form-control select2" name="id_gd_blok" required>
                                        <option value="">Pilih Blok</option>
                                        @foreach ($blok as $b)
                                            <option value="{{ $b->id_gd_blok }}">{{ strtoupper($b->nama_gd_blok) }}</option>
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