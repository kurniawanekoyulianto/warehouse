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
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach($mesin as $m)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $m->kode_mesin) }}</td>
                                    <td>{{ strtoupper($m->nama_mesin) }}</td>
                                    <td>{{ strtoupper($m->lokasi) }}</td>
                                    <td>
                                        {{-- <a href="/barang/u/{{ $b->kode_barang }}"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></button></a> --}}
                                        {{-- <a href="/barang/d/{{ $b->kode_barang }}"><button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i> </button></a> --}}
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

