@extends('header')
@section('title', 'Supplier - PT. Solo Murni')

@section('konten')
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Start Page -->
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Daftar Supplier</h4> 
            </div>
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
                                    <th>Nama Supplier</th>
                                    <th>Alamat 1</th>
                                    <th>Alamat 2</th>
                                    <th>Telp 1</th>
                                    <th>Telp 2</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($supplier as $s)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->kode_supplier }}</td>
                                    <td>{{ strtoupper($s->nama_supplier) }}</td>
                                    <td>{{ strtoupper($s->alamat_1) }}</td>
                                    <td>{{ strtoupper($s->alamat_2) }}</td>
                                    <td>{{ strtoupper($s->telp_1) }}</td>
                                    <td>{{ strtoupper($s->telp_2) }}</td>
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

