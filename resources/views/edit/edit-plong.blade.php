@extends('header')
@section('title', 'Edit Data - PT. Solo Murni')

@section('konten')
    <div class="container-fluid">
        <!-- Start Page -->
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title">Edit Plong</h3> 
                    @foreach($data as $d)
                    <form class="form-horizontal" action="{{ route('plong.update') }}" method="POST" >
                        {{ csrf_field() }}
                        <input type="hidden" id="id_gd_plong" name="id_gd_plong" class="form-control" value="{{ $d->id_gd_plong }}">
                        <div class="form-group"> 
                            <div class="col-md-12">
                                <label class="col-md-12">Kode Plong</label>
                                <div class="col-md-12">
                                <input type="text" id="nomor_gd_plong" name="nomor_gd_plong" class="form-control" value="{{ $d->nomor_gd_plong }}" required> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Nama Plong</label>
                                <div class="col-md-12">
                                    <input type="text" id="nama_gd_plong" name="nama_gd_plong" class="form-control" value="{{ $d->nama_gd_plong }}" required> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Tingkat</label>
                                <div class="col-md-12">
                                    <select class="form-control select2" name="id_gd_tingkat" required>
                                        <option value="{{ $d->id_gd_tingkat }}">Tingkat {{ strtoupper($d->nama_gd_tingkat) }} - Blok {{ $d->nama_gd_blok }}</option>
                                        @foreach ($tingkat as $t)
                                        <option value="{{ $t->id_gd_tingkat }}">Tingkat {{ strtoupper($t->nama_gd_tingkat) }} - Blok {{ $t->nama_gd_blok }}</option>
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
                                    <input type="submit" class="btn btn-block btn-warning" value="Update data">
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End Page -->
    </div>
    @include('footer')
@endsection