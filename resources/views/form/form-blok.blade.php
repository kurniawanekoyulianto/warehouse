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
                    <h3 class="box-title">Formulir Tambah Blok</h3> 
                    <form class="form-horizontal" action="{{ route('blok.store') }}" method="POST" >
                        {{ csrf_field() }}
                        <div class="form-group"> 
                            <div class="col-md-12">
                                <label class="col-md-12">Kode Blok</label>
                                <div class="col-md-12">
                                    <input type="text" id="kode_gudang_blok" name="kode_gudang_blok" class="form-control" required> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Nama Blok</label>
                                <div class="col-md-12">
                                    <input type="text" id="nama_gd_blok" name="nama_gd_blok" class="form-control" required> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Area</label>
                                <div class="col-md-12">
                                    <select class="form-control select2" name="kode_bagian" required>
                                        <option value="">Pilih Area</option>
                                        @foreach ($data as $a)
                                            <option value="{{ $a->kode_bagian }}">{{ strtoupper($a->nama_bagian) }}</option>
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
                                    <!-- <a href="#"  class="btn btn-block btn-danger">Reset Data</a> -->
                                </div>
                                <div class="col-lg-2 col-sm-4 col-xs-12">
                                    <input type="submit" class="btn btn-block btn-success" value="Tambah data">
                                    <!-- <a href="#" class="btn btn-block btn-success">Tambah Data</a> -->
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