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
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 20px">No.</th>
                                    <th>Form</th>
                                    <th>Nomor</th>
                                    <th>Tanggal</th>
                                    <th>JOP</th>
                                    <th>Kode</th>
                                    <th>Barang</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Bagian</th>
                                    <th>Mesin</th>
                                    <th>Gudang</th>
                                    <th>NIK</th>
                                    <th>Admin</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($real as $r)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $r->form }}</td>
                                        <td>{{ strtoupper($r->nomor) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($r->tanggal)) }}</td>
                                        <td>{{ strtoupper($r->no_jop) }}</td>
                                        <td>{{ strtoupper($r->kode_barang) }}</td>
                                        <td>{{ strtoupper($r->barang) }}</td>
                                        <td>{{ strtoupper($r->jumlah) }}</td>
                                        <td>{{ strtoupper($r->satuan) }}</td>
                                        <td>{{ strtoupper($r->bagian) }}</td>
                                        <td>{{ strtoupper($r->mesin) }}</td>
                                        <td>{{ strtoupper($r->gudang) }}</td>
                                        <td>{{ strtoupper($r->nik) }}</td>
                                        <td>{{ strtoupper($r->karyawan) }}</td>
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

