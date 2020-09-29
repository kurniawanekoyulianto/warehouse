@extends('header')
@section('title', 'Pengeluaran Barang - PT. Solo Murni')

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
                <div class="white-box" >
                    <h3 class="box-title m-b-0" >Export Data</h3>
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    {{-- <th style="width: 20px">No.</th> --}}
                                    <th>Action</th>
                                    <th>Form</th>
                                    <th>Nomor</th>
                                    <th>Tanggal</th>
                                    <th>Kode Brg</th>
                                    <th>Nama Brg</th>
                                    <th>Bagian</th>
                                    <th>Qty</th>
                                    <th>Satuan</th>
                                    <th>NIK / Nama</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($pmbp as $pmb)
                                    <tr>
                                        {{-- <td>{{ $loop->iteration }}</td> --}}
                                        @if($pmb->qty > 0) <!-- jika masih ada stok bisa di proses -->
                                            <td align='center'><a href="{{ url('/') }}/pengeluaran/{{ $pmb->nomor }}/{{ $pmb->kode }}"><button type="button" class="btn btn-success"><i class="fa fa-qrcode"></i></button></a></td>
                                        @else
                                            <td><span class="label label-rouded label-danger">SELESAI</span></td>
                                        @endif
                                        <td>{{ $pmb->form }}</td>
                                        <td>{{ strtoupper($pmb->nomor) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($pmb->tanggal)) }}</td>                                        
                                        <td>{{ strtoupper($pmb->kode) }}</td>
                                        <td>{{ strtoupper($pmb->nama_barang) }}</td>
                                        <td>{{ strtoupper($pmb->nama_bagian) }}</td>
                                        <td>{{ round($pmb->qty, 2) }}</td> <!-- Qty Konversi (Sudah dikurangi jumlah yg diinput qrcodenya) -->
                                        <td>{{ strtoupper($pmb->satuan) }}</td>
                                        <td>{{ strtoupper($pmb->suplier) }} / {{ strtoupper($pmb->nama_supplier) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br><br>
                <!-- End white box -->
                </div>
            </div>
        </div>
        <!-- End Page -->
    </div>
    @include('footer')
@endsection