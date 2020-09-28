@extends('header')
@section('title', 'Pengeluaran PMBBP - PT. Solo Murni')

@section('konten')
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Start Page -->
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">PENGELUARAN BARANG</h4> 
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- white box -->
                <div class="white-box">
                    <div class="col-md-12" align="right">{{ $pmbp->links() }}</div>
                    <h3 class="box-title m-b-0">Export Data</h3>
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No.</th>
                                    <th>Action</th>
                                    <th>Form</th>
                                    <th>Nomor</th>
                                    <th>Tanggal</th>
                                    <th>Kode Brg</th>
                                    <th>Nama Brg</th>
                                    <th>JOP</th>
                                    <th>Bagian</th>
                                    <th>Qty</th>
                                    <th>Satuan</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($pmbp as $pm)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td align='center'><a href="{{ url('/') }}/pengeluaran/{{ $pm->nomor }}/{{ $pm->kode }}"><button type="button" class="btn btn-primary"><i class="fa fa-print"></i></button></a></td>
                                        <td>{{ $pm->form }}</td>
                                        <td>{{ strtoupper($pm->nomor) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($pm->tanggal)) }}</td>
                                        <td>{{ strtoupper($pm->kode) }}</td>
                                        <td>{{ strtoupper($pm->nama_barang) }}</td>
                                        <td>{{ strtoupper($pm->no_job) }}</td>
                                        <td>{{ strtoupper($pm->nama_bagian) }}</td>
                                        <td>{{ $pm->kredit }}</td>
                                        <td>{{ strtoupper($pm->satuan) }}</td>
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

