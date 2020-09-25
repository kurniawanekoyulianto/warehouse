@extends('header')
@section('title', 'Blok - PT. Solo Murni')

@section('konten')
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Start Page -->
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Daftar Blok Gudang</h4> 
            </div>
            
            <div class="col-lg-7 col-md-4 col-sm-4 col-xs-12"></div>

            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                <form action="{{ route('blok.create') }}">
                    <button class="btn btn-success btn-md btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Tambah Data</button>
                </form>
            </div>

            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- white box -->
                <div class="white-box">
                    <h3 class="box-title m-b-0">Export Data</h3>
                    <p class="text-muted m-b-30">Export data ke Copy, CSV, Excel, PDF & Print</p>
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 20px">No.</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Area</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach($blok as $b)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $b->kode_gudang_blok }}</td>
                                    <td>{{ $b->nama_gd_blok }}</td>
                                    <td>{{ strtoupper($b->nama_bagian) }}</td>
                                    <td>
                                        <a href="{{ url('/') }}/blok/u/{{ $b->id_gd_blok }}"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></button></a>
                                        <a href="{{ url('/') }}/blok/d/{{ $b->id_gd_blok }}"><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i> </button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- End white box -->
            </div>
        </div>
        <!-- End Page -->
    </div>
    @include('footer')
@endsection

