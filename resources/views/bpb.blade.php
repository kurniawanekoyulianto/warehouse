@extends('header')
@section('title', 'Data BPB - PT. Solo Murni')

@section('konten')
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Start Page -->
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">CETAK QRCODE BARANG</h4> 
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- white box -->
                <div class="white-box">
                    <div class="col-md-2"></div>
                    <div class="col-md-10" align="right">{{ $bpb->links() }}</div>
                    <h3 class="box-title m-b-0">Export Data</h3>
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 20px">No.</th>
                                    <th>Action</th>
                                    <th>Form</th>
                                    <th>Nomor</th>
                                    <th>Tanggal</th>
                                    <th>Supplier</th>
                                    <th>Kode Brg</th>
                                    <th>Nama Brg</th>
                                    <th>Bagian</th>
                                    <th>Debet</th>
                                    <th>Satuan</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($bpb as $b)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td align='center'><a href="{{ url('/') }}/bpb/{{ $b->nomor }}/{{ $b->kode }}"><button type="button" class="btn btn-primary"><i class="fa fa-print"></i></button></a></td>
                                        <td>{{ $b->form }}</td>
                                        <td>{{ strtoupper($b->nomor) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($b->tanggal)) }}</td>
                                        <td>{{ strtoupper($b->nama_supplier) }}</td>
                                        <td>{{ strtoupper($b->kode) }}</td>
                                        <td>{{ strtoupper($b->nama_barang) }}</td>
                                        <td>{{ strtoupper($b->nama_bagian) }}</td>
                                        <td>{{ $b->jum_konv }}</td>
                                        <td>{{ strtoupper($b->sat_konv) }}</td>
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

