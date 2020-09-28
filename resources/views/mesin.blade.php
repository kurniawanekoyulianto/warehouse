@extends('header')
@section('title', 'Mesin - PT. Solo Murni')

@section('konten')
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Start Page -->
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Daftar Mesin</h4> 
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- white box -->
                <div class="white-box">
                    <h3 class="box-title m-b-0">Export Data</h3>
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 20px">No.</th>
                                    <th>Kode</th>
                                    <th>Nama Mesin</th>
                                    <th>Bagian</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($mesin as $m)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $m->kode_mesin }}</td>
                                    <td>{{ strtoupper($m->nama_mesin) }}</td>
                                    <td>{{ strtoupper($m->nama_bagian) }}</td>
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