@extends('header')
@section('title', 'Edit Data - PT. Solo Murni')

@section('konten')
    <div class="container-fluid">
        <!-- Start Page -->
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title">Edit Blok</h3> 
                    @foreach($data as $d)
                    <form class="form-horizontal" action="{{ route('blok.update') }}" method="POST" >
                        {{ csrf_field() }}
                        <input type="hidden" id="id_gd_blok" name="id_gd_blok" class="form-control" value="{{ $d->id_gd_blok }}">
                        <div class="form-group"> 
                            <div class="col-md-12">
                                <label class="col-md-12">Kode Blok</label>
                                <div class="col-md-12">
                                <input type="text" id="kode_gudang_blok" name="kode_gudang_blok" class="form-control" value="{{ $d->kode_gudang_blok }}" required> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Nama Blok</label>
                                <div class="col-md-12">
                                    <input type="text" id="nama_gd_blok" name="nama_gd_blok" class="form-control" value="{{ $d->nama_gd_blok }}" required> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-md-12">Area</label>
                                <div class="col-md-12">
                                    <select class="form-control select2" name="kode_bagian" required>
                                        <option value="{{ $d->kode_bagian }}">{{ strtoupper($d->nama_bagian) }}</option>
                                        @foreach ($bagian as $b)
                                        <option value="{{ $b->kode_bagian }}">{{ strtoupper($b->nama_bagian) }}</option>
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