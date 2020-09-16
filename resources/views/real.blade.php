@extends('header')
@section('title', 'Data Realisasi - PT. Solo Murni')

@section('konten')
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Start Page -->
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Data Realisasi</h4> 
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- white box -->
                <div class="white-box">
                    <div class="col-md-2"></div>
                    <div class="col-md-10" align="right">{{ $real->links() }}</div>
                    <h3 class="box-title m-b-0">Export Data</h3>
                    <p class="text-muted m-b-30">Export data ke Copy, CSV, Excel, PDF & Print</p>
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 20px">No.</th>
                                    <th>Form</th>
                                    <th>Nomor</th>
                                    <th>Tanggal</th>
                                    <th>Gudang</th>
                                </tr>
                            </thead>
                            
                            {{-- <tbody>
                                @foreach($barang as $chunk)
                                    @foreach($chunk as $b)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $b->kode_barang }}</td>
                                            <td>{{ strtoupper($b->nama_barang) }}</td>
                                            <td>{{ $b->satuan }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody> --}}

                            <tbody>
                                @foreach($real as $r)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $r->form }}</td>
                                        <td>{{ strtoupper($r->nomor) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($r->tanggal)) }}</td>
                                        <td>{{ strtoupper($r->nama_bagian) }}</td>
                                        <td>{{ strtoupper($r->nama_lengkap) }}</td>
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

