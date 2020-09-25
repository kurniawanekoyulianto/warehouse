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
                    <p class="text-muted m-b-30">Export data ke Copy, CSV, Excel, PDF & Print</p>
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 20px">No.</th>
                                    <th>Action</th>
                                    <th>Form</th>
                                    <th>Nomor</th>
                                    <th>Tanggal</th>
                                    <th>Tgl Masuk</th>
                                    <th>NIK</th>
                                    <th>Admin</th>
                                    <th>Urutan</th>
                                    <th>No. Reff</th>
                                    <th>JOP</th>
                                    <th>Supplier</th>
                                    <th>Kode Brg</th>
                                    <th>Nama Brg</th>
                                    <th>Bagian</th>
                                    <th>Debet</th>
                                    <th>Kredit</th>
                                    <th>Satuan</th>
                                    <th>Jum. Konv</th>
                                    <th>Sat. Konv</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($pmbp as $pm)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td align='center'><a href="{{ url('/') }}/bpb/{{ $pm->nomor }}/{{ $pm->kode }}"><button type="button" class="btn btn-primary"><i class="fa fa-print"></i></button></a></td>
                                        <td>{{ $pm->form }}</td>
                                        <td>{{ strtoupper($pm->nomor) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($pm->tanggal)) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($pm->tglinsert)) }}</td>
                                        <td>{{ strtoupper($pm->nik) }}</td>
                                        <td>{{ strtoupper($pm->karyawan) }}</td>
                                        <td>{{ strtoupper($pm->urutan) }}</td>
                                        <td>{{ strtoupper($pm->no_reff) }}</td>
                                        <td>{{ strtoupper($pm->no_job) }}</td>
                                        <td>{{ strtoupper($pm->nama_supplier) }}</td>
                                        <td>{{ strtoupper($pm->kode) }}</td>
                                        <td>{{ strtoupper($pm->nama_barang) }}</td>
                                        <td>{{ strtoupper($pm->nama_bagian) }}</td>
                                        <td>{{ $pm->debet }}</td>
                                        <td>{{ $pm->kredit }}</td>
                                        <td>{{ strtoupper($pm->satuan) }}</td>
                                        <td>{{ $pm->jum_konv }}</td>
                                        <td>{{ strtoupper($pm->sat_konv) }}</td>
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

