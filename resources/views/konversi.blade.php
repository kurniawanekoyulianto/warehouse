@extends('header')
@section('title', 'Konversi - PT. Solo Murni')

@section('konten')
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Start Page -->
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Daftar Konversi</h4> 
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- white box -->
                <div class="white-box">
                    <div class="col-md-12" align="right">{{ $konversi->links() }}</div>
                    <h3 class="box-title m-b-0">Export Data</h3>
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 20px">No.</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan Awal</th>
                                    <th>Satuan Tujuan</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($konversi as $k)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $k->kode }}</td>
                                    <td>{{ strtoupper($k->nama_barang) }}</td>
                                    <td>{{ strtoupper($k->satuan1) }}</td>
                                    <td>{{ strtoupper($k->satuan2) }}</td>
                                    <td>{{ $k->jumlah }}</td>
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

